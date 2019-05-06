<?php
    session_start();
    // 传入页码
    $page = $_GET['p'];
    //从第几条数据开始读取
    $current = ($page - 1)*5;
    //关联链接数据库文件
    require_once('../connect.php');
    //临时用户
    $yong = $_SESSION['myself'];
    //sel选择语句,通过编号id按照从小到大顺序排列
      $sql = "select * from article where zuozhe='$yong' order by id asc limit $current,5 ";
    //php择取一条sql语句
    $query = mysqli_query($con,$sql);
    //检验选择语句是否成功，检验所选是否为空
    if($query && mysqli_num_rows($query)){
        //取得表中数据
        while($row = mysqli_fetch_assoc($query)){
            //将变量保存的数据存入数组变量中
            $data[] = $row;
        }
    };
    
    // else{
    //     //将空数据赋值给data数组变量
    //     $data[] = array();
    // }

    //以下数据用来查找当前用户名的密码，用来进行注销用户判断
    $sqls = "select password from users where id= '$yong'";
    $querys = mysqli_query($con,$sqls);
    if($querys && mysqli_num_rows($querys)){
        $rows = mysqli_fetch_assoc($querys);
    }else{
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>文章管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
body{
    margin:0px;
    background:url(../sxda.png);
}
h1{
    margin-left:80px;
    color:white;
}
p a{
    margin:70px;
}
p a,tr.some a{
    line-height:30px;
    color:#333333;
    text-decoration:none;
}
p a:hover,tr.some a:hover{
    color:red;
    cursor:point;
    border-bottom:1px solid;
}
</style>
<body>
    <table width="100%" height="520" border="2" cellpadding="8" 
    cellspacing="1" >
        <tr>
            <td height="89" colspan="2" bgcolor="#7AD000" >
                <h1>文章发布系统 —— <sub style="font-size:20px">后台管理</sub></h1>               
            </td>
        </tr>
        <tr>
            <td width="220" height="390" align="left" valign="top" bgcolor="">
                <p><a href="article.add.php">发布文章</a></p>
                <p><a href="article.manage.php?p=1">管理文章</a></p>
                <p><a href="../article.list.php?p=1">主页文章</a></p>
            </td>
            <td width="854" valign="top" >
            <table style="margin:0 auto;" width="780" border="2" cellpadding="8" cellspacing="0">
      <tr>
        <td colspan="3" align="center" bgcolor="#FFF"><b>文章管理列表</b></td>
      </tr>
      <tr>
        <td width="180" ><b>作者</b></td>
        <td width="572" ><b>标题</b></td>
        <td width="100" ><b>操作</b></td>
      </tr>
    <?php
        //当数组中不为空时,执行循环
        if(!empty($data)){
            foreach($data as $value){ 
    ?>          
      <tr class='some'>
        <td >&nbsp;<?php echo $value['author']?></td>
        <td >&nbsp;<?php echo $value['title']?></td>
        <td >
        <a href="javascript:void(0)" onclick="sure()">删除</a>
        <a href="article.modify.php?id=<?php echo $value['id']?>">修改</a>

        </td>
      </tr>
        <?php      
                }
        }
        //当所传入数据为空时，执行：
        else{
            echo "<h3 style='text-align:center;margin:50px;color:red;'>您当前还没有发布文章，请发布文章!</h3>";
        }
        ?>
        <tr>
        <td colspan='3' style="text-align:center;letter-spacing:5px;">
        <?php
        //筛选出当前用户所发布的所有文章
            $total_sql = "select count(*) from article where zuozhe='$yong'";
            //php选取函数，选择一条sql语句
            $come = mysqli_query($con,$total_sql);
            //将所选的数据存入变量
            $total_result = mysqli_fetch_array($come);
            //变量中存入总文章数量
            $total = $total_result[0];
            //总数量以5篇为一页进行展示，计算出总页数
            $total_page = ceil($total/5);
            //创建连接符，链接上下页、首尾页
            $page_banner = "";
            //当前页码大于1时
            if($page > 1){
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p=1'.">首页</a>";
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p='.($page-1).">上一页</a>";
            }
            //当前页面小于总页码数时
            if($page < $total_page){
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p='.($page+1).">下一页</a>";
                $page_banner .= "<a style='margin:5px;' href = ".$_SERVER['PHP_SELF'].'?p='.($total_page).">尾页</a>";
            }
            //php 打印语句，打印上述翻页效果
            echo $page_banner;
            echo "<span style='margin:5px;'>当前第 {$page} 页</span>";            
            echo "共 {$total_page} 页";           
            ?>
        </td>
        </tr>
    </table></td>
        <tr>
            <td height="89" colspan="2" bgcolor="" color="red" align="left">
                <div style="color:grey;font-size:15px;text-align:center;">
                    Copyright &nbsp;&nbsp; © 2018 文章发布系统 &nbsp;&nbsp; All Rights Reserved
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;当前用户：<?php echo $yong ?>
                    <span style="margin-left:30px;" id="xiao" onmousemove="on()"
                    onmouseout="out()" onclick="shanchu()">注销帐号</span>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
<!-- 设置删除文章时a标签href属性值以及相应操作函数 -->
<script>
function sure(){
    var reg = confirm("确定删除此文章？");
    if(reg == true){
        window.location.href="article.del.handle.php?id=<?php echo $value['id']?>";
    }else{
        window.location.href="javascript:void(0)";
    }
}
// 注销用户函数
var datas = "<?php echo $rows['password']?>";
function shanchu() { 
    // var reg =confirm("确定要注销账户么？此操作会删除您所有数据！");
    var reg = prompt("此操作会删除您的所有数据，请谨慎操作!!!","请输入密码");
    if(reg == datas){
        window.location.href="shanchu.php";
    }else{
        window.location.href="javascript:void(0)";
        alert("注销失败！");
    }
 }
 //“注销帐号”的一些鼠标函数
function on(){
    document.getElementById("xiao").style.color="red";
    document.getElementById("xiao").style.cursor="pointer";
}
function out(){
    document.getElementById("xiao").style.color="grey";
}
</script>
