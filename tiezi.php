
<?php
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-12-23
 * Time: 下午1:23
 */

session_start();
date_default_timezone_set('PRC');
include_once("conn2.php");
if(isset($_GET['act']) && $_GET['act'] == "add")
{
    $username = $_SESSION['username'];
    $content = $_GET['content'];
    $time = "".date('Y-m-d G:i:s');
    $tablename = $_GET['tablename'];
    $array = array('tablename'=>$tablename,'username'=>$username,'content'=>$content,'time'=>$time);
    $sql_insert = "insert into ".$tablename." (username,content,time) values ('$username','$content','$time')";
    $res_insert = mysqli_query($conn2,$sql_insert);
    if($res_insert)
    {
        echo json_encode($array);
    }
}

if(isset($_GET['act']) && $_GET['act'] == "get")
{
    $tablename = $_GET['tablename'];
    include_once("conn2.php");
    $sql = "select username,content,time from ".$tablename;
    $res = mysqli_query($conn2,$sql);
    $array = [];
    while($obj = mysqli_fetch_object($res))
    {
        array_push($array,$obj);
    }
    echo json_encode($array);
}