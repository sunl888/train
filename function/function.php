<?php
/**
 * Created by PhpStorm.
 * User: 孙龙
 * Date: 2016/10/17
 * Time: 22:31
 */

/**
* 判断用户有没有登录
*/
/*function isLogged()
{
  session_start();

  if(isset($_SESSION['uid']) && isset($_SESSION['username'])){
    return true;
  }else{
    if(isset($_COOKIE['uid']) && isset($_COOKIE['username'])){
        $_SESSION['uid'] = $_COOKIE['uid'];
        $_SESSION['username'] = $_COOKIE['username'];
        return true;
    }
  }
  return false;
}*/
/**
 * UTF-8编码情况下 *
 * 计算字符串的长度 *
 * @param   string      $str        字符串
 * @return  array
 */
function strLength($str)
{
    $length = strlen(preg_replace('/[\x00-\x7F]/', '', $str));
    $arr['en'] = strlen($str) - $length;
    $arr['cn'] = intval($length / 3);//编码GBK，除以2
    return $arr['en']+$arr['cn'];
}

/**
* 根据id查询文章
*/
function findArticle($link , $id)
{
  $sql = "select * from detail where id=$id limit 1";
  $result = mysqli_query($link , $sql);
  //mysqli_affected_rows($link) Returns the number of rows affected by the last INSERT, UPDATE, REPLACE or DELETE query.
  if(mysqli_affected_rows($link) <= 0){
    return false;
  }
  return mysqli_fetch_array($result , MYSQLI_ASSOC);
}
/**
* 浏览量
* 浏览量信息可以缓存到radius里面 每200个浏览量插一次数据库
*/
function addView($link , $cid){
  $sql = "update detail set views=views+1 where id=$cid";
  $result = mysqli_query($link , $sql);
  if(mysqli_affected_rows($link) <=0){
    throw new Exception("Error Processing Request", 1);
  }
}

/**
* 打印函数
*/
function p()
{
    $argc = func_get_args();//获取函数参数列表
    echo '<pre>';
    foreach($argc as $val){
        if(empty($val)){
            var_dump($val);
        }else{
            print_r($val);
        }
        echo "\n";
    }
    echo '</pre>';
    die;
}
