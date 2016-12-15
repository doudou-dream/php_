<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	include('person.class.php');
	$person = new Person();
	if (isset($_POST['login'])) {
		$username=trim($_POST['username']);
		$password = trim($_POST['pwd']);
		//查询数据库里的用户
		$boo=$person->login();
		// echo "<br>带人--".$boo."<br>";
		if ($username=='' || $password=='') {
			header("refresh:3;url=../pc/login.html");
			echo "该用户名或密码不能为空，3秒后跳转到登陆页面";
			exit;
		}elseif (!$boo) {
			header("refresh:3;url=../pc/login.html");
			echo "用户名或密码错误，3秒后跳转到登陆页面";
			exit;
		}else{//登录成功

			$_SESSION['username']=$username;
			// $_SESSION['islogin'] = 1;//存取一个值；暂时没找到
			//勾选7天自动登录
			// echo $_POST['remember'];
			if (@$_POST['remember'] == "yes") {
				setcookie("username",$username,time()+(7*24*60*60));
				setcookie("pw",$password,time()+(7*24*60*60));

				// echo "7天<br>". $_COOKIE['username'];
			}else{
				//没有勾选7天自动登录
				setcookie("username",$username);//不设置时间就他的生命周期就时这个游览器的没关闭之前游览器关闭就会结束生命周期
				setcookie("pw",$password);
				//跳转主界面
			}
		// header("refresh:5;url=putlis.php");
		header("location:putlis.php");
		// echo "成功";
		}
	}