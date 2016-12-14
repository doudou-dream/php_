<?php
	include('conn.php');
	if(!empty($_GET['userid'])){
		$userId=$_GET['userid'];
		$user=$_GET['user'];
		$sql = "delete from message where userId='$userId'";
		mysql_query($sql);
		echo "<script>alert('删除成功');location.href='putlis.php?user=$user'</script>";
	}