<?php
//有关加载防止xss攻击和sql注入
require('xssattarck.php');
// Webscan
$Webscan = new Webscan();
if ($Webscan->check()) {
    exit('系统检测到有攻击行为存在');
}
//屏蔽php中内置的notice 信息:error_reporting(E_ALL ^ E_NOTICE);

//将传递过来的信息入库，在入库之前对所有信息进行效验
require_once('../connect.php');

//print_r($_POST);打印所传递的信息

//以此设置所传导的信息入数据库
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$content = $_POST['content'];
$shi = time();
$dateline = date("y-m-d",$shi);
$zuozhe = $_POST['zuozhe'];
//向数据库中插入新添加的信息
$insertsql = "insert into article (title,author,description,content,dateline,zuozhe)
values('$title','$author','$description','$content','$dateline','$zuozhe')";

//echo $insertsql;
//检测添加信息是否成功
if(mysqli_query($con,$insertsql)){
    echo "<script>alert('发布文章成功!');window.location.href='article.manage.php?p=1'</script>";
}else{
    echo "文章发布失败".mysqli_error($con);
}
?>