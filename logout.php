<?php
	require_once('session.php');
	require_once('classes/class.user.php');
	$user_logout = new USER();
	
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('home.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->Logout();
		$user_logout->redirect('index.php');
	}
