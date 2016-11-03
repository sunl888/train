 <!DOCTYPE html>
 <html>
 <head>
 	<title>T博</title>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="public/css/index.css">
 	<link rel="stylesheet" type="text/css" href="public/css/comm.css">
	
 </head>
 <body>
 	<div class="article_body">
 		<header class="nav">
 			<a href="#" class="logo">T</a>
 			<a href="write.php" class="write">写文章</a>
 		</header>
 		<div class="bg_img">
 			<div class="bg_body">
 				<div class="bg_img_test">
 					<h2>X X 博 客</h2>
 					<p>交 流 故 事 ， 沟 通 想 法</p>
 					<a href="write.php">
 						<span class="line line_top"></span>
 						<span class="line line_bottom"></span>
 						<span class="line line_left"></span>
 						<span class="line line_right"></span>
 						开始写文章
 					</a>
 				</div>
 			</div>
 			<div class="Mask">
 			</div>
 		</div>
 		<div class="article_main">
 			<h2 class="title">文章·精选</h2>
 			<ul class="items">
        <?php
          /**
          *1.连接数据库
          *2.判断用户有没有登录
          *3.查询所有的文章
          **/
          include_once "connect.php";
          include_once "function/function.php";
          $sql = "select * from detail";
          $result = mysqli_query($link , $sql);
          //判断结果集是否为空  如果为空则不执行mysqli_fetch_array()
          while( ($result !=NULL) && ($val = mysqli_fetch_array($result)) ){
        ?>
     				<li>
     					<a href="details.php?cid=<?php echo $val['id']?>">
     						<h2> <?php echo $val['title']?> </h2>
     						<p> <?php echo $val['article'];?> </p>
     					</a>
     					<footer>
     						<div>
                  <!--只有用户登录了才有编辑功能-->
 							    <a href="write.php?cid=<?php echo $val['id']?>">编辑</a>
 							    <a href="del.php?cid=<?php echo $val['id']?>">删除</a>
     						</div>
     					</footer>
     				</li>

        <?php
          }
          //释放结果集
          mysqli_free_result($result);
        ?>
 			</ul>
 		</div>
 		<footer class="foot">
 			<p>by 3tGroup</p>
 		</footer>
 	</div>
 </body>
 </html>
