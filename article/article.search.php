<?php
//关联文件
require_once('connect.php');

//$key%中 % 指示为 name=“key”控件中所涉及的字符或者字符串
$key = $_GET['key'];

//sql检索语句，搜索文章标题中包含 ‘$key’字段（一个或多个）的数据
$sql = "select * from article where title like '%$key%' order by dateline asc";
$query = mysqli_query($con,$sql);
if($query && mysqli_num_rows($query)){
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
}
//print_r("data");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>文章系统-搜索页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="default.css">
</head>
<!-- htmlentities()将字符装换为html实体 -->
<body>
    <div id="wrapper">
    <div id="header">
        <div id="logo">
            <h1><a href="javascipr:void(0)">文章搜索<sup></sup></a></h1>
        </div>
        <div id="menu">
            <ul>
                <li class="active"><a href="article.list.php?p=1">主页文章</a></li>
                <li><a href="about.php">关于我们</a></li>
                <li><a href="contact.php">联系我们</a></li>
            </ul>
        </div>
        </div>
    </div>

    <div id="page">
	<div id="content">
	<?php
		if(empty($data)){	
			echo "<p>当前没有文章，请用户在后台添加文章</p>";
			echo "<p><a href='javascript:void(0)' onclick='fan()'>返回</a></p>";
		}else{
			foreach($data as $value){
	?>
		<div class="post">
			<h1 class="title"><?php echo $value['title']?><span style="color:#ccc;font-size:14px;">　　作者：<?php $au =$value['author'];  echo htmlentities($au) ?></span></h1>
			<div class="entry">
				<?php $de = $value['description']; echo htmlentities($de) ?>
			</div>
			<div class="meta">
				<p class="links"><a href="article.show.php?id=<?php echo $value['id'] ?>" class="more">查看详细</a>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</p>
			</div>
		</div>
	<?php
			}
		}
	?>
	</div>
	
	<!-- <div id="sidebar">
		<ul>
			<li id="search">
				<h2><b class="text1">Search</b></h2>
				<form method="get" action="">
					<fieldset>
					<input type="text" id="s" placeholder="请在主页面进行搜索!" name="s" value="" />
					<input type="submit" id="x" value="Search"  disabled="disabled"/>
					</fieldset>
				</form>
			</li>
		</ul>
	</div> -->
	
	<!-- 禁止两侧出现浮动元素 -->
	<div style="clear: both;">&nbsp;</div>
</div>

<h4 style='text-align:center;color:grey;height:20px;'>Copyright &nbsp;&nbsp; © 2018 文章发布系统 &nbsp;&nbsp; All Rights Reserved</h4>
</body>
</html>
<script>
function fan(){
	window.location.href="article.list.php?p=1";
}
</script>