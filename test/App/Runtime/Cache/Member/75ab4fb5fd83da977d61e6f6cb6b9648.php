<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<!--[if lte IE 7]><script>window.location.href='http://cdn.dmeng.net/upgrade-your-browser.html?referrer=http://www.dmeng.net/';</script><![endif]-->
<title>队伍管理-<?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></title>
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
 	<div class="nav">
<h1><a href="/">最划算手机套餐</a></h1>

<?php if($_SESSION[C('USER_AUTH_KEY_F')] == ''): ?><a href="/index.php/index/login/checkreg.html">管理员注册</a> <a href="/index.php/index/login">管理员登陆</a>
<?php else: ?>
<span class="navspan">hello,<?php echo $_SESSION[C('USER_AUTH_KEY_F')];?></span><span class="navspan"><a href="/index.php/member">管理已有套餐</a></span> <span class="navspan"><a href="/index.php/index/login/doLogout">退出登录</a></span><?php endif; ?>

</div>
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
						<a href="#panel-963344" data-toggle="tab">队伍管理</a>
					</li>
					<li>
						<a href="#panel-115174" data-toggle="tab">所有队员</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-963344" style="padding: 5px;">
						<div class="text-right">
						<div class="glyphicon glyphicon-plus"></div>
						
							<a id="modal-171545" href="#modal-container-171545" role="button" data-toggle="modal">添加队伍</a>
						</div>
						<h3 class="mb20">
						已添加的队伍：
						</h3>
						<?php if(is_array($teams)): $i = 0; $__LIST__ = $teams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><div class="item">
					<div class="thumbnail">
					    <div class="left">
				        <div class="stickyImg"  >
					  <?php if($li["photo"] != '' ): ?><a   href="<?php echo U('Index/Article/index/',array('articleid'=>$li['team_id']));?>" ><img src="<?php echo ($li["photo"]); ?>"></a>
						<?php else: ?>
						<a   href="<?php echo U('Index/Article/index/',array('articleid'=>$li['team_id']));?>" ><img src="/sysimg/nophoto.jpg"></a><?php endif; ?>
						</div>
						</div>
					<div class="caption">
					  <div class="stickyContent">
					    <h3 class="stickyTitle"><a href="<?php echo U('Index/team/index/',array('id'=>$li['team_id']));?>" title="<?php echo ($li["team_name"]); ?>"><?php echo ($li["team_name"]); ?></a></h3>
                      </div>
					  <div class="stickySummary">
					    <div class="Summary"><a href="<?php echo U('Index/Article/index/',array('id'=>$li['team_id']));?>" title="点击查看详情">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($li["description"]); ?></a></div>
                      </div>
					  <div style="height: 15px;">
                        <!-- <div style="float: right;margin-left: 15px;"><?php echo date( 'y-m-d H:i:s',$li['fbsj'])?></div> -->
                        <div style="float:right;"><a href="#"><?php echo ($li["name"]); ?></a></div>
                      </div>
                    </div>
					<span class="date"><a href="./dteam?teamid=<?php echo ($li["team_id"]); ?>">删&nbsp;&nbsp;除</a></span>

					</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
	
						
				
						
						
						
					</div>
					<div class="tab-pane" id="panel-115174" style="padding: 5px;">
						<div class="text-right">
						<div class="glyphicon glyphicon-plus"></div>
						<a id="modal-171544" href="#modal-container-171544" role="button" data-toggle="modal">添加队员</a>
						</div>
						
						<h3 class="mb20">
						已添加的队员：
						</h3>
			<table class="table">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							姓名
						</th>
						<th>
							所属队伍
						</th>
						<th>
							删除
						</th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($players)): $i = 0; $__LIST__ = $players;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>
						<td>
							<?php echo ($li["player_id"]); ?>
						</td>
						<td>
							<?php echo ($li["player_name"]); ?>
						</td>
						<td><?php echo ($li["team_id"]); ?>
							
						</td>
						<td>
							<a href="./dplayer?playerid=<?php echo ($li["player_id"]); ?>" class="glyphicon glyphicon-remove"></a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>


				</tbody>
			</table>
						<ul>
				
						
						
						</ul>
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
  <!-- <div class="col-lg-4 col-md-4 sidebar">
    <div class="clean"></div>
    <aside class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">公告</h3>
      </div>
      <div class="panel-body">
        <?php echo R('Index/Siteinfo/info',array('announcement'),'Widget');?>
      </div>
    </aside>
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class=""> <span class="glyphicon glyphicon-pushpin mr10"></span> <span itemprop="name">随机推荐5篇文章</span> </a> </h3>
        </div>
        <div  class="panel-collapse in" style="height: auto;"> 
			   <?php if(is_array($sidebar3)): foreach($sidebar3 as $key=>$sidebar3Val): ?><a href="<?php echo U('Index/Article/index',array('articleid'=>$sidebar3Val['article_id']));?>" class="list-group-item"><span><?php echo ($sidebar3Val["title"]); ?></span></a><?php endforeach; endif; ?>
        </div>
      </div>
  </div> -->
  <div class="clean"></div>
</div>
			
			
			<div id="modal-container-171545" class="add  fade" role="dialog" aria-labelledby="myModalLabel" style="display: none;height: 550px;">
				<div class="add-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">
						添加队伍
					</h3>
				</div>
    <div class="input-item">
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
    <iframe id='frameFile' name='frameFile' style='display: none;'></iframe>
				<form action="<?php echo U('person/addteam');?>" method="post" style="text-align:left;">
								<div class="modal-body">
			<div class="input-item">
				队&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名:<input name="team_name" class="input" />
			</div>
			<div class="input-item">
				所属班级:<input name="class" class="input" />
			</div>
			<div class="input-item">
				简&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;介:
				<textarea id="content" name="description" style="height:80px;" maxlength="1000"></textarea>
			</div>

            <input type="hidden" name="photo" id="photo"  value=""/>	
				</div>
				<div class="modal-footer">
					  <button class="btn btn-primary">保存队伍</button>
				</div>
				</form>
			</div>
			<div id="modal-container-171544" class="add fade" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
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
				个人简介:<input name="description" class="input"  />
			</div>
			<div class="input-item">
				所打位置:<select name="position">
        		<option value="中锋">中锋</option>
				<option value="大前锋">大前锋</option>
				<option value="小前锋">小前锋</option>
				<option value="组织后卫">组织后卫</option>
				<option value="得分后卫">得分后卫</option>
							
				</select>
			</div>
			<div class="input-item">
				学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号:<input name="studentid" class="input" />
			</div>


				</div>
				<div class="modal-footer">
					  <button class="btn btn-primary">保存队员</button>
				</div>
				</form>
			</div>
			<script type="text/javascript" language="javascript">
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
    </script>
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