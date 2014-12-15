<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EasyCMS安装</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="../Public/Css/bootstrap.css" rel="stylesheet">
        <link href="../Public/Css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../Public/Css/install.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="__PUBLIC__/Js/html5shiv.js"></script>
        <![endif]-->
        <script src="../Public/Js/jquery-1.10.2.min.js"></script>
        <script src="../Public/Js/bootstrap.js"></script>
    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <!-- Navbar
        ================================================== -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" target="_blank" href="#">EasyCMS</a>
                    <div class="nav-collapse collapse">
                    	<ul id="step" class="nav">
                    		
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li><a href="javascript:;">环境检测</a></li>
    <li><a href="javascript:;">创建数据库</a></li>
    <li><a href="javascript:;">安装</a></li>
    <li><a href="javascript:;">完成</a></li>

                    	</ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron masthead">
            <div class="container">
                
    <h1>欢迎使用 EasyCMS V1.0</h1>
    <br/><br/>
    <p>EasyCMS是轻量级可扩展的开源内容管理程序，遵循Apache2开源协议发布，任何人可以免费分发使用</p>
    
    <p>开发小组:三个臭皮匠</p>
    <p>小组口号:变成诸葛亮</p>
    <p>开发人员:陈捷　柳杰彬　石武浩</p>

    



            </div>
        </div>


        <!-- Footer
        ================================================== -->
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
                	
    <a class="btn btn-primary btn-large" href="<?php echo U('Install/step1');?>">同意安装</a>
    <a class="btn btn-large" href="javascript:void(0);" title="亲,您必须同意">不同意</a>

                </div>
            </div>
        </footer>
    </body>
</html>