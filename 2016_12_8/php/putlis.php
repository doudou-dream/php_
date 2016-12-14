<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/putlis.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/putlis.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
	<body>
	<?php if(!empty($_GET['user']))
		{
			echo "<div class='aLogin'><p >".$_GET['user']."用户</p></div>";
		}else echo "<div class='aLogin'><a href='login.php'>"."未登录"."</a></div>";;
	?>
		<div id="lump">
			<p id="pText">你想告诉大家什么新鲜事？</p>
			
				<form action="" method="post">
					<div id="div_form">
					<input type="hidden" value="$_GET['user']" name="user">
					<input id="inputUser" type="text" name="userTitle" value="请填写标题"><br>
					<textarea id="inputContent" name="userContent"></textarea><br>
					</div>
					<input id="sub" type="submit"  value="发表">
				</form>	
		</div>

		<?php 
		// echo date('y-m-d h:i:s',time());
		include('message.class.php');
		$message = new Message();
		$message->display();
			// echo "1".$_GET['user']."<br>";
		if(!empty($_POST['userContent'])){
				
				$message->add();
			}
		?>
	</body>
</html>