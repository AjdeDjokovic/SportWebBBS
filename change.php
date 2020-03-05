<?php
session_start();


?>


<!doctype html>
<html lang="en">
<head>
<!--    <meta charset="UTF-8">-->
    <title>Change</title>
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">-->
    <link type="text/css" rel="stylesheet" href="change.css">
    <script type="text/javascript">
        function check() {
            var test = document.getElementById("test");
            var password1 = document.getElementById('password1');
            var password2 = document.getElementById('password2');
            if(password1.value != password2.value)
            {
                alert("两次新密码输入不符");
                return false;
            }
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
                <h3>修改密码</h3>
                <form action="change.php" method="post">
                    <input name="oldpassword" id="oldpassword" type="password" class="kuang_txt phone" placeholder="原密码" >
                    <input name="password1" id="password1" type="password" class="kuang_txt possword" placeholder="新密码" >
                    <input name="password2" id="password2" type="password" class="kuang_txt possword" placeholder="再次输入新密码">
                    <input name="test" id="test" type="text" class="kuang_txt yanzm" placeholder="验证码">
                    <div>
                        <div class="hui_kuang"><img src="images/yanzhengma.jpeg" width="92" height="31"></div>
                        <div class="shuaxin"><a href="#"><img src="images/shuaxin.jpg" width="30" height="30"></a></div>
                    </div>
                    <input name="submit" type="submit" class="btn_zhuce2" value="修改" onclick="return check()">
                    <input name="返回" type="button" class="btn_zhuce3" value="返回" onclick="window.open('person.php')">
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


if(isset($_POST['submit']) && $_POST['submit'] == "修改")
{
    $username = $_SESSION['username'];
    $oldpassword = $_POST['oldpassword'];
    $password = $_POST['password1'];
    if($oldpassword == "" || $password == "")
    {
        echo "<script>alert('密码不能为空！'); history.go(-1);</script>";
    }
    else{
        include_once("conn.php");
        $sql = "select username,password from table1 where username = '$username' and password = '$oldpassword'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $updatesql = "update table1 set password = '$password' where username = '$username'";
            $updateresult = mysqli_query($conn,$updatesql);
            if($updateresult)
            {
                $_SESSION['password'] = $password;
                setcookie("username",$username,time()-1);
                setcookie("password",$password,time()-1);
                echo "<script>alert('修改成功！'); history.go(-1);</script>";
            }
        }
        else
        {
            echo "<script>alert('原密码错误！'); history.go(-1);</script>";
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
}
