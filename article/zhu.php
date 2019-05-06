<?php
//关联数据库
require_once('connect.php');
//屏蔽php中内置的notice 信息(当用户输入错误用户名和密码时可清洁屏幕notice提示):
error_reporting(E_ALL ^ E_NOTICE);
//从注册页面中获取相应的值
$ids = $_POST['id'];
$iphone = $_POST['iphone'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$surepassword = $_POST['surepassword'];
$zuozhe = $hang['id'];
//将获取的值存入数据表中
$sql = "insert into users(id,iphone,mail,password,surepassword) 
values ('$ids','$iphone','$mail','$password','$surepassword')";

//打印sql语句，并在数据库中操作，检测是否有误
// echo $sql;

//提示信息
if(mysqli_query($con,$sql)){
    echo "<script>alert('注册成功 ');
    window.location.href='first.php'</script>";
}else{
    echo "<script>alert('注册失败,该用户名已存在！');
    window.location.href='zhuce.php'</script>";
}

?>