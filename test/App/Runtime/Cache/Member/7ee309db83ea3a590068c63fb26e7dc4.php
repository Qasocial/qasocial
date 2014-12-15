<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<!--[if lte IE 7]><script>window.location.href='http://cdn.dmeng.net/upgrade-your-browser.html?referrer=http://www.dmeng.net/';</script><![endif]-->
<title>公告管理-<?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></title>
<meta name="description" content="<?php echo R('Siteinfo/info',array('description'),'Widget');?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/Css/bootstrap.min.css" rel="stylesheet" media="screen">
<!--[if lt IE 9]>
<script src="http://cdn.dmeng.net/wp-content/themes/dmeng/js/html5shiv.js"></script>
<script src="http://cdn.dmeng.net/wp-content/themes/dmeng/js/respond.min.js"></script>
<![endif]-->
<link href="/Css/style.css" rel="stylesheet" media="screen">
<script src="/Js/jquery.js"></script>
<script src="/Js/bootstrap.min.js"></script>
</head><body id="body">
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
  <div class="col-lg-8 col-md-8 content">
<div >
    <div class="row row-offcanvas row-offcanvas-left">
                    <div class="col-md-2 uc_left sidebar-offcanvas" id="sidebar" role="navigation">
          <ul class="nav nav-pills  nav-stacked uc_left ">
             <li class="left_head"><h4>会员中心</h4></li>
              <li><a href="<?php echo U('Person/index');?>">我的首页</a></li>
			  <li> <a href="<?php echo U('/member/teamedit/index');?>">队伍管理</a></li>
			  <li> <a href="<?php echo U('/member/annonce/index');?>">公告管理</a></li>
			  <li> <a href="<?php echo U('/member/playing/index');?>">比赛管理</a></li>
          </ul>
        </div>
		<!-- 左侧菜单over -->
    <div class="col-md-10" id="content">
   <div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="tabbable" id="tabs-462262">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-963344" data-toggle="tab">公告管理</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-963344" style="padding: 5px;">
						<div class="text-right">
						<div class="glyphicon glyphicon-plus"></div>
						
							<a  href="<?php echo U('annonce/annonce');?>" role="button" >添加公告</a>
						</div>
						<h3 class="mb20">
						已添加的公告：
						</h3>
				
				<table class="table">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							标题
						</th>
						<th>
							删除
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>
						<td>
							<?php echo ($li["article_id"]); ?>						</td>
						<td>
							<?php echo ($li["title"]); ?>							</td>
						<td>
							<a href="./darticle?articleid=<?php echo ($li["article_id"]); ?>" class="glyphicon glyphicon-remove"></a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
					
	
						
				
						
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
</body>
</html>