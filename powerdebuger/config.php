<?php
    session_start();
    date_default_timezone_set("Asia/Shanghai");
    error_reporting(0);

    $conn = mysqli_connect("localhost","root","","powerdebuger");
    if (!$conn){
        $conn=null;
        die("数据库错误");
    }
    mysqli_set_charset($conn,'utf8');

?>