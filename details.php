<!DOCTYPE html>
<html>
<head>
	<title>T博</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="public/css/details.css">
	<link rel="stylesheet" type="text/css" href="public/css/comm.css">
</head>
<body>
	<div class="article_body">
		<header class="nav">
			<a href="index.php" class="logo">T</a>
			<a href="javascript:;" class="write">写文章</a>
		</header>
		<?php
			include_once "function/function.php";
			include_once "connect.php";
			//获取cid
			$cid = $_GET['cid'];
			$detail = findArticle($link , $cid);
			//如果查到了该文章则把浏览量自增并且在下面显示该文章详情
			if($detail){
				addView($link , $cid);
			}else{
				echo "<h1><center>对不起,没有找到该文章,此页面将在3秒后自动返回首页...</center></h1>";
			  Header("Refresh:3;url=index.php");
				die();
			}
		?>
		<div class="article_main">
			<h1><?php echo $detail['title'];?></h1>
			<div class="article_state">
				<span>字数: <?php echo $detail['word_length'];?></span>
				<span>浏览量: <?php echo $detail['views'];?></span>
			</div>
			<div class="article_detail">
				<?php echo $detail['article'];?>
			</div>
		</div>
		<footer class="foot">
			<p>by 3tGroup</p>
		</footer>
	</div>
</body>
</html>
