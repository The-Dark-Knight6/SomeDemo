<?php
require_once('../connect.php');

//定义id使得manage管理页面通过文章编号找到对应文章，并进行相应操作
$id = $_GET['id'];

$deletesql = "delete from article where id='$id'";

if(mysqli_query($con,$deletesql)){
    echo "<script>alert('删除文章成功!');window.location.href='article.manage.php?p=1'</script>";
}else{
   // echo "<script>alert('修改文章失败!');window.location.href='article.modify.php'</script>".mysqli_error($con);
   echo '删除失败'.mysqli_error($con);
}
?>