<?php
	include('conn.php');
	$user=$_GET['user'];
	if(isset($_COOKIE['username']) && $user==$_COOKIE['username']){
		$userId=$_GET['userid'];
		
		$sql = "delete from message where userid='$userId'";
		mysql_query($sql);
		echo "<script>alert('删除成功');location.href='putlis.php'</script>";
	}else{
		echo "<script>alert('选择无效');location.href='putlis.php'</script>";
	}