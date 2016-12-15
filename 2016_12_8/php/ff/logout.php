<?php
	header("Content-Type:text/html; charset=utf-8");
	session_start();
	$username = @$_SESSION['username'];
	$_SESSION = array();//清除session
	session_destroy();
	//清除coolie
	@setcookie("username",'',time-1);
	setcookie("pw",'',time()-1);
	echo @$username.",欢迎下次光临";
	echo "<a href='../pc/login.html'>登录</a>";