<?php
//imagearc("images",100,100,200,200,200,500);
session_start();//开始session必须放在最上面
$conn=new mysqli("localhost","root","root","register");//创建数据库连接
if($conn->connect_error){
    echo "连接失败".$conn->connect_error;
}else{
   // echo "连接成功";
}
$sql="create database if not exists register";//创建一个数据库register
if($conn->query($sql)==true){
  //  echo "create databas successf";
}
//创建数据表
$sql="create table  information (
id int NOT NULL AUTO_INCREMENT primary key ,
userName varchar(20) not null,
userEmail varchar(20) not null,
userIdentical varchar(20) not null,
userSchool varchar(20) not null,
userPassword varchar(20) not null
)";
if($conn->query($sql)==true){
    echo "create table successful";
}
//插入数据

/*$sql="insert into information(userName,userEmail,userIdentical,userSchool,userPassword)
values ('$name','$email','$identify','$school','$password')";
if($conn->query($sql)==true){
    echo "注册成功";
}else{
    echo "faile".$conn->error;
}*/
$name=empty($_GET["userName"])?die("请输入您的用户名"):$_GET["userName"];
$password=empty($_GET["mainuserPassword"])?die("输入您的登陆密码"):$_GET["mainuserPassword"];
if(isset($_COOKIE["$name"])){//如果该用户已经注册
echo "您已经注册请";
echo " <a href=\"denglu.html\">登陆</a>";

    /*die(var_dump($sql));
    $passwordValid=$conn->query($sql);//从数据库取出密码
    //echo $passwordValid;*/
   /* if($passwordValid!=$password){//验证密码
        echo "密码输入错误";
    }else{
        $_SESSION['$name']=$_SESSION['$name']+1;
        echo "欢迎回来".$name."这是您第".$_SESSION['$name']."次访问";
    }*/
}else{//没注册过
    $name=empty($_GET["userName"])?die("请输入您的用户名"):$_GET["userName"];
    $email=empty($_GET["userEmail"])?die("请输入您要绑定的邮箱"):$_GET["userEmail"];
    $identify=empty($_GET["userIdentify"])?die("请您进行身份认证"):$_GET["userIdentify"];
    $school=empty($_GET["userSchool"])?die("选择您的学校"):$_GET["userSchool"];
    $password=empty($_GET["mainuserPassword"])?die("输入您的登陆密码"):$_GET["mainuserPassword"];
    if($_GET["mainuserPassword"]!=$_GET["subuserPassword"]){
        die("请您确认密码");
    }else{
        setcookie("$name", "$name");//cookie
        $_SESSION['$name']=1;
        $sql="insert into information(userName,userEmail,userIdentical,userSchool,userPassword)
values ('$name','$email','$identify','$school','$password')";//存储该用户信息

        if($conn->query($sql)==true){
            echo "注册成功","这是您第1次访问";
            ?>
            <form action="register.html" method="get">
                <input type="submit" value="退出登陆" name="back"/>
            </form>

        <?php  }else{
            echo "注册失败请检查".$conn->error.PHP_EOL;
        }
    }

}
/*<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="" method="get">
<input value="退出登陆" type="submit" height="40" width="48">
</form>
</body>
</html>*/
//echo $_GET["userName"];
?>
