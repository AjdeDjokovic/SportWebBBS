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
if(isset($_GET['act']) && $_GET['act'] == "add")
{
    $content = $_GET['content'];
    $time = "".date('Y-m-d G:i:s');
    $array = array('content'=>$content,'time'=>$time);
    $sql_insert = "insert into ".$_SESSION['username']." (content,time) values ('$content','$time')";
    $res_insert = mysqli_query($conn,$sql_insert);
    if($res_insert)
    {
        echo json_encode($array);
    }
}
if(isset($_GET['act']) && $_GET['act'] == "get")
{
    $sql = "select content,time from ".$_SESSION['username'];
    $res = mysqli_query($conn,$sql);
    $array = [];
    while($obj = mysqli_fetch_object($res))
    {
        array_push($array,$obj);
    }
    echo json_encode($array);
    mysqli_free_result($res);
}
if(isset($_GET['act']) && $_GET['act'] == "del")
{
    $sql = "delete from ".$_SESSION['username']." where time='".$_GET['time']."'";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        $array = array('error'=>'0');
        echo json_encode($array);
    }
    else{
        $array = array('error'=>''.mysqli_error($conn));
        echo json_encode($array);
    }
}
if(isset($_GET['act']) && $_GET['act'] == "getUsername")
{
    echo $_SESSION['username'];
}