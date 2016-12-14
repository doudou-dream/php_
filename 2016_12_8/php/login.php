<html>
<head>
	<meta name="name" content="content" charset="utf-8">
	<link href ="../css/login.css" rel="stylesheet">
</head>
	<body>
	<div id="lump">
		<p id="theme">Log In to your account</p>
		<hr>
		<div id="login">
			<form action="login.php" method="post" accept-charset="utf-8">
			<div id="tent">
				<p class="forgot">Forgot username?</p>
				<span class="user_e">Username:</span><input id="userText" class="text" type="text" name="user"><br>
				<p class="forgot">Forgot password?</p>
				<span class="user_e">Password:</span><input class="text" type="password" name="pwd"><br>
				<input class="checkbox_7" type="checkbox" name="remember" value="yes">7天自动登录
			</div>
				<input id="sub" type="submit" value="Log in">	
			</form>
			<!-- <?php if(!empty($_POST['user'])){
				include("person.class.php");
				$person = new person();
				// $person->userAdd();
				$person->login();
			}?>	 -->		
		</div>
		<hr>
		<div id="register">
			<div id="register_u">Don’t have an account?</div>
			<div id="register_w"><a href="#">Create one here.</a></div>
		</div>
	</div>
	</body>
</html>