<?php 
	//加载相关数据库
	require_once('connect.php');
	//选择数据库数据并执行操作
	$sql = "select * from  introduce";
	$query = mysqli_query($con,$sql);
	if($query && mysqli_num_rows($query)){
		$contact = mysqli_fetch_assoc($query);
	}
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>文章系统-联系我们</title>
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
			<h1 class="title">联系我们</h1>
			<div class="entry">
            <p style="line-height:40px;font-size:16px;"><?php echo $contact['contact'] ?></p>
			</div>
			
		</div>
	
	</div>
	<!-- end content -->
	
	<!-- <div id="sidebar">
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

	<!-- 限制两侧浮动元素 -->
	<div style="clear: both;">&nbsp;</div>
</div>

<!-- start footer -->
<div id="footer">
<p id="legal"></p>
</div>
<h4 style='text-align:center;color:grey;height:20px;'>Copyright &nbsp;&nbsp; © 2018 文章发布系统 &nbsp;&nbsp; All Rights Reserved</h4>
<!-- end footer -->
</body>
</html>