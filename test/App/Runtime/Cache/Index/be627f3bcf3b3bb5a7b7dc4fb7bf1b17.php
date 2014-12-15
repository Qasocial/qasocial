<?php if (!defined('THINK_PATH')) exit();?>    <!DOCTYPE html>
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
<script src="/Js/jquery.js"></script>
<script src="/Js/bootstrap.min.js"></script>
</head>
<body id="body" style="background:background: rgba(255, 255, 255, 0.6);padding: 20px;">
      <div class="col-lg-14 col-md-14" id="comments">
        <textarea rows="3" class="form-control" placeholder="输入你的评论内容" id="articleComments" name="articleComments"></textarea>
        <button type="button" class="btn btn-primary" onclick="comment();">留言</button>
        <br/><br/>
      	<a name="comments"></a>
        <div id="ds-ssr">
          <ul id="commentlist" class="list-unstyled">
          <?php if(is_array($comments)): foreach($comments as $key=>$commentsVal): ?><li class="comment even thread-even depth-1" id="li-comment-667">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo ($commentsVal["username"]); ?> 在 <?php echo (date("Y-m-d H:i:s",$commentsVal["pubtime"])); ?> 说:
              </div>
              <div class="panel-body">
                <?php echo ($commentsVal["content"]); ?>
              </div>
            </div>
              <!-- #comment-## --> 
            </li><?php endforeach; endif; ?>
            <!-- #comment-## -->
          </ul>
          <?php echo ($show); ?>
        </div>
      </div>
      <script>
          function comment(){
              var commentVal=$('#articleComments').val();
              var proposal=$('#proposal:checked').val();
              var urlVal=window.location;
              $.post("<?php echo U('Index/Article/addComment');?>",{aid:<?php echo ($aid); ?>,comment:''+commentVal,proposal:''+proposal},
			  function(data){
				alert(data);
                location.reload();
             });
          }
      </script>
</body>
</html>