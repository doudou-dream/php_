<?php 
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../../css/edit.css">
</head>
<body>
<div id="bodyDiv">
	<p id="pText">修改</p>
	<form action="" method="post" accept-charset="utf-8">
		<input id="inputText" type="text" value="<?php echo @$_COOKIE['usertitle'];?>" name="userTitle"><br>
		<textarea id="inputContent" name="userContent"><?php echo @$_COOKIE['usercontent']; ?> </textarea><br>
		<input id="inputSubmit" type="submit" name="submit" value="确定">	
	</form>
	<?php
		include('message.class.php');
		if(!empty($_POST['submit'])){
			$message = new Message();
			$message->updateMessage();
		}
		
		
		
	?>
</div>
</body>
</html>