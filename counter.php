<?php
// counter.php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

$file = __DIR__ . '/counter.txt';

// 打开文件；c+：不存在则创建，读写模式
$fp = fopen($file, 'c+');
if (!$fp) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'error' => 'Cannot open counter file'], JSON_UNESCAPED_UNICODE);
  exit;
}

// 加独占锁，避免并发错乱
if (!flock($fp, LOCK_EX)) {
  fclose($fp);
  http_response_code(500);
  echo json_encode(['ok' => false, 'error' => 'Cannot lock counter file'], JSON_UNESCAPED_UNICODE);
  exit;
}

// 读当前值
rewind($fp);
$raw = stream_get_contents($fp);
$cur = (is_string($raw) && preg_match('/^\s*\d+\s*$/', $raw)) ? (int)trim($raw) : 0;

// +1 并写回
$cur++;
rewind($fp);
ftruncate($fp, 0);
fwrite($fp, (string)$cur);
fflush($fp);

// 解锁关闭
flock($fp, LOCK_UN);
fclose($fp);

echo json_encode(['ok' => true, 'count' => $cur], JSON_UNESCAPED_UNICODE);