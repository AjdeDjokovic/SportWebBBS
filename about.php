<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Cover Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
    <style type="text/css">
        .login_bj{ background:url(images/welcome.jpg) no-repeat top center;}
    </style>
</head>

<body class="login_bj">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Web</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" href="welcome.php">&nbsp&nbspWelcome&nbsp&nbsp</a>
                <a class="nav-link" href="home.php"">&nbsp&nbspHome&nbsp&nbsp</a>
                <a class="nav-link" href="waterfull.html"">&nbsp&nbspImage&nbsp&nbsp</a>
                <a class="nav-link active" href="#"">&nbsp&nbspAbout&nbsp&nbsp</a>
                <?php if(isset($_SESSION['username']))
                {
                    echo '<a href="person.php" class="nav-link">'."Personal for ".$_SESSION['username']."</a>";
                }
                else
                    echo '<a href="login.php" class="nav-link">'."&nbspLogin&nbsp"."</a>"; ?>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">关于</h1>
        <br>
        <p class="lead">此网站由山东大学软件学院软件工程专业2017级八班学生 杜瀛川（学号为201700301147）搭建。</p>
        <br>
        <p class="lead">
            <a href="old/about.html" class="btn btn-lg btn-secondary">Learn more</a>
        </p>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Cover template for <a href="https://getbootstrap.com/">杜瀛川</a>&nbsp&nbsp<a href="https://twitter.com/mdo">623581439@qq.com</a>.</p>
        </div>
    </footer>
</div>



</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-11-20
 * Time: 下午11:46
 */