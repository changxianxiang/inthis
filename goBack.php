<?php
session_start();//开始session必须放在最上面
$conn=new mysqli("localhost","root","root","register");//创建数据库连接
if($conn->connect_error){
    echo "连接失败".$conn->connect_error;
}else{
    //echo "连接成功";
}


echo "退出成功";
//$name=$_GET["userName"];
//setcookie("$name", "$name" , time()-3600);
$_SESSION['$name']+=1;
?>