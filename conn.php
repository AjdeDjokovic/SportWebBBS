<?php
$conn = mysqli_connect("127.0.0.1","root","","database1") or die("链接服务器数据库失败！".mysqli_error());
mysqli_query($conn,"set names utf8");
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-11-18
 * Time: 下午10:02
 */