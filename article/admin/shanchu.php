<?php
// 启动php session
session_start();
//屏蔽php中内置的notice 信息(当用户输入错误用户名和密码时可清洁屏幕notice提示):
error_reporting(E_ALL ^ E_NOTICE);
//链接数据库文件
require_once('../connect.php');
//php临时保存的当前用户
$yong = $_SESSION['myself'];
//sql语句删除用户账户数据
$shan = "delete from users where id = '$yong'";
//sql删除用户所创建的文章数据
$chu = "delete from article where zuozhe = '$yong'";
//php执行删除操作
$hu = mysqli_query($con,$shan);
$shu = mysqli_query($con,$chu);
//判断是否删除成功
if($hu && $shu){
    echo "<script>alert('注销成功！');window.location.href='../first.php'</script>";
}else{
    echo '删除失败'.mysqli_error($con);
}
?>