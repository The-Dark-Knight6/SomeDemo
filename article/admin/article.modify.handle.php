<?php
//加载数据库文件
require_once('../connect.php');
//获取form表单提交的数据
$id = $_POST['id'];
$title  = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$content = $_POST['content'];
$shi = time();
$dateline = date("y-m-d",$shi);
//sql 更新语句
$updatesql = "update article set title='$title',author='$author',description='$description',content='$content',dateline='$dateline' where id='$id' ";
//执行sql语句并判断是否成功
if(mysqli_query($con,$updatesql)){
    echo "<script>alert('修改文章成功!');
    window.location.href='article.manage.php?p=1'</script>";
}else{
   // echo "<script>alert('修改文章失败!');window.location.href='article.modify.php'</script>".mysqli_error($con);
   echo '修改失败'.mysqli_error($con);
}
?>