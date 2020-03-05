<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="personcss.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <script src="jquery-3.3.1.min.js"></script>
    <script src="personjs.js"></script>
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#" id="username">个人主页</a>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="luntan.html">论坛</a>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="change.php">修改密码</a>
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="home.php">返回主页</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="login.php?sign=out">Sign out</a>
        </li>
    </ul>
</nav>
<br>
<br>


<div class="container-fluid">
    <div class="row">

        <main role="main" style="width: 80%; margin: 0 auto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">日志</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary">Share</button>
                        <button class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>

            <div id="input" class="input">
                <textarea id="comment" class="comment"></textarea>
                <form >
                    <input type="button" id="inputButton" value="发布" disabled>
                </form>
            </div>
            <hr>
            <div id="messageList" class="">

            </div>


        </main>
    </div>
</div>



</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-11-20
 * Time: 下午10:58
 */