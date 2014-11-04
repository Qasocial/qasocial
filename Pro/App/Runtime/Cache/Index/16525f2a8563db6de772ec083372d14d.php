<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title><?php echo ($catName); ?>-<?php echo R('Siteinfo/info',array('title'),'Widget');?></title>
<meta property="og:description" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="/Css/bootstrap.min.css" rel="stylesheet" media="screen">

<link href="/Css/style.css" rel="stylesheet" media="screen">
<script src="/Js/jquery.js"></script>
<script src="/Js/bootstrap.min.js"></script>
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
  <div itemscope itemtype="http://schema.org/ItemList">
    <div class="col-lg-8 col-md-8 content">
      <div class="clean"></div>
  
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="pull-left" itemprop="headline"><?php echo ($catName); ?></h1>
          <div class="clean"></div>
        </div>
        <div class="panel-body">

        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><div class="item">
					<div class="thumbnail">
					    <div class="left">
				        <div class="stickyImg"  >
					  <?php if($li["photo"] != '' ): ?><a   href="<?php echo U('Index/Article/index/',array('articleid'=>$li['article_id']));?>" ><img src="<?php echo ($li["photo"]); ?>"></a>
						<?php else: ?>
						<a   href="<?php echo U('Index/Article/index/',array('articleid'=>$li['article_id']));?>" ><img src="/sysimg/nophoto.jpg"></a><?php endif; ?>
						</div>
						</div>
					<div class="caption">
					  <div class="stickyContent">
					    <h3 class="stickyTitle"><a href="<?php echo U('Index/team/index/',array('id'=>$li['team_id']));?>" title="<?php echo ($li["team_name"]); ?>"><?php echo ($li["team_name"]); ?></a></h3>
                      </div>
					  <div class="stickySummary">
					    <div class="Summary"><a href="<?php echo U('Index/team/index/',array('id'=>$li['team_id']));?>" title="点击查看详情">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($li["description"]); ?></a></div>
                      </div>
					  <div style="height: 15px;">
                        <!-- <div style="float: right;margin-left: 15px;"><?php echo date( 'y-m-d H:i:s',$li['fbsj'])?></div> -->
                        <div style="float:right;"><a href="#"><?php echo ($li["name"]); ?></a></div>
                      </div>
                    </div>

					</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <div class="panel-footer text-muted"> 共<?php echo ($count); ?>个结果 </div>
      </div>
      <?php echo ($show); ?>
 
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