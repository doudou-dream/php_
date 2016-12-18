<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php  echo $_COOKIE['user']."主页"; ?></title>
	<link rel="stylesheet" type="text/css" href="../../css/home.css">
</head>
<body>
	<a class="aPutlis" href="putlis.php">主页</a>
	<div id="divDD">
		
		<p>标题: <?php echo $_COOKIE['usertitle'];?></p>
		<p id="pContent"><?php echo $_COOKIE['usercontent'];?></p>
		<p id="pTime"><?php echo $_COOKIE['usertime'];?></p>
		<div id="divSpan"><span id="spanHits">点击量: <?php echo $_COOKIE['userhits'];?></span></div>
		
	</div>

</body>
</html>