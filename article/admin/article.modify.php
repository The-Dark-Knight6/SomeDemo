<?php
//有关加载防止xss攻击和sql注入
require('xssattarck.php');
// Webscan
$Webscan = new Webscan();
if ($Webscan->check()) {
    exit('系统检测到有攻击行为存在');
}

//链接相关数据库文件
require_once('../connect.php');
//定义id使得manage管理页面通过文章编号找到对应文章，并进行相应操作
$id = $_GET['id'];
//sql语句选取以及获得数据
$query = mysqli_query($con,"select * from article where id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js.yanzheng.js"></script>
    </script>
</head>
<style>
body{
    margin:0px;
    background:url(../sxda.png);
}
table{
    margin:0 auto;
    margin-top:20px;
}
table tr td:nth-child(1){
    text-align:center;
}
textarea{
    overflow-y:hidden;
}
</style>
<body>
    <form onsubmit="return yan()" action="article.modify.handle.php" method="post" id="form1" name="name1">         
        <table width="770" border="1" cellpadding="8" cellspacing="0">
        <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>"> 
            <tr>
                <th colspan="2" text-align="center">修改文章</th>
            </tr>
            <tr>
                <td width="110">标题</td>
                <td width="625">
                    <label for="this"></label>
                    <input type="text" name="title" id="title" value="<?php echo $data['title'] ?>" autocomplete="off">
                </td>
            </tr>
            <tr>
                <td>作者</td>
                <td>
                    <input type="text" name="author" id="author" value="<?php echo $data['author'] ?>" autocomplete="off">
                </td>
            </tr>
            <tr>
                <td>简介</td>
                <td>
                    <label for="description"></label>
                    <textarea cols="85" rows="5" id="description" style="resize:none;overflow:scroll;" name="description"><?php echo $data['description'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>内容</td>
                <td>
                    <textarea name="content" id="content" cols="85" rows="15" style="resize:none;overflow:scroll;"><?php echo $data['content'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" id="button" value="提交" style="width:60px;">
                    <input type="button" value="取消" onclick="chong()" style="width:60px;margin-left:50px">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
<script>
//“取消”按钮链接函数
function chong(){
    window.location.href='article.manage.php?p=1';
}
</script>