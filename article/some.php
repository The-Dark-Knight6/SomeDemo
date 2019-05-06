<?php
//header("Content-type:text/html;charset=utf-8");

$host = "localhost";
$users = "root";
$pass = "";
$db = "onway";

$come = mysqli_connect($host,$users,$pass,$db);

if(!mysqli_query($come,'set names utf8')){
    echo mysqli_error();
};

$income = "select count(*) from shuju where sex = '男'";

$res = mysqli_query($come,$income);
if(!$res){
    echo "失败".mysqli_error($come);
}
else{
    // while($col = mysqli_fetch_array($res)){
    //     echo $col[0]."<br>";
    // }
    $col = mysqli_fetch_array($res);
    echo $col[0];
    
}
?>