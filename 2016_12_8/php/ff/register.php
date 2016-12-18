<?php
	session_start();
	$username = $_POST['username'];
	$userpwd = $_POST['userpwd'];
	// setcookie('username',$username);
	// setcookie('userpwd',$userpwd);
	include('person.class.php');
	$person = new Person();
	$person->userAdd($username,$userpwd);