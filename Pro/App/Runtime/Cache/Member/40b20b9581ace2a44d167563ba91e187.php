<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<base href="__ROOT__/" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title>第二步</title>
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
<h4  class="mb20"style="font-family:'微软雅黑';font-size:20px;">第二步，添加问题</h4>
<h3  class="mb20"style="font-family:'微软雅黑';font-size:20px;"><?php echo ($wenjuan["name"]); ?></h3>
<h3  class="mb20"style="font-family:'微软雅黑';font-size:20px;">发布人：<?php echo ($wenjuan["fbr"]); ?></h3>
<h3  class="mb20"style="font-family:'微软雅黑';font-size:20px;">已填加题目：</h3>
<?php if(is_array($wenti)): $i = 0; $__LIST__ = $wenti;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?>标题：<?php echo ($li["title"]); ?>
A：<?php echo ($li["A"]); ?>
B：<?php echo ($li["B"]); ?>
C：<?php echo ($li["C"]); ?>
D：<?php echo ($li["D"]); ?>
排序：<?php echo ($li["paixu"]); ?>
<a href="/index.php/member/fabu/dwenti/id/<?php echo ($li["id"]); ?>">删除</a><br><?php endforeach; endif; else: echo "" ;endif; ?>
 <form class="form-signin" name="huafei" action="<?php echo U('member/fabu/addwenti');?>" method="post" style="max-width: 450px;">
        
		 <div class="mb20">问题名称:&nbsp;&nbsp;<input type="text" class="form"  name="title"  ></div>
		 <div class="mb20">A:&nbsp;&nbsp;<input type="text" class="form"  name="A"  ></div>
		 <div class="mb20">B:&nbsp;&nbsp;<input type="text" class="form"  name="B" ></div>
		 <div class="mb20">C:&nbsp;&nbsp;<input type="text" class="form"  name="C"  ></div>
		 <div class="mb20">D:&nbsp;&nbsp;<input type="text" class="form"  name="D"  ></div>
		 <div class="mb20">问题分数:&nbsp;&nbsp;<input type="text" class="form"  name="wentifenshu"  ></div>
		 <div class="mb20">answer:&nbsp;&nbsp;
		 <select name="ans">
		 <option value="1">A</option>
		 <option value="2">B</option>
		 <option value="3">C</option>
		 <option value="4">D</option>
		 </select>
		 </div>
		 <div class="mb20">排序:&nbsp;&nbsp;<input type="text" class="form"  name="paixu"  ></div>
		 <input type="hidden" class="form"  name="wenjuanid"  value="<?php echo ($wenjuan["id"]); ?>">
		 
		
        

          <div style="text-align:center;margin-top:20px;"><button class="btn" type="submit">添加</button></div>
      </form>
        <div style="text-align:center;margin-top:20px;"><a href="/" class="btn" >返回首页</a></div>


</div>

<!-- footer start -->

<!-- footer end -->
<!-- 去顶部 --> 
</body>
</html>