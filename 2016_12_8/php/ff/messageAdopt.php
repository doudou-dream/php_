<?php
	//所有编辑数据都在这里从数据库莉取数据
	include('conn.php');
	session_start();
	$username = $_GET['user'];
	$userid = $_GET['userid'];
	// echo $userid;
	setcookie("userid",$userid);
	// echo $_COOKIE['username']."<br>".$username."<br>";
	if (isset($_COOKIE['username']) && $_COOKIE['username']==$username) {
		$userId = $_GET['userid'];
		$sql = "select * from message where userid='$userId'";
		// echo $sql;
		$row=mysql_query($sql);
		$arr = mysql_fetch_array($row);
		// print_r($arr);
		setcookie("usertitle",$arr['usertitle']);
		setcookie("usercontent",$arr['usercontent']);
		header("location:edit.php");
	}else {
		echo "<script>alert('选择无效');location.href='putlis.php'</script>";
	}
	
	