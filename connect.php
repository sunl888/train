<?php
/**
 * Created by PhpStorm.
 * User: 孙龙
 * Date: 2016/10/17
 * Time: 22:31
 */
include_once 'database/config.php';
$link = mysqli_connect(
              $connections['host'],
              $connections['username'],
              $connections['password'],
              $connections['database'],
              $connections['port']
        );

if(!$link){
    die('数据库连接错误:'.mysqli_connect_error());
}
//设置字符集
mysqli_query($link , "set names utf8");
