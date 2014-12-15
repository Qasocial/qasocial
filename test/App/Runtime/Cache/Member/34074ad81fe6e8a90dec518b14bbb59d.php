<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title>公告发布页-<?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></title>
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
	<form method="post" action="__URL__/insert"   name="myform">
                <div class="form-style">
				<div class="form-title"><span>标题：</span></div>
				<div class="form-content">
				<input class="s-form" type="text" maxlength="25" style="width:340px" name="title" placeholder="最多25个字" required="required"/>
				</div>
				</div>
		
			<div class="form-style">
			<div class="form-title"><span>公告详情：</span></div>
			<div class="form-content" style="display: table;"><span style="display: table-cell;vertical-align: middle;"></span></div>
            </div>
			<div style="margin-left: 140px;margin-bottom: 30px;"><textarea id="content" name="content" style="height:280px;" ></textarea><p> 
   <span class="word_surplus">还可以输入1000字</span> 
</p></div>
				
        <div style="width:100%">
		<button type="submit" onClick="javascript:return CheckForm();" class="form-submit">发布公告</button>
        </div>
	</form>
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