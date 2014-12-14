<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<title>比赛管理页-<?php echo R('Index/Siteinfo/info',array('title'),'Widget');?></title>
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
               <h3 style="text-align:center;">基本信息</h3>
                <div class="form-style">
				<div class="form-title"><span>主队：</span></div>
				<div class="form-content" style="line-height:35px;">
				<?php echo ($data["Aname"]); ?>
				</div>
				</div>
				<div class="form-style">
				<div class="form-title"><span>客队：</span></div>
				<div class="form-content" style="line-height:35px;">
				<?php echo ($data["Bname"]); ?>
				</div>
				</div>
				<div class="form-style">
				<div class="form-title"><span>地点日期：</span></div>
				<div class="form-content" style="line-height:35px;">
				where:<?php echo ($data["whereplay"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;when:<?php echo ($data["whenplay"]); ?>
				</div>
				</div>
				<div class="form-style">
				<div class="form-title"><span>是否直播中：</span></div>
				
				<div class="form-content" style="line-height:35px;">
				<?php if($data["isplaying"] == 0): ?>over &nbsp;&nbsp;&nbsp;&nbsp; <a href="__URL__/isplaying?id=<?php echo ($Playingid); ?>&is=<?php echo ($data["isplaying"]); ?>">已结束</a>
				<?php elseif($data["isplaying"] == 1): ?>X&nbsp;&nbsp;&nbsp;&nbsp; <a href="__URL__/isplaying?id=<?php echo ($Playingid); ?>&is=<?php echo ($data["isplaying"]); ?>">点此设为直播</a>
				<?php else: ?>√&nbsp;&nbsp;&nbsp;&nbsp; <a href="__URL__/isplaying?id=<?php echo ($Playingid); ?>&is=<?php echo ($data["isplaying"]); ?>">点此结束直播</a><?php endif; ?>
				</div>
				</div>
				<?php if($data["isplaying"] == 2): ?><hr>
				 <h3 style="text-align:center;">直播信息</h3>
				 <div class="form-style">
				<div class="form-title"><span>目前比分：</span></div>
				<div class="form-content" style="line-height:35px;">
				<?php echo ($data["Aname"]); ?>队&nbsp;&nbsp;<span style="color:#F40;font-size:16px;"><?php echo ($data["Apoints"]); ?>&nbsp;:&nbsp;<?php echo ($data["Bpoints"]); ?></span>&nbsp;&nbsp;<?php echo ($data["Bname"]); ?>队
				</div>
				</div>
		  
		  
		<form method="post" action="__URL__/points"   name="form2">  
		  <div class="form-style">
				<div class="form-title"><span>得分修改：</span></div>
				<div class="form-content" style="line-height:35px;">
				 <select name="team">
        		<option value="0"><?php echo ($data["Aname"]); ?>&nbsp;队</option>
				<option value="1"><?php echo ($data["Bname"]); ?>&nbsp;队</option>
		 </select>
		         <select name="points">
        		<option value="1">+1分</option>
				<option value="2">+2分</option>
				<option value="3">+3分</option>
				<option value="-1">-1分加错时</option>
		         </select>
				 <button type="submit" onClick="javascript:return CheckForm();" style="height: 30px;line-height: 20px;margin-left: 20px;">提交分数</button>
				</div>
				</div>
		<input type="hidden" value="<?php echo ($data["id"]); ?>" name="id">
		  </form>
	
		<form method="post" action="__URL__/jieshuo"   name="form3">	
			<div class="form-style" style="">
			<div class="form-title"><span>发布图文直播：</span></div>
		<div class="form-content" style="line-height:35px;">
			 <select name="jie">
        		<option value="一">第一节</option>
				<option value="二">第二节</option>
				<option value="三">第三节</option>
				<option value="四">第四节</option>
		 </select>
		         <select name="min">
        		<option value="1">第1分钟</option>
				<option value="2">第2分钟</option>
				<option value="3">第3分钟</option>
				<option value="4">第4分钟</option>
				<option value="5">第5分钟</option>
				<option value="6">第6分钟</option>
				<option value="7">第7分钟</option>
				<option value="8">第8分钟</option>
				<option value="9">第9分钟</option>
				<option value="10">第10分钟</option>
		         </select>
		</div>
		            </div>
			<div style="margin-left: 100px;margin-bottom: 30px;"><textarea id="content" name="content" style="height:180px;" ></textarea><p> 
   <span class="word_surplus">还可以输入1000字</span> 
</p></div>
		<input type="hidden" value="<?php echo ($data["id"]); ?>" name="playingid">
        <div style="width:100%">
		<button type="submit" onClick="javascript:return CheckForm();" class="form-submit">发布直播</button>
        </div>
	</form>
	<hr>
	<h3 style="text-align:center;">前十条解说</h3>
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
						<th>
							删除
						</th>
					</tr>
				</thead>
				<tbody>
	<?php if(is_array($jieshuo)): $i = 0; $__LIST__ = $jieshuo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>    <td>
							<?php echo date( 'y-m-d h:m:s', $li['pubtime'] )?></td>
						<td>
							<?php echo ($li["content"]); ?></td>
						<td>
							第<?php echo ($li["jie"]); ?>节，第<?php echo ($li["min"]); ?>分钟</td>
						<td>
							<a href="./djieshuo?id=<?php echo ($li["id"]); ?>" class="glyphicon glyphicon-remove"></a>
						</td>
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
		  
		  
		
	
		
	<hr>
	<h3 style="text-align:center;">前十条解说</h3>
	<table class="table">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							内容
						</th>
						<th>
							发布时间
						</th>
						<th>
							删除
						</th>
					</tr>
				</thead>
				<tbody>
	<?php if(is_array($jieshuo)): $i = 0; $__LIST__ = $jieshuo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>    <td>
							<?php echo date( 'y-m-d h:m:s', $li['pubtime'] )?>							</td>
						<td>
							<?php echo ($li["content"]); ?>						</td>
						<td>
							第<?php echo ($li["jie"]); ?>节，第<?php echo ($li["min"]); ?>分钟</td>
						<td>
							<a href="./djieshuo?id=<?php echo ($li["id"]); ?>" class="glyphicon glyphicon-remove"></a>
						</td>
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