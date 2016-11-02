<?php
/**
* 用户登录模块 [未完成]
*/
  session_start();
  include_once "connect.php";
  include_once "function/function.php";

  if(!isLogged()){
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    //这里要验证用户名密码的合法性
    //在数据库中查询
    $sql = "select * from users where user_name = '$username' limit 1";
    $result = mysqli_query($link , $sql);
    if(mysqli_affected_rows($link) <=0){
      die("登录失败,没有该用户.");
    }else{
      //判断密码是否正确
      //MYSQLI_NUM MYSQLI_ASSOC
      $userinfo = mysqli_fetch_array($result , MYSQLI_NUM);
      if($userinfo[0]['user_pass'] == $password){
          //密码正确 登录成功
          //用户id写入session cookie
          $_SESSION['username'] = $userinfo[0]['user_name'];
          $_SESSION['uid'] = $userinfo[0]['id'];
          setcookie('username' , $_SESSION['username'] , time()+ 86400);
          setcookie('uid' , $_SESSION['uid'] , time()+ 86400);

          echo "<h1><center>登录成功,此页面将在3秒后自动返回首页...</center></h1>";
          Header("Refresh:3;url=index.php");
          die();
      }else{
        //登录失败
        echo "<h1><center>对不起,登录失败,密码错误...</center></h1>";
        Header("Refresh:3;url=login.php");
        die();
      }
    }
  }else{
    //登录成功
    echo "<h1><center>您已经登录了,此页面将在3秒后自动返回首页...</center></h1>";
    Header("Refresh:3;url=index.php");
    die();
  }
?>
