<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<base href="__ROOT__/" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title>问卷酷</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link href="/Css/style.css" rel="stylesheet" media="screen">
<script src="/Js/jquery.js"></script>
<script src="/Js/bootstrap.min.js"></script>
</head><body id="body" >
<header> 
  <!-- 导航开始 -->
 	<div class="headwrap">
<div class="headin">
<div class="sojump_logo">
                    <div class="sojump_image">
                        <h1>问答社交服务</h1>
                    </div>
</div>
<div id="NMenu">
                        <ul>
                            <li ><a href="/" class="indexnav">首&nbsp;&nbsp;&nbsp;&nbsp;页&nbsp;</a></li>
                            <li ><a href="/index.php/index/wj" class="indexnav">所有问卷</a></li>
						    <?php if($_SESSION[C('USER_AUTH_KEY_F')] == ''): ?><li><a href="/index.php/index/login"  class="indexnav">登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;</a></li>
							<li  style="border: 0; padding-right: 0;"><a href="/index.php/index/login/checkreg.html" class="indexnav">注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;</a></li>
							<?php else: ?>
						    <li ><a href="/index.php/member/fabu"  class="indexnav">发&nbsp;&nbsp;&nbsp;&nbsp;布&nbsp;</a></li>
							<li ><a href="/index.php/member" class="indexnav2 "><span class="login">hi,<?php echo $_SESSION[C('USER_AUTH_KEY_F')];?></span></a></li>
							<li  style="border: 0; padding-right: 0;"><a href="/index.php/index/login/doLogout">退出登录</a></li><?php endif; ?>
                        </ul>
                    </div>

</div>
</div>
  <!-- 导航结束 --> 
</header>
<div class="container">

<h1>题目：<?php echo ($wj["name"]); ?></h1>
<h1>发布人：<?php echo ($wj["fbr"]); ?></h1>
 总共<?php echo ($count); ?>个问题，你答对了 <?php echo ($right); ?> 个问题， 得分为 <?php echo ($score); ?> 分。
 <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><h3>题目：<?php echo ($li["title"]); ?></h3>
        正确答案为<?php if($li["ans"] == 1): ?>A
		<?php elseif($li["ans"] == 2): ?>B
		<?php elseif($li["ans"] == 3): ?>C
		<?php elseif($li["ans"] == 4): ?>D<?php endif; ?>，
		您选择了<?php if($li["ans2"] == 1): ?>A
		<?php elseif($li["ans2"] == 2): ?>B
		<?php elseif($li["ans2"] == 3): ?>C
		<?php elseif($li["ans2"] == 4): ?>D<?php endif; endforeach; endif; else: echo "" ;endif; ?>

</div>

<!-- footer start -->
<footer id="footer">
  <div class="col-lg-12 col-md-12">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-footer"  style="text-align:center;"> <spanclass="text-muted">Hello~</span>
		<div class="sojump_image1">
        </div>
        <div class="clean"></div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- footer end -->
<!-- 去顶部 --> 
</body>
</html>