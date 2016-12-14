<?php
	
	/**
	* 
	*/
	class Person 
	{	
		
		private $user;
		private $pwd;
		function __construct()
		{
			$this->user = $_POST['user'];
			$this->pwd = $_POST['pwd'];
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
				echo "<script>location.href='putlis.php?user=$this->user'</script>";
			}else{
				echo "登录失败";
			}
			// echo $arr['user'];
		}
		public function userAdd()
		{
			// $user=$_POST['user'],$pws=$_POST['pwd']
			$sql="insert into person set user = '$this->user',pwd = '$this->pwd'";
			mysql_query($sql);
		}
	}
	

