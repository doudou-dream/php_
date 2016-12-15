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
		public function userAdd()
		{
			// $user=$_POST['user'],$pws=$_POST['pwd']
			$sql="insert into person set user = '$this->user',pwd = '$this->pwd'";
			mysql_query($sql);
		}
	}
	

