<?php
/**
* 修改/添加文章页面
* 1.判断用户有没有登录 *
* 2.判断用户是添加文章还是修改文章
* 3.提交
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>T博</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="public/css/details.css">
	<link rel="stylesheet" type="text/css" href="public/css/comm.css">
</head>
<body>
	<div class="article_body">
		<header class="nav">
			<a href="index.php" class="logo">T</a>
			<a href="write.php" class="write">写文章</a>
		</header>
		<div class="write_body">
			<form action="doWrite.php" method="POST">
				<?php
					include_once "function/function.php";
					include_once "connect.php";
					//判断用户有没有登录
					// if(!isLogged()){
					// 	echo "<h1><center>请先登录.</center></h1>";
				  //   Header("Refresh:3;url=index.php");
				  //   die;
					// }

					//判断用户是添加文章还是修改文章
					$article = array();
					if(isset($_GET['cid'])){
						$article = findArticle($link , $_GET['cid']);
						if(!$article){
							die('对不起,找不到你要修改的文章.');
						}
					}
				?>
				<input type="text" placeholder="请输入标题" value="<?php echo $article!=null ? $article['title'] : '' ?>" name="title">
				<textarea placeholder="请输入正文" name="article"><?php echo $article!=null ? $article['article'] : '' ?></textarea>
				<input type="hidden" name="cid" value="<?php echo isset($_GET['cid']) ? $_GET['cid'] : 0?>" >

				<input type="submit" value="提交">
			</form>
		</div>
		<footer class="foot">
			<p>by 3tGroup</p>
		</footer>
	</div>
</body>
</html>
