<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link type="text/css" rel="stylesheet" href="homestyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="homejs.js" type="text/javascript"></script>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        function search() {
            var value = document.getElementById("search").value;
            window.open("https://www.baidu.com/s?wd="+value);
            document.getElementById("search").value = "";
        }
    </script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">Sports&nbsp&nbsp&nbsp&nbsp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <?php if(isset($_SESSION['username']))
                        {
                            echo '<a href="person.php" class="nav-link">'."Personal for ".$_SESSION['username']."</a>";
                        }
                        else
                            echo '<a href="login.php" class="nav-link">'."&nbsp&nbsp&nbsp&nbspLogin"."</a>"; ?>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="welcome.php">&nbspWelcome&nbsp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">&nbspHome&nbsp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="waterfull.html">&nbspImage&nbsp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">&nbspAbout&nbsp</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-md-0">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="search">
                    &nbsp&nbsp&nbsp&nbsp&nbsp
                    <div class="button" id="button" onclick="search()">搜索</div>
                    <ul class="navbar-nav mr-auto">
                    </ul>
                </form>
            </div>
        </nav>
    </div>
<!--<div class="head">-->
<!--    <ul class="Nav">-->
<!--        <li class="Nav"><a class="Nav"  href="http://121.250.218.78/2/index.html">Welcome</a></li>-->
<!--        <li class="Nav"><a class="Nav" id="active" href="#">Home</a></li>-->
<!--        <li class="Nav"><a class="Nav" href="http://121.250.218.78/2/about.html">About</a></li>-->
<!--        <li class="Nav"><a class="Nav" href="http://121.250.218.78/2/waterfull.html">Image</a></li>-->
<!--        <li class="Nav" style="float: right">-->
<!--                --><?php //if(isset($_SESSION['username']))
//                {
//                    echo '<a href="person.php" class="Nav">'."Welcome ".$_SESSION['username']."</a>";
//                }
//                else
//                    echo '<a href="login.php" class="Nav">'."Login"."</a>";
//            ?><!--</li>-->
<!--    </ul>-->
<!--</div>-->

<div class="box" id="box">
    <div class="inner">
        <ul class="img">
            <li ><a href="#"><img src="ps/1.jpg" alt=""></a></li>
            <li ><a href="#"><img src="ps/2.jpg" alt=""></a></li>
            <li ><a href="#"><img src="ps/3.jpg" alt=""></a></li>
        </ul>

        <ol class="bar">
        </ol>

        <div id="arr">
            <span id="left"><</span>
            <span id="right">></span>
        </div>
    </div>
</div>

<!--<div class="containerHead">Select what you want to know</div>-->
<div class="container">
    <div class="divleft"><img src="logo/FIFA.jpeg"></div>
    <div class="divcenter"><img id = "atp"src="logo/atp.jpeg"></div>
    <div class="divright"><img src="logo/nba.jpeg"></div>
</div>

</br>
</br>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Sports</h1>
            <p>此网站致力于对各项体育运动的推广，在这里你将了解到丰富的体育信息，发表自己的意见。未来还将推出体育新闻板块。</p>
            <p><a class="btn btn-primary btn-lg" href="https://baike.baidu.com/item/%E4%BD%93%E8%82%B2/223780?fr=aladdin" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <br>


    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>FIFA</h2>
                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp国际足球联合会。足球是全球第一大运动，世界杯是全人类共同的节日。借助这种全球影响力，国际足联也成为最富有、最有权势的国际体育组织。国际足联的宗旨是：促进国际足球运动的开展；发展各国足球协会之间的友好联系。 </p>
                <p><a class="btn btn-secondary" href="https://baike.baidu.com/item/%E5%9B%BD%E9%99%85%E8%B6%B3%E7%90%83%E8%81%94%E5%90%88%E4%BC%9A/508370?fromtitle=FIFA&fromid=206321&fr=aladdin" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>ATP</h2>
                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp职业网球联合会。旨在保护男子职业网球选手的利益。男子网球赛事主要是四大满贯，分别是澳大利亚网球公开赛、美国网球公开赛、法国网球公开赛、温布尔顿网球公开赛，还有ATP9项大师赛。现单打世界第一是球王德约科维奇 </p>
                <p><a class="btn btn-secondary" href="https://baike.baidu.com/item/%E8%81%8C%E4%B8%9A%E7%BD%91%E7%90%83%E8%81%94%E5%90%88%E4%BC%9A" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>NBA</h2>
                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNBA是美国职业篮球联赛的简称，由北美三十支队伍组成的男子职业篮球联盟，汇集了世界上最顶级的球员，是美国四大职业体育联盟之一。分为东部联盟和西部联盟，每个联盟又被划分为3个赛区，每个赛区由5支球队组成。</p>
                <p><a class="btn btn-secondary" href="https://baike.baidu.com/item/NBA" role="button">View details &raquo;</a></p>
            </div>
        </div>

    </div> <!-- /container -->

</main>

<br>
<br>
<br>
<br>

<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">NEWS</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">中国足协</a>
                    </h3>
                    <div class="mb-1 text-muted">Nov 26</div>
                    <p class="card-text mb-auto">足协：国足集训队参加2019中超不属实 赛制不会重大调整。</p>
                    <a href="#">Continue reading</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">NEWS</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">CBA</a>
                    </h3>
                    <div class="mb-1 text-muted">Nov 27</div>
                    <p class="card-text mb-auto">CBA全明星投票首周：易建联成票王 郭艾伦赵睿领衔后场</p>
                    <a href="#">Continue reading</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<br>



<div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top" >
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-muted">&copy; 2018-2019</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

</body>
</html>




<?php
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-11-19
 * Time: 下午11:39
 */
