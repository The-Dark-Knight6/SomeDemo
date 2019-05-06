<?php
//关联配置文件config.php
require_once('config.php');

//连接数据库，选择数据库.
$con = mysqli_connect(HOST,USERNAME,PASSWORD,'info');
if(!$con){
    echo mysqli_error();
}

//设置php页面字符集
if(!mysqli_query($con,'set names utf8')){
    echo mysqli_error();
};

?>