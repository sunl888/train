<?php
  /**
  * 添加/修改文章
  */
  include_once "function/function.php";
  include_once "connect.php";
  //$article = $_POST;
  $title = $_POST['title'];
  /**
  * addslashes 单双引号、反斜线及NULL加上反斜线转义,仅仅是为了让原来的字符正确地进入数据库。
  * htmlspecialchars将与、单双引号、大于和小于号化成HTML格式 如 <转成&lt; >转成&gt;
  * 防止xss攻击
  */
  $article = addslashes(htmlspecialchars($_POST['article']));
  $cid = $_POST['cid'];
  //获取文章的字数
  $strlength = strLength($article);
  //这里需要验证文章的合法性

  //判断是添加文章还是修改文章
  if($cid != 0){
    $sql = "update detail set title='$title',article='$article',word_length=$strlength where id=$cid";
  }else{
    $sql = "insert into detail values(null,'$title','$article',$strlength,0,null)";
  }
  $result = mysqli_query($link , $sql);
  if( mysqli_affected_rows($link) <=0){
    echo "<h1><center>添加或者修改文章失败.</center></h1>";
    Header("Refresh:3;url=index.php");
    die;
  }
  echo "<h1><center>恭喜你,添加或者修改文章成功啦.</center></h1>";
  Header("Refresh:3;url=index.php");
  die;
?>
