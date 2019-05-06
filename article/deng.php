<?php
//php 缓存开始
session_start();
//屏蔽php中内置的notice 信息(当用户输入错误用户名和密码时可清洁屏幕notice提示):
error_reporting(E_ALL ^ E_NOTICE);

//关联数据库info
require_once('connect.php');
//获取input表单中的信息
$ids = $_POST['id'];
$password = $_POST['name'];
$_SESSION['myself'] = $_POST['id'];
//读取数据表中用户名的信息
$sele = "select id ,password from users where id='$ids'";
//取出用户名表中的相关信息
$cc = mysqli_query($con,$sele);
if($cc && mysqli_num_rows($cc)){
    $col = mysqli_fetch_array($cc);
}
//后台检验用户输入信息是否正确
if($ids == $col['id'] && $password == $col['password']){
    echo "<script>alert('登录成功!');
    window.location.replace('article.list.php?p=1');</script>";
}else if($ids != $col['id']){
    echo "<script>alert('用户名错误，请输入有效用户名!');
    window.location.href='first.php'</script>";
}else if($password != $col['password']){
    echo "<script>alert('密码错误，请输入正确密码!');
    window.location.href='first.php'</script>";
}
?>