<?php
	
	/**
	* 用户
	*/
	class Person 
	{	
		
		private $user;
		private $pwd;
		function __construct()
		{
			$this->user = @$_POST['username'];
			$this->pwd = @$_POST['pwd'];
			include("conn.php");
			// echo $this->user."  ".$this->pwd;
		}
		public function login()
		{
			$sql = "select * from person where user='$this->user' and pwd='$this->pwd'";
			$row=mysql_query($sql);
			$arr = mysql_fetch_assoc($row);
			// print_r($arr);
			if(!empty($arr)){
				echo "登录成功";
				return true;
			}else{
				echo "登录失败";
				return false;
			}
		}
		public function userAdd($username,$userpwd)
		{
			$sql_1 = "select * from person where user = '$username'";
			$num=mysql_query($sql_1);
			if ($username=='' || $userpwd=='') {
				header("refresh:3;url=../pc/register.html");
				echo "该用户名或密码不能为空，3秒后跳转到注册页面";
				exit;
			}
			if(mysql_num_rows($num) == 0){
				$sql="insert into person set user = '$username',pwd = '$userpwd'";
				// echo "带人：".$sql;
				mysql_query($sql);
				setcookie("username",$username);//不设置时间就他的生命周期就时这个游览器的没关闭之前游览器关闭就会结束生命周期
				setcookie("pw",$userpwd);
				header('refresh:3;url=putlis.php');
				echo "注册成功，3秒后跳转到主页";
			}else{
				header("refresh:3;url=../pc/register.html");
				echo "用户名已存在，3秒后跳转到注册页面";
			}

			
		}
	}
	

