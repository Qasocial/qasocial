<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title>比赛页-<?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></title>
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


            <div>
			<div class="col-md-12 vsheader">
				<div class="vs-4">
				home
				</div>
				<div class="vs-2" >
				<div style="background-color: #1e518c;height:39px;color:#fff;">对阵信息</div>
				</div>
				<div class="vs-4">
				away
				</div>
			</div>
			<div class="col-md-12">
				<div class="vs-4 home-team">
				<span class="teamname right"><?php echo ($data["Aname"]); ?></span>
				</div>
				<div class="vs-2">
				<span class="vs">vs</span></div>
				<div class="vs-4 away-team">
				<span class="teamname left"><?php echo ($data["Bname"]); ?></span></div>
			</div>
			<div class="col-md-12 vsbottom ">
				<div class="vs-4">
				比赛地点：<?php echo ($data["whereplay"]); ?></div>
				<div class="vs-2">
				<?php if($data["isplaying"] == 0): ?>已结束 
				<?php elseif($data["isplaying"] == 1): ?>未开始
				<?php else: ?>正在激战！<?php endif; ?>
				</div>
				<div class="vs-4">
				比赛时间：<?php echo ($data["whenplay"]); ?></div>
			</div>
			</div>

	<div class="clean"></div>
				<?php if($data["isplaying"] == 2): ?><div style="text-align:center; height:50px;line-height:50px;margin-top:20px; font-size:20px;">
				<?php echo ($data["Aname"]); ?>&nbsp;&nbsp;<span style="color:#F40;font-size:50px;"><?php echo ($data["Apoints"]); ?>&nbsp;:&nbsp;<?php echo ($data["Bpoints"]); ?></span>&nbsp;&nbsp;<?php echo ($data["Bname"]); ?>
				</div>
	<hr>
	<h3 style="text-align:center;">解说栏</h3>
	<table class="table">
				<thead>
					<tr>
						<th>
							发布时间
						</th>
						<th>
							内容
						</th>
						<th>
							比赛节时
						</th>

					</tr>
				</thead>
				<tbody>
	<?php if(is_array($jieshuo)): $i = 0; $__LIST__ = $jieshuo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>   						<td>
							<?php echo date( 'y-m-d h:m:s', $li['pubtime'] )?>							</td>
						<td>
							<?php echo ($li["content"]); ?>						</td>
						<td>
							第<?php echo ($li["jie"]); ?>节，第<?php echo ($li["min"]); ?>分钟</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
			</table><?php endif; ?>
	
	<?php if($data["isplaying"] == 0): ?><hr>
				 <h3 style="text-align:center;">比赛己结束</h3>
				 <div class="form-style">
				<div class="form-title"><span>最终比分：</span></div>
				<div class="form-content" style="line-height:35px;">
				<?php echo ($data["Aname"]); ?>队&nbsp;&nbsp;<span style="color:#F40;font-size:16px;"><?php echo ($data["Apoints"]); ?>&nbsp;:&nbsp;<?php echo ($data["Bpoints"]); ?></span>&nbsp;&nbsp;<?php echo ($data["Bname"]); ?>队
				</div>
				</div>
				<h1 style="text-align:center;color:#f40;">比赛结果：<?php echo ($data["result"]); ?></h3>
		  

	<h3 style="text-align:center;">解说栏</h3>
	<table class="table">
				<thead>
					<tr>
						<th>
							发布时间
						</th>
						<th>
							内容
						</th>
						
						<th>
							比赛节时
						</th>
					</tr>
				</thead>
				<tbody>
	<?php if(is_array($jieshuo)): $i = 0; $__LIST__ = $jieshuo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>    <td>
							<?php echo date( 'y-m-d h:m:s', $li['pubtime'] )?></td>
						<td>
							<?php echo ($li["content"]); ?></td>
						<td>
							第<?php echo ($li["jie"]); ?>节，<?php echo ($li["min"]); ?>分钟</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
			</table><?php endif; ?>
</div>
<div style="clear:both"></div>
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