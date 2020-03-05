<?php
/**
 * Created by PhpStorm.
 * User: duyingchuan
 * Date: 18-12-22
 * Time: 下午11:06
 */

session_start();
date_default_timezone_set('PRC');
include_once("conn2.php");
if(isset($_GET['act']) && $_GET['act'] == "add")
{
    $content = $_GET['content'];
    $time = "".date('Y-m-d G:i:s');
    $username = $_SESSION['username'];
    $name = "".date('Y_m_d_G_i_s');
    $tablename = "table_".$name."_".$_SESSION['username'];
    $sql_create = "CREATE TABLE database2.".$tablename." ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY , username VARCHAR(50) NOT NULL , content VARCHAR(255) NOT NULL , time VARCHAR(50) NOT NULL ) ENGINE = InnoDB default charset=utf8;
";
//    $sql_create= "CREATE TABLE ".$username." ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY , content VARCHAR(255) NOT NULL , time VARCHAR(30) NOT NULL ) ENGINE = InnoDB;";
    $res_create = mysqli_query($conn2,$sql_create);
    if($res_create)
    {
        $array = array('tablename'=>$tablename,'username'=>$username,'content'=>$content,'time'=>$time);
        $sql_insert = "insert into ".$tablename." (username,content,time) values ('$username','$content','$time')";
        $res_insert = mysqli_query($conn2,$sql_insert);
        if($res_insert)
        {
            echo json_encode($array);
        }
    }
    else{
        echo mysqli_error($conn2);
    }
}

if(isset($_GET['act']) && $_GET['act'] == "get")
{
    include_once("conn2.php");
//    $sql = "select content,time from ".$_SESSION['username'];
    $sql = "SHOW TABLES";
    $res = mysqli_query($conn2,$sql);
    $array = [];
    while($obj = mysqli_fetch_object($res))
    {
        $sqlselect = "select username,content,time from ".$obj->Tables_in_database2." where id=1;";
        $resultslect = mysqli_query($conn2,$sqlselect);
        if($resultslect)
        {
            $objslect = mysqli_fetch_object($resultslect);
            $obj->username = $objslect->username;
            $obj->content = $objslect->content;
            $obj->time = $objslect->time;
        }
        else {
            echo mysqli_error($conn2);
        }
        array_push($array,$obj);
    }
    echo json_encode($array);
    mysqli_free_result($res);
}