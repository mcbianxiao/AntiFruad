<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>反诈提示</title>
  <style>
    body{
      font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"PingFang SC","Microsoft YaHei",Arial,sans-serif;
      margin: 0;
      background: #0b1020;
      color: #e9eefc;
      display: flex;
      min-height: 100vh;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }
    .card{
      max-width: 900px;
      width: 100%;
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 16px;
      padding: 28px 22px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.35);
    }
    .banner{
      text-align: center;
      font-weight: 900;
      font-size: clamp(22px, 4vw, 40px);
      padding: 18px 14px;
      border-radius: 14px;
      background: linear-gradient(90deg, #ff3b30, #ff9500, #ffd60a);
      color: #111;
      letter-spacing: 1px;
    }
    .count{
      font-variant-numeric: tabular-nums;
      padding: 0 6px;
      border-radius: 10px;
      background: rgba(0,0,0,0.2);
    }
    .subtitle{
      margin: 14px 0 0;
      text-align: center;
      color: rgba(233,238,252,0.85);
      font-size: 14px;
    }
    .poem-title{
        margin: 18px 0 10px;
        text-align: center;
        font-weight: 800;
        font-size: 22px;
        letter-spacing: 1px;
    }
    .poem{
      margin: 22px 0 0;
      white-space: pre-wrap;
      line-height: 1.9;
      font-size: 18px;
      background: rgba(0,0,0,0.22);
      border: 1px solid rgba(255,255,255,0.10);
      border-radius: 14px;
      padding: 18px 16px;
    }
    .poem b{ color: #ffd60a; }
    @media (max-width: 420px){
        .poem{
             font-size: 14px;      /* 适当变小，避免一句被折成两行 */
             line-height: 1.8;
             padding: 14px 12px;
             white-space: pre;     /* 严格按换行显示（不自动换行） */
             overflow-x: auto;     /* 万一仍然太长，允许横向滚动而不是换到下一行 */
             }
    }
    .banner{
        display:flex;
        align-items:center;
        justify-content:center;
        gap: 8px;
        flex-wrap: wrap; /* 宽度不够时允许换行 */
        text-align:center;
    }

    @media (max-width: 420px){
        .banner{ gap: 6px; }
        .banner .b1, .banner .b2{
                display:block;
                width:100%;        /* 窄屏时强制分两行 */
        }
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="banner" id="banner">
        <span class="b1">您是第 <span class="count" id="n">…</span> 个</span>
        <span class="b2">访问该网站的！</span>
    </div>
    <div class="subtitle" id="status">正在统计访问次数…</div>
    
    <div class="poem-title">反诈小口诀</div>
    <div class="poem" style="left: 50%;text-align: center;">
陌生电话要警惕，可疑短信需注意；
中奖退税送便宜，哄你汇钱是目的；
暴利理财和投资，多是骗局莫搭理；
<b>陌生链接勿点击</b>，谨防上当和受欺；
刷卡消费欠话费，细分真伪辨猫腻；
不理不信不汇款，小心谨慎防万一。
    </div>
    
    <div style="width:100%;margin:0 auto; padding:20px 0;text-align:center">
	<p>获取本站源码： <a target="_blank" href="https://github.com/mcbianxiao/Anti-Fruad/" style="text-decoration: none;color: #939393">GitHub</a></p>
	<p>网页源码技术支持：DeepSeek</p>
    
  </div>

  <script>
    async function hit() {
      const status = document.getElementById('status');
      const n = document.getElementById('n');

      try {
        const res = await fetch('./counter.php', { cache: 'no-store' });
        const data = await res.json();

        if (!data.ok) throw new Error(data.error || 'counter error');

        n.textContent = data.count;
        status.textContent = '统计成功';
      } catch (e) {
        status.textContent = '统计失败：请反馈以便解决';
      }
    }
    hit();
  </script>
  
  
  
</body>
</html>


<!-- 既然你看到这里了，那我就把本站源码告诉你吧 :) -->
<!-- 本站源码： https://github.com/mcbianxiao/Anti-Fruad/ -->
<!-- Since you're here, I'll just let you in on the source code of this site :) -->
<!-- Source code: https://github.com/mcbianxiao/Anti-Fruad/ -->
