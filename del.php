<?php
/**
* 删除文章
*/
include_once "function/function.php";
include_once "connect.php";

$cid = $_GET['cid'];
$sql = "delete from detail where id = $cid";
$result = mysqli_query($link , $sql);
if(mysqli_affected_rows($link) > 0 ){
  echo "<h1><center>恭喜你,文章删除成功啦.</center></h1>";
  Header("Refresh:3;url=index.php");
  die;
}else{
  echo "<h1><center>对不起,删除失败.</center></h1>";
  Header("Refresh:3;url=index.php");
  die;
}
?>
