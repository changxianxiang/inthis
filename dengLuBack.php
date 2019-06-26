<?php
session_start();//开始session必须放在最上面

$name=empty($_GET["userName"])?die("请输入您的用户名"):$_GET["userName"];
$password=empty($_GET["mainuserPassword"])?die("输入您的登陆密码"):$_GET["mainuserPassword"];
$conn=new mysqli("localhost","root","root","register");//创建数据库连接
if($conn->connect_error){
    echo "连接失败".$conn->connect_error;
}else{
     //echo "连接成功";
}
$sql = "select * from information where userName='{$name}'";
$arr = $conn->Query($sql);
//var_dump($sql);

//echo PHP_EOL;
//$a=var_dump($passwordValid);
//echo $a;
//$attr = $passwordValid->fetch_row();
$row=mysqli_fetch_array($arr,MYSQLI_NUM);//mysql中的值不能直接输出要转化
//echo $row[1];
if($name==$row[1]){
    if($password==$row[5]){
        echo "密码输入正确 登陆成功";
        echo "这是您第".$_SESSION['$name']."次登陆";
        echo "<a href='goBack.php'>退出登陆</a>";

        //$_SESSION['$name']+=1;
        setcookie("$name", "$name");
    }else{
        echo "密码输入错误";
    }
}else{
    echo "您还未";
    echo  " <a href=\"register.html\">注册</a>";
}
?>
