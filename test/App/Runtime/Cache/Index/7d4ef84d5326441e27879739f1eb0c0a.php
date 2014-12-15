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
   <nav id="navbar" class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container"> 
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <h1 class="site-title"><a class="navbar-brand" href="<?php echo U('Index/Index/index');?>"><span class="glyphicon glyphicon-tower"></span><?php echo R('Siteinfo/info',array('title'),'Widget');?></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php if(($_GET['catsid']== null) AND ($article['tid'] == null)): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/Index/index');?>">首页</a></li>
          <?php if(is_array($cats)): foreach($cats as $key=>$cats): ?><li <?php if(($_GET['catsid']== $cats['id']) OR ($article['tid'] == $cats['id'])): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/List/index',array('catsid'=>$cats['id']));?>"><?php echo ($cats["name"]); ?></a></li><?php endforeach; endif; ?>          
        </ul>
        <form class="navbar-form navbar-left" role="search" method="post" id="searchform" action="<?php echo U('Index/Search/index');?>">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="输入要搜索的赛事" name="s" id="s">
          </div>
          <button type="submit" class="btn btn-default" id="searchsubmit"><span class="glyphicon glyphicon-search"></span></button>
        </form>
        <ul class="nav navbar-nav navbar-right header-nav-right" id="user">
       
        <script>
        $(function(){
          $.get("<?php echo U('Index/Article/checkuser');?>",function(data) {
                $('#user').html(data);
          });
        })
        </script>

        </ul>
      </div>
    </div>
  </nav>
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
<!--评论开始-->
<iframe class="col-lg-12 col-md-12" scrolling="no"  src="<?php echo U('Index/Comment/comments_article',array('aid'=>$aid));?>" frameborder="0"  style="max-width:730px;min-height:540px;padding:0;margin:0 auto;"></iframe>
<!--评论结束-->
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