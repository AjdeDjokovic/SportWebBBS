<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Re</title>
    <meta name="keywords" content="盒老师">
    <meta name="content" content="盒老师">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <link type="text/css" rel="stylesheet" href="regishcercss.css">
    <script type="text/javascript">
        function check() {
            var checkbox = document.getElementById("checkbox");
            var test = document.getElementById("test");
            if(test.value != "7364")
            {
                alert("验证码输入错误！");
                return false;
            }
            if(!checkbox.checked)
            {
                alert("请阅读并同意《使用协议》！");
                return false;
            }
            return true;
        }
    </script>

</head>
<body class="login_bj" >

<div class="zhuce_body">
    <div class="zhuce_kong">
        <div class="zc">
            <div class="bj_bai">
                <h3>欢迎注册</h3>
                <form action="regishcer.php" method="post">
                    <input name="username" type="text" class="kuang_txt phone" placeholder="用户名">
                    <input name="phone" type="text" class="kuang_txt phone" placeholder="手机号">
                    <input name="email" type="text" class="kuang_txt email" placeholder="邮箱">
                    <input name="password" type="password" class="kuang_txt possword" placeholder="密码">
                    <input name="test" id="test" type="text" class="kuang_txt yanzm" placeholder="验证码">
                    <div>
                        <div class="hui_kuang"><img src="images/yanzhengma.jpeg" width="92" height="31"></div>
                        <div class="shuaxin"><a href="#"><img src="images/shuaxin.jpg" width="30" height="30"></a></div>
                    </div>
                    <div>
                        <input id="checkbox" type="checkbox" value=""><span>已阅读并同意<a href="#" target="_blank"><span class="lan">《使用协议》</span></a></span>
                    </div>
                    <input name="submit" type="submit" class="btn_zhuce" value="注册" onclick="return check()">
                    <input name="返回" type="button" class="btn_zhuce2" value="返回" onclick="window.open('login.php')">
                </form>
            </div>
            <!--<div class="bj_right">-->
            <!--<p>使用以下账号直接登录</p>-->
            <!--<a href="#" class="zhuce_qq">QQ注册</a>-->
            <!--<a href="#" class="zhuce_wb">微博注册</a>-->
            <!--<a href="#" class="zhuce_wx">微信注册</a>-->
            <!--<p>已有账号？<a href="login.html">立即登录</a></p>-->
            <!---->
            <!--</div>-->
        </div>
    </div>

</div>
</body>
</html>
<?php
if(isset($_POST['submit']) && $_POST['submit'] == "注册")
{
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($username == "" || $phone == "" || $email == "" || $password == "")
    {
        echo "<script>alert('用户名和密码不能为空！'); history.go(-1);</script>";
    }
    else{
        include_once("conn.php");
        $sql = "select username from table1 where username='".$username."'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            echo "<script>alert('该用户名已存在！'); history.go(-1);</script>";
        }
        else{
            $sql_insert = "insert into table1 (username,phone,email,password) values ('$username','$phone','$email','$password')";
            $res_insert = mysqli_query($conn,$sql_insert);
            $sql_create= "CREATE TABLE ".$username." ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY , content VARCHAR(255) NOT NULL , time VARCHAR(30) NOT NULL ) ENGINE = InnoDB;";
            $res_create = mysqli_query($conn,$sql_create);
            if($res_insert&&$res_create)
            {
                setcookie("username",$username,time()+60*60*24);
                setcookie("password",$password,time()+60*60*24);
                echo "<script>alert('注册成功！'); parent.location.href='login.php';</script>";
            }
            else
            {
                echo mysqli_error($conn);
//                echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
            }
        }
        mysqli_free_result($res_insert);
        mysqli_close($conn);
    }
}

/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-11-18
 * Time: 下午9:44
 */