<?php
require_once('connect.php');

//a链接标签里面的id属性所传过来的值判断所需要详细显示的文章
$id = $_GET['id'];

$sql = "select * from article where id= '$id'";
$query = mysqli_query($con,$sql);
if($query && mysqli_num_rows($query)){
    $row = mysqli_fetch_assoc($query);
}else{
    echo '此文章不存在！';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>文章系统-详情页</title>
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="javascript:void(0)">文章详情<sup></sup></a></h1>
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
<!-- htmlentities()将字符装换为html实体 -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title"><?php $ti =$row['title'];echo htmlentities($ti)?><span style="color:#ccc;font-size:14px;">　作者：<?php $au =$row['author'];  echo htmlentities($au) ?></span></h1>
			<div class="entry">
				<!--文章内容-->			
				<!-- word-wrap:break-word长单词换行	 -->
				<p style="line-height:40px;font-size:16px;word-wrap:break-word;">
<?php $co = $row['content']; echo htmlentities($co)?>
</p>
			</div>
			<!-- <input type='button' value='返回' onclick='window.history.go(-1)'> -->
			<p><a href='javascript:void(0)' onclick='fan()'>返&nbsp;&nbsp;回</a></p>
			<script>
			function fan(){
				window.history.go(-1);
			}
			</script>
		</div>
	</div>
	<!-- end content -->
	
	<!-- <div id="sidebar">
		<ul>
			<li id="search">
				<h2><b class="text1">Search</b></h2>
				<form method="get" action="">
					<fieldset>
					<input placeholder="请在主页面进行搜索!" type="text" id="s" name="s" value=""/>
					<input type="submit" id="x" value="Search" disabled="disabled"/>
					</fieldset>
				</form>
			</li>
		</ul>
	</div> -->
	
	<!-- 对两侧浮动元素进行限制 -->
	<div style="clear: both;">&nbsp;</div>
</div>

<!-- start footer -->
<div id="footer">
	<p id="legal"></p>
</div>
<!-- end footer -->
<h4 style='text-align:center;color:grey;height:20px;'>Copyright &nbsp;&nbsp; © 2018 文章发布系统 &nbsp;&nbsp; All Rights Reserved</h4>
</body>
</html>