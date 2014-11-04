<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<base href="__ROOT__/" />
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title><?php echo ($article["title"]); ?>-<?php echo R('Siteinfo/info',array('title'),'Widget');?></title>
<meta name="description" content="<?php echo ($article["summary"]); ?>" />
<meta name="keywords" content="<?php echo ($article["keyword"]); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="/Css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/Css/style.css" rel="stylesheet" media="screen">
<script src="/Js/jquery.js"></script>
<script src="/Js/bootstrap.min.js"></script>
</head>
<body id="body">
<header> 
  <!-- 导航开始 -->
  <div class="nav">
<h1>最划算手机套餐</h1>
<a href="">注册</a> <a href=>登陆</a>
</div>
  <!-- 导航结束 --> 
</header>
<div class="container mcontainer">
  <article itemscope itemtype="http://schema.org/Article">
    <div class="col-lg-8 col-md-8 content">
      <div class="clean"></div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="pull-left" itemprop="name"><?php echo ($article["title"]); ?></h1>
          <div class="clean"></div>
        </div>
        <div itemprop="articleBody" class="panel-body">
         <?php echo ($article["content"]); ?>
        </div>
        <div style="clear:both"></div>
        <div style="border-top:1px solid #ddd;">
		  </div>
      <div class="panel-footer">
          <div class="text-muted"> 本文发布于：
            <time itemprop="datePublished" datetime="<?php echo (date("Y-m-d H:i:s",$article["pubtime"])); ?> "><?php echo (date("Y-m-d H:i:s",$article["pubtime"])); ?></time>
             </div>
        </div>
      </div>
    </div>
  </article>

  <div class="clean"></div>
</div>
<!-- footer start -->
<footer id="footer">
  <div class="col-lg-12 col-md-12">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-footer"> <span class="text-muted pull-left">  <?php echo R('Index/Siteinfo/info',array('copyright'),'Widget');?>  </span> <span class="text-muted pull-right"> 源自 <?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></span>
          <div class="clean"></div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- footer end -->
<div class="btn-group-vertical floatButton">
  <button type="button" class="btn btn-default" id="goTop" title="去顶部"><span class="glyphicon glyphicon-arrow-up"></span></button>
  <button type="button" class="btn btn-default" id="refresh" title="刷新"><span class="glyphicon glyphicon-repeat"></span></button>
  
  <button type="button" class="btn btn-default" id="goBottom" title="去底部"><span class="glyphicon glyphicon-arrow-down"></span></button>
</div>
<script type="text/javascript">
jQuery(document).ready(function($){
  $('#goTop').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});
  $('#goBottom').click(function(){$('html,body').animate({scrollTop:$('#footer').offset().top}, 800);});
  $('#goComments').click(function(){$('html,body').animate({scrollTop:$('#comments').offset().top}, 800);});
  $('#refresh').click(function(){location.reload();});
});
</script>
</body>
</html>