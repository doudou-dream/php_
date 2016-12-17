<html>
<head>

	<link rel="stylesheet" type="text/css" href="../../css/putlis.css">
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/putlis.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
	<body>
		<?php
			session_start();
			// 判断有没有登录$_COOKIE['username']
			// echo "dairen---".@$_COOKIE['username']."<br>";
			if (isset($_COOKIE['username'])) {
				// echo "11";
				$_SESSION['username']=$_COOKIE['username'];
				$_SESSION['islog']=1;
			}
			if(isset($_SESSION['islog'])){
				echo $_SESSION['username'].",你好，欢迎来到个人中心！";
				echo "<a class='aLogout' href='logout.php'>注销</a>";
			}else{
				echo "您还未登录，请<a class='aLogout' href='../pc/login.html'>登录</a>";
			}
		 ?>

		<div id="divKey">
			<form action="" method="get">
				<input id="divInputText" type="text" name="key">
			<input id="divInputSub" type="submit" name="submit" value="搜索">
			</form>
		</div>
		<div id="lump">
			<p id="pText">你想告诉大家什么新鲜事？</p>
			
				<form action="" method="post">
					<div id="div_form">
					<input type="hidden" value="$_GET['user']" name="user">
					<input id="inputText" type="text" name="userTitle" value="请填写标题"><br>
					<textarea id="inputContent" name="userContent"></textarea><br>
					</div>
					<input id="sub" type="submit"  value="发表">
				</form>	
		</div>

	<?php
		include('message.class.php');
		$message = new Message();
		$message->display();
		if(!empty($_POST['userContent']) && isset($_COOKIE['username'])){
				$message->add();
			}
		?>
	</body>
</html>