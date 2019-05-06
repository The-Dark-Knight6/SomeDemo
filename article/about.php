<?php 
	//加载啊数据库
	require_once('connect.php');
	//选取数据库中所使用的表
	$sql = "select * from  introduce";
	//获得一条表单数据
	$query = mysqli_query($con,$sql);
	//判断是否获取成功并且获取表单条数不为零
	if($query&&mysqli_num_rows($query)){
        //$about = mysqli_result($query,0,'about');mysqli中暂无此函数
		$about =  mysqli_fetch_array($query);
		//利用此函数获取数据库中的数据并存储在变量中
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>文章系统-关于我们</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="javascipr:void(0)">文章发布系统<sup></sup></a></h1>
		<h2></h2>
	</div>
	<div id="menu">
		<ul>
			<li class="active"><a href="article.list.php?p=1">主页文章</a></li>
			<li><a href="about.php">关于我们</a></li>
			<li><a href="contact.php">联系我们</a></li>
		</ul>
	</div>
</div>
<!-- end header -->
</div>

<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
	
		<div class="post">
			<h1 class="title">关于我们</h1>
			<div class="entry">
            <p style="line-height:40px;font-size:16px;"><?php echo $about['about'] ?></p>
			</div>
			
		</div>
	
	</div>
	<!-- end content -->
<!-- 	
	<div id="sidebar">
		<ul>
			<li id="search">
				<h2><b class="text1">Search</b></h2>
				<form method="get" action="">
					<fieldset>
					<input placeholder="请在主页面进行搜索!" type="text" id="s" name="s" value="" />
					<input type="submit" id="x" value="Search"  disabled="disabled"/>
					</fieldset>
				</form>
			</li>
		</ul>
	</div> -->
	<!-- 设置左右两侧不得出现浮动元素 -->
	<div style="clear: both;">&nbsp;</div>
</div>

<!-- start footer -->
<h4 style='text-align:center;color:grey;height:20px;'>Copyright &nbsp;&nbsp; © 2018 文章发布系统 &nbsp;&nbsp; All Rights Reserved</h4>
<!-- end footer -->
</body>
</html>