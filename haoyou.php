<?php
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-11-24
 * Time: 下午5:36
 */
session_start();
date_default_timezone_set('PRC');
include_once("conn.php");
if(isset($_GET['act']) && $_GET['act'] == "gethaoyou")
{
    $sql = "select content,time from ".$_GET['haoyou'];
    $res = mysqli_query($conn,$sql);
    $array = [];
    while($obj = mysqli_fetch_object($res))
    {
        array_push($array,$obj);
    }
    echo json_encode($array);
    mysqli_free_result($res);
}
