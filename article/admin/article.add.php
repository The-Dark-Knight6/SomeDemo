<?php
//加载数据库文件
require_once('../connect.php');
//缓存的当前用户名
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>发布文章</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js.yanzheng.js"></script>
</head>
<style>
body{
    margin:0px;
    background:url(../sxda.png);
}
table.second tr td:nth-child(1){
    text-align:center;
}
h1{
    margin-left:80px;
    color:white;
}
p a{
    line-height:30px;
    color:#333333;
    text-decoration:none;
    margin:70px;
}
p a:hover{
    color:red;
    cursor:point;
    border-bottom:1px solid;
}
</style>

<body>
    <table width="100%" height="520" border="2" cellpadding="8" 
    cellspacing="1" >
        <tr>
            <td height="89" colspan="2" bgcolor="#7AD000">
            <h1>文章发布系统 —— <sub style="font-size:20px">后台管理</sub></h1>
            </td>
        </tr>
        <tr>
            <td width="213" height="287" align="left" valign="top" bgcolor="">
                <p><a href="article.add.php">发布文章</a></p>
                <p><a href="article.manage.php?p=1">管理文章</a></p>
            </td>
            <td width="854" valign="top" bgcolor="#ffffff">
            <form onsubmit="return yan()" action="article.add.handle.php" method="post" id="form1" name="name1">
        <table style="margin:0 auto;" width="770" border="2" cellpadding="8" cellspacing="0" class='second' >
            <tr>
                <th colspan="2" align="center">发布文章</th>
            </tr>
            <tr>
                <td width="110">标题</td>
                <td width="625">
                    <label for="this"></label>
                    <input type="text" name="title" id="title" placeholder="中文、英文、数字、下划线" autocomplete="off">
                </td>
            </tr>
            <tr>
                <td>作者</td>
                <td>
                    <input type='hidden' value="<?php echo $_SESSION['myself'] ?>" name="zuozhe" id="zuozhe">
                    <input type="text" name="author" id="author" placeholder="中文、英文、数字、下划线" autocomplete="off">
                </td>
            </tr>
            <tr>
                <td>简介</td>
                <td>
                    <label for="description"></label>
                    <textarea cols="90" style="resize:none" rows="5" id="description" name="description" placeholder="文章简介长度为20-100"></textarea>
                </td>
            </tr>
            <tr>
                <td>内容</td>
                <td>
                    <textarea name="content" style="resize:none" id="content" cols="90" rows="15" name=“content” placeholder="文章长度不少于50"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="button" id="button" value="提交" style="width:60px;">
                    <input type="reset" value="重置" style="margin-left:50px;width:60px;">
                </td>
            </tr>
        </table>
    </form>
            </td>
        <tr>
            <td height="89" colspan="2"  color="red" align="left" >
            <div style="color:grey;font-size:15px;text-align:center;">
                    Copyright &nbsp;&nbsp; © 2018 文章发布系统 &nbsp;&nbsp; All Rights Reserved
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当前用户：<?php echo $_SESSION['myself'] ?>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
