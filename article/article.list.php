<?php
//php 临时存储用户名变量
session_start();
// 传入页码
 $page = $_GET['p'];
 //从第几条数据开始读取
 $current = ($page - 1)*5;
//关联链接文件
require_once('connect.php');
//选取所有文章并以正序检索
$sql = "select * from article order by dateline asc limit $current,5";
//执行sql语句
$query = mysqli_query($con,$sql);
//读取sql数据
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
    <title>文章发布系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="default.css">
</head>
<!-- htmlentities()将字符装换为html实体 -->
<body>
    <div id="wrapper">
    <div id="header">
        <div id="logo">       
            <h1><a href="article.list.php?p=1">文章发布系统<sup></sup></a></h1>
            <h2>个人网址http://www.baidu.com</h2>
        </div>
        <div id="menu">
            <ul>
                <li class="active"><a href="article.list.php?p=1">主页文章</a></li>
                <li><a href="about.php">关于我们</a></li>
                <li><a href="contact.php">联系我们</a></li>
				<li><a href="admin/article.manage.php?p=1">文章管理</a></li>
               
            </ul>
        </div>
        </div>
    </div>

    <div id="page">
	<div id="content">
	<?php
        //判断传入值的空否
		if(empty($data)){	
			echo "当前没有文章，请管理员在后台添加文章";
		}else{
			foreach($data as $value){
	?>
		<div class="post">
			<h1 class="title"><?php $tit =$value['title']; echo htmlentities($tit) ?>
			<span style="color:#ccc;font-size:14px;">　　作者：<?php $au = $value['author']; echo htmlentities($au)?></span>
			<span style="color:#ccc;font-size:14px;">　　时间：<?php $da = $value['dateline']; echo htmlentities($da) ?></span>
			</h1>
			<div class="entry">
				<p style="line-height:25px;font-family:'微软雅黑'"><?php $de = $value['description']; echo htmlentities($de) ?></p>
			</div>
			<div class="meta">
				<p class="links"><a href="article.show.php?id=<?php  echo $value['id'] ?>" class="more">查看详细</a>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;</p>
			</div>
		</div>
		
	<?php
			}
        }		
            //sql 选取所有文章
            $total_sql = 'select count(*) from article';
            //php择取一条sql语句
            $come = mysqli_query($con,$total_sql);
            //获取所选择的sql数据
            $total_result = mysqli_fetch_array($come);
            //获取所有文章数量
            $total = $total_result[0];
            //文章数量五页一份，返回最小整数头文件
            $total_page = ceil($total/5);
            //创建链接
            $page_banner = "";
            if($page > 1){
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p=1'.">首页</a>";
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p='.($page-1).">上一页</a>";
            }
            if($page < $total_page){
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p='.($page+1).">下一页</a>";
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p='.($total_page).">尾页</a>";
            }
            //打印出翻页效果数据
            echo $page_banner;
            echo "<span style='margin:20px;'>当前第 {$page} 页</span>";            
            echo "共 {$total_page} 页";
	?>
	</div>
	
	<div id="sidebar">
		<ul>
			<li id="search">
				<h2><b class="text1">Search</b></h2>
				<form method="get" action="article.search.php" onsubmit='return yan()'>
					<fieldset>
					<input placeholder='搜索文章/输入文章首字符' autocomplete="off" type="text" id="sper" name="key"/>
					<input type="submit" id="x" value="Search" style='margin-left:10px'/>
					</fieldset>
				</form>
			</li>
		</ul>
	</div>
    <!-- 控制左右两边的浮动元素 -->
	<div style="clear: both;">&nbsp;</div>
</div>

<h4 style='text-align:center;color:grey;height:20px;'>Copyright &nbsp;&nbsp; © 2018 文章发布系统 &nbsp;&nbsp; All Rights Reserved
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当前用户：<?php echo $_SESSION['myself'] ?>
<a href="javascript:void(0)" style="color:grey;margin-left:30px;" id="tui"
 onmousemove="on()" onmouseout="out()" onclick="chu()">退出登录</a></h4>
</body>
</html>

<script>
//搜索框的验证
function yan(){
    var dd = document.getElementById('sper').value;
    if(dd == ""){
        alert("请输入搜索关键词!");
        document.getElementById('sper').focus();
        return false;
    }else{
        return true;
    }
}
//“退出登录”的地址（不可返回）
function chu(){
    window.location.replace("first.php");
}
//“退出登录”相应鼠标事件函数
function on(){
    document.getElementById("tui").style.color="red";
}
function out(){
    document.getElementById("tui").style.color="grey";
}

</script>
<script language="javascript">
    //防止页面后退(本系统仅在首页和登录，注册页面使用)
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
</script>