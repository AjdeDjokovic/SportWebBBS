<?php
session_start();
$_SESSION['as'] = 'as';


?>


<!doctype html>
<html lang="en">
<head>
<!--    <meta charset="UTF-8">-->
    <title>Login</title>
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">-->
    <link type="text/css" rel="stylesheet" href="login.css">
    <script type="text/javascript">
        window.onload = function () {
            if(document.cookie)
            {
                var strCookie=document.cookie;
                var arrCookie=strCookie.split("; ");
                if(arrCookie[0].split("=")[0] == "username")
                document.getElementById("username").value = arrCookie[0].split("=")[1];
                document.getElementById("password").value = arrCookie[1].split("=")[1];
            }

        }
        function check() {
            var checkbox = document.getElementById("checkbox");
            var test = document.getElementById("test");
            if(test.value != "7364")
            {
                alert("验证码输入错误！");
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
                <h3>欢迎登入</h3>
                <form action="login.php" method="post">
                    <input name="username" id="username" type="text" class="kuang_txt phone" placeholder="用户名" >
                    <input name="password" id="password" type="password" class="kuang_txt possword" placeholder="密码" >
                    <input name="test" id="test" type="text" class="kuang_txt yanzm" placeholder="验证码">
                    <div>
                        <div class="hui_kuang"><img src="images/yanzhengma.jpeg" width="92" height="31"></div>
                        <div class="shuaxin"><a href="#"><img src="images/shuaxin.jpg" width="30" height="30"></a></div>
                    </div>
                    <div>
                        <input name="checkbox[]" type="checkbox" value="1"><span>记住密码</span></a></span>
                    </div>
                    <input name="submit" type="submit" class="btn_zhuce1" value="登入" onclick="return check()">
                    <input name="注册" type="button" class="btn_zhuce2" value="注册" onclick="window.open('regishcer.php')">
                    <input name="返回" type="button" class="btn_zhuce3" value="返回" onclick="window.open('home.php')">
                </form>
            </div>
        </div>
    </div>

</div>


</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-11-18
 * Time: 下午11:23
 */

if(isset($_GET["sign"]) && $_GET["sign"] == "out")
{
    unset($_SESSION['username']);
    unset($_SESSION['password']);
}

$time = 60*60*24;
if(isset($_POST['submit']) && $_POST['submit'] == "登入")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == "" || $password == "")
    {
        echo "<script>alert('用户名和密码不能为空！'); history.go(-1);</script>";
    }
    else{
        include_once("conn.php");
        $sql = "select username,password from table1 where username = '$username' and password = '$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            echo "<script>alert('登入成功！欢迎'); history.go(-1);</script>";
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            if(isset($_POST['checkbox']) && $_POST['checkbox'][0] == "1")
            {
                setcookie("username",$username,time()+60*60*24);
                setcookie("password",$password,time()+60*60*24);
            }
            else{
                setcookie("username",$username,time()-1);
                setcookie("password",$password,time()-1);
            }
            header('location:home.php');
        }
        else
        {
            echo "<script>alert('用户名或密码错误！'); history.go(-1);</script>";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}
