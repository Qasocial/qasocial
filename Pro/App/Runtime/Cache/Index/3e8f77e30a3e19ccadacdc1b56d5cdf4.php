<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title><?php echo R('Siteinfo/info',array('title'),'Widget');?></title>
<meta name="description" content="<?php echo R('Siteinfo/info',array('description'),'Widget');?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../Public/Css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../Public/Css/style.css" rel="stylesheet" media="screen">
<script src="../Public/Js/jquery.js"></script>
<script src="../Public/Js/bootstrap.min.js"></script>
</head><body id="body">
<header> 
  <!-- 导航开始 -->
 	 <nav id="navbar" class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container"> 
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <h1 class="site-title"><a class="navbar-brand" href="<?php echo U('Index/Index/index');?>"><span class="glyphicon glyphicon-send"></span><?php echo R('Siteinfo/info',array('title'),'Widget');?></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php if(($_GET['catsid']== null) AND ($article['tid'] == null)): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/Index/index');?>">首页</a></li>
          <?php if(is_array($cats)): foreach($cats as $key=>$cats): ?><li <?php if(($_GET['catsid']== $cats['id']) OR ($article['tid'] == $cats['id'])): ?>class="active"<?php endif; ?>><a href="<?php echo U('Index/List/index',array('catsid'=>$cats['id']));?>"><?php echo ($cats["name"]); ?></a></li><?php endforeach; endif; ?>          
        </ul>
        <form class="navbar-form navbar-left" role="search" method="post" id="searchform" action="<?php echo U('Index/Search/index');?>">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="输入关键词搜索" name="s" id="s">
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
<div class="container">
<div class="col-lg-8 col-md-8 content">
<div class="panel panel-warning">
  <div class="panel-heading">
    <h1 class="h3"> » 友情链接</h1>
  </div>
  <div class="panel-body">
<form class="navbar-form navbar-left" role="search" method="post" id="searchform" action="<?php echo U('Reason/add');?>">
<!--  <?php echo U('Login/login');?>" -->
      <div class="form-group">
      <label class="control-label">网站昵称:</label>
        <input type="text" class="form-control" placeholder="输入您网站的昵称 列:easycms" name="name" id="s">
        <label class="control-label">网站地址:</label>
        <input type="text" class="form-control" placeholder="网站格式:http://www.easycms.cc" name="url" id="s">
      </div>
        
    <div class="control-group">
          
<label class="control-label"></label>
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success" type="submit" name="sub1">确定提交</button>
            </div>
        </div>
</form>
 </div>

</div>
<div class="container ucenter">
</div> 
</div>
  <div class="col-lg-4 col-md-4 sidebar">
    <div class="clean"></div>
  
   

    <div class="panel-group mb20" id="accordion">
     

      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
              <span class="glyphicon glyphicon-fire mr10"></span>
              <span itemprop="name">按赞的次数推荐的5篇</span>
            </a>
          </h3>
        </div>
       
        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
      <?php if(is_array($approval)): foreach($approval as $key=>$approval): ?><a href="<?php echo U('Index/Article/index/',array('articleid'=>$approval['article_id']));?>" class="list-group-item" itemprop="url">
        <span itemprop="itemListElement"><?php echo ($approval["title"]); ?></span>
        </a><?php endforeach; endif; ?>
        </div>
      </div>
    

      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
              <span class="glyphicon glyphicon-volume-up mr10"></span>
              <span itemprop="name">最新热门的5篇文章</span>
            </a>
          </h3>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
        <?php if(is_array($approval2)): foreach($approval2 as $key=>$approval2): ?><a href="<?php echo U('Index/Article/index/',array('articleid'=>$approval2['article_id']));?>" class="list-group-item" itemprop="url">
        <span itemprop="itemListElement"><?php echo ($approval2["title"]); ?></span>
        </a><?php endforeach; endif; ?>
         </div>
      </div>
    

      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="">
              <span class="glyphicon glyphicon-thumbs-up mr10"></span>
              <span itemprop="name">随机推荐5篇精选文章</span>
            </a>
          </h3>
        </div>
      <div id="collapseThree" class="panel-collapse in" style="height: auto;">
        <?php if(is_array($approval3)): foreach($approval3 as $key=>$approval3): ?><a href="<?php echo U('Index/Article/index/',array('articleid'=>$approval3['article_id']));?>" class="list-group-item" itemprop="url">
        <span itemprop="itemListElement"><?php echo ($approval3["title"]); ?></span>
        </a><?php endforeach; endif; ?>
        </div>
      </div>
    </div>
    


    
  
  </div>
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
  <button type="button" class="btn btn-default" onclick="window.open('#');" title="赞"><span class="glyphicon glyphicon-thumbs-up"></span></button>
  <button type="button" class="btn btn-default" id="goBottom" title="去底部"><span class="glyphicon glyphicon-arrow-down"></span></button>
</div>
<!-- 去顶部 --> 
<script type="text/javascript">
jQuery(document).ready(function($){
  $('#goTop').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});
  $('#goBottom').click(function(){$('html,body').animate({scrollTop:$('#footer').offset().top}, 800);});
  $('#goComments').click(function(){$('html,body').animate({scrollTop:$('#comments').offset().top}, 800);});
  $('#refresh').click(function(){location.reload();});
});
</body>
</html>