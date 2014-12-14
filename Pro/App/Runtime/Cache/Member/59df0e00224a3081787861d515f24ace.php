<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<!--[if lte IE 7]><script>window.location.href='http://cdn.dmeng.net/upgrade-your-browser.html?referrer=http://www.dmeng.net/';</script><![endif]-->
<title>比赛管理-<?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></title>
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
						<a href="#panel-963344" data-toggle="tab">比赛管理</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-963344" style="padding: 5px;">
						<div class="text-right">
						<div class="glyphicon glyphicon-plus"></div>
						<a id="modal-171545" href="#modal-container-171545" role="button" data-toggle="modal">添加比赛</a>
						</div>
						<h3 class="mb20">
						已添加的比赛：
						</h3>
						<?php if(is_array($plays)): $i = 0; $__LIST__ = $plays;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><div>
					   主队:<?php echo ($li["Aname"]); ?> 
					   客队：<?php echo ($li["Bname"]); ?>
					   比赛时间：<?php echo ($li["whenplay"]); ?>
					   比赛地点：<?php echo ($li["whereplay"]); ?>
					    状态：<?php if($li["isplaying"] == 0): ?>已结束<elseif condition="$li.isplaying eq 1">未开始<?php else: ?>正在激战<?php endif; ?>
					   <a href="./dplaying?playingid=<?php echo ($li["id"]); ?>">删除</a>
					   <a href="./showedit?playingid=<?php echo ($li["id"]); ?>">管理比赛</a>
					   
					   </div><?php endforeach; endif; else: echo "" ;endif; ?>
	
						
				
						
						
						
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
  <div class="col-lg-4 col-md-4 sidebar">
    <div class="clean"></div>
    <aside class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">公告</h3>
      </div>
      <div class="panel-body">
        <?php echo R('Index/Siteinfo/info',array('announcement'),'Widget');?>
      </div>
    </aside>
     <!--  <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=""> <span class="glyphicon glyphicon-pushpin mr10"></span> <span itemprop="name">随机推荐5篇文章</span> </a> </h3>
        </div>
        <div  class="panel-collapse in" style="height: auto;"> 
			   <?php if(is_array($sidebar3)): foreach($sidebar3 as $key=>$sidebar3Val): ?><a href="<?php echo U('Index/Article/index',array('articleid'=>$sidebar3Val['article_id']));?>" class="list-group-item"><span><?php echo ($sidebar3Val["title"]); ?></span></a><?php endforeach; endif; ?>
        </div>
      </div> -->
  </div>
  <div class="clean"></div>
</div>
			
			
			<div id="modal-container-171545" class="add  fade" role="dialog" aria-labelledby="myModalLabel" style="display: none;height: 550px;">
				<div class="add-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">
						添加比赛
					</h3>
				</div>
  <!--   <div class="input-item">
				队伍图片:
			
    <form id='formFile' name='formFile' method="post" action="/index.php/member/upper/muploadImg" target='frameFile'
    enctype="multipart/form-data">
    <input type='file' id='fileUp' name='fileUp' />
    <div id='uploadLog'>
    </div>
    <br />
    <img width='100' src='' height='100' id='imgShow' alt='缩略图' />
    </form>
	</div>
    <iframe id='frameFile' name='frameFile' style='display: none;'></iframe> -->
				<form action="<?php echo U('playing/addplaying');?>" method="post" style="text-align:left;">
								<div class="modal-body">
			<div class="input-item">
				主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;队:
				<select name="teamA">
				<?php if(is_array($teams)): $i = 0; $__LIST__ = $teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teamsA): $mod = ($i % 2 );++$i;?><option value="<?php echo ($teamsA["team_id"]); ?>"><?php echo ($teamsA["team_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							
				</select>
			</div>
			<div class="input-item">
				客&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;队:
				<select name="teamB">
				<?php if(is_array($teams)): $i = 0; $__LIST__ = $teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teamsB): $mod = ($i % 2 );++$i;?><option value="<?php echo ($teamsB["team_id"]); ?>"><?php echo ($teamsB["team_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							
				</select>
			</div>
			<div class="input-item">
				比赛时间:
				<textarea name="whenplay" style="height:40px;" maxlength="200"></textarea>
			</div>	
			<div class="input-item">
				比赛地点:
				<textarea name="whereplay" style="height:40px;" maxlength="200"></textarea>
			</div>
				</div>
				<div class="modal-footer">
					  <button class="btn btn-primary">保存比赛</button>
				</div>
				</form>
			</div>
			<!-- <div id="modal-container-171544" class="add fade" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
				<div class="add-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">
						添加队员
					</h3>
				</div>
				<form action="<?php echo U('person/addplayer');?>" method="post" style="text-align:left;">
								<div class="modal-body">
			<div class="input-item">
				姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:<input name="player_name" class="input" />
			</div>
			<div class="input-item">
				所属队伍:&nbsp;<select name="team_id">
				<?php if(is_array($teams)): $i = 0; $__LIST__ = $teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teams): $mod = ($i % 2 );++$i;?><option value="<?php echo ($teams["team_id"]); ?>"><?php echo ($teams["team_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							
				</select>
			</div>
			<div class="input-item">
				所打位置:<input name="book.age" class="input" placeholder="C/PF/SF/PG/SG" />
			</div>
			<div class="input-item">
				学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号:<input name="book.country" class="input" />
			</div>


				</div>
				<div class="modal-footer">
					  <button class="btn btn-primary">保存队员</button>
				</div>
				</form>
			</div> -->
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
<!-- 	<script type="text/javascript" language="javascript">
        $(function() {
            $('#fileUp').change(function() {
                $('#imgShow').attr('src', '/sysimg/loading.gif');
                $('#formFile').submit();
            });
        })
        function uploadSuccess(msg) {
                $('#imgShow').attr('src', msg);
				$('#photo').attr('value', msg);
        }
    </script> -->
</body>
</html>