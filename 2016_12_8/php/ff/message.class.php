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
		private $pagesize = 10;//显示几天数据
		private $offset;//翻页标志
		private $max;

		
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
			$this->user=$_COOKIE['username'];//$_COOKIE['username']
			if (isset($_COOKIE['username'])){
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
			//搜索
			if (!empty($_GET['key'])) {
				$key=$_GET['key'];
				$z = "usertitle like '%".$key."%'";
			}else{
				$key = '';
				$z=1;
			}
			// echo $z."<br>";
			//上一页下一个的
			if(isset($_GET['page'])){
				$page=$_GET['page'];
			}else{
				$page=0;
			}
			//计算有多少条数据
			$result = mysql_query("select * from message where $z");
			$num = mysql_num_rows($result);
			
			$this->max=ceil($num/$this->pagesize);
			//翻页标志
			$this->offset=$page*$this->pagesize;
			// $sql = "select * from message order by usertime desc";
			$sql = "select * from message where $z order by usertime desc limit $this->offset,$this->pagesize";
			// echo $sql;
			$row=mysql_query($sql);
			// $arr=mysql_fetch_assoc($row);
			// print_r($arr);
			while(@$arr=mysql_fetch_assoc($row)){
				$id=$arr['userid'];	
				$user=$arr['user'];// echo "$user";
				$userhits=$arr['userhits'];#取值
				echo "<div class='divUser'>";
				echo "<p class='pUserTitle'><a href='messageHome.php?userhits=$userhits&user=$user&id=$id'>".$arr['usertitle']."主页</a></p>";
				echo "<img src='../../image/arrow_32.png' class='imgShow'>";
				
				echo "<div class='divDisplay'>
						<p><a id='aDisplay' href='messageAdopt.php?userid=$id&user=$user'>编辑</a></p>
						<p><a href='delete.php?userid=$id&user=$user'>删除</a></p>
					</div>";
				echo "<hr/>";
				echo "<p class='pUserContent'>". $arr['usercontent']."</p>";
				echo "<p class='pUser_1'>". $arr['usertime']." ".$arr['user']." ".$arr['userhits']."</p>";
				echo "</div><br>";
			}
			echo "<div id='divTran'>";
			if ($page!=0) {
				echo "<a href='?page=".($page-1)."&key=$key'>上一页</a>";
			}
			$i=0;
			for($i=0;$i<$this->max;$i++){
				if ($page == $i) {
					echo "<span id='divP'> ".($i+1)." </span>";
					continue ;
				}{
					echo "<a href='?page=".($i)."&key=$key'> ".($i+1)." <a/>";
				}
				
				// echo "  diarne--".($i)."<br>";
			}
			// echo "<br>doudou--".$this->max;
			if (($page+1)<$this->max) {
				echo "<a href='?page=".($page+1)."&key=$key'>下一页</a>";
			}
			echo"</div>";
			
		}
		function updateMessage(){
			//编辑修改提交
			@$userid=$_COOKIE['userid'];
			$userTitle=$_POST['userTitle'];
			$userContent=$_POST['userContent'];
			$sql = "UPDATE message SET usertitle='$userTitle',usercontent = '$userContent' WHERE userid='$userid';";
			echo $sql;
			mysql_query($sql);
			header("location:putlis.php");
		}
		
	}