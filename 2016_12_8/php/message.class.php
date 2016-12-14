<?php
	/**
	* 
	*/
	class Message
	{
		private $userId;
		private $userTitle;
		private $userContent;
		private $userTime;
		private $userHits;
		private $user;
		function __construct()
		{
			// $this->userId=$userId;
			include('conn.php');
			// echo $_GET['user'];
			// $this->userTime=$userTime;
			// $this->userHits=$userHits;
		}
		public function add()
		{
			$this->userTitle=$_POST['userTitle'];
			$this->userContent=$_POST['userContent'];
			$this->userTime = date('y-m-d h:i:s',time());
			$this->user=$_GET['user'];
			if (!empty($_GET['user'])) {
				echo "<script>alert( $this->user)</script>";
				$sql="insert into message set userTitle = '$this->userTitle',userContent = '$this->userContent',userTime = '$this->userTime',user = '$this->user'";
				// echo $sql;
				mysql_query($sql);
			}else{
				echo "<script>alert('用户未登录')</script>";
			}
			echo "<script>location.href='putlis.php?user=$this->user'</script>";
		}
		public function display()
		{	
			
			$sql = "select * from message order by usertime desc";

			$row=mysql_query($sql);
			// $arr=mysql_fetch_assoc($row);
			// print_r($arr);
			while($arr=mysql_fetch_assoc($row)){

				echo "<div class='divUser'>";
				echo "<p class='pUserTitle'><a href='#'>".$arr['usertitle']."</a></p>";
				echo "<img src='../image/arrow_32.png' class='imgShow'>";
				$id=$arr['userid'];	
				$user=$arr['user'];
				echo "<div class='divDisplay'>
						<p><a id='aDisplay' href='#'>编辑</a></p>
						<p><a href='delete.php?userid=$id&user=$user'>删除</a></p>
					</div>";
				echo "<hr/>";
				echo "<p class='pUserContent'>". $arr['usercontent']."</p>";
				echo "<p class='pUser_1'>". $arr['usertime']." ".$arr['user']." ".$arr['userhits']."</p>";
				echo "</div><br>";
			}
		}
		
	}