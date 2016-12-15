<?php
	$link = @mysql_connect("localhost","root","") or die("连接数据库错误");
	@mysql_select_db("doudou") or die("数据库打开失败！");
	mysql_query("set names utf8");