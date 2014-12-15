<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title>队伍介绍-<?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></title>
<meta name="description" content="<?php echo R('Siteinfo/info',array('description'),'Widget');?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/Css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/css/fabu.css" rel="stylesheet" type="text/css" />
<link href="/Css/style.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="/editor/themes/default/default.css" />
<script charset="utf-8" src="/editor/kindeditor.js"></script>
<script charset="utf-8" src="/editor/lang/zh_CN.js"></script>

</head>
<body class="bg">
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
<div class="fabubg mcontainer">
<h3 style="margin-left:100px;">基本资料:</h3>
<hr>
<div class="form-style">
				<div class="form-title"><span>队名：</span></div>
				<div class="form-content" style="line-height:35px;">
				<?php echo ($data["team_name"]); ?>
				</div>
				</div>
<div class="form-style">
				<div class="form-title"><span>所属班级：</span></div>
				<div class="form-content" style="line-height:35px;">
				<?php echo ($data["class"]); ?>
				</div>
				</div>
<div class="form-style">
				<div class="form-title"><span>简介：</span></div>
				<div class="form-content" style="line-height:35px;">
				<?php echo ($data["description"]); ?>
				</div>
				</div>
<div class="form-style">
				<div class="form-title"><span>队伍图片：</span></div>
				<div class="form-content" style="height:180px;">
				<img src="<?php echo ($data["photo"]); ?>" >
				</div>
				</div>
				<div class="clean"></div>
<div class="form-style">
				<div class="form-title"><span>队伍排名：</span></div>
				<div class="form-content" style="line-height:35px;">
				排名功能未添加
				</div>
				</div>
<hr>
<h3 style="margin-left:100px;">所有队员:</h3>
       <table class="table" style="width:80%;margin: 0 auto;">
				<thead>
					<tr>
						<th>
							姓名
						</th>
						<th>
							所打位置
						</th>
						<th>
							简介
						</th>
						<th>
							学号
						</th>
					</tr>
				</thead>
				<tbody>
	<?php if(is_array($players)): $i = 0; $__LIST__ = $players;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>    <td>
							<?php echo ($li["player_name"]); ?></td>
						<td>
							<?php echo ($li["position"]); ?></td>
						<td>
						<?php echo ($li["description"]); ?></td>
						<td>
							<?php echo ($li["studentid"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
			</table>  
<div style="clear:both"></div>
</div>
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

<script type="text/javascript" src="/Js/fabunews.js"></script>
</body>
</html>