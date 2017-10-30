<?php

	session_start();
	
        // initialize user class
	require_once 'classes/class.user.php';
	$session = new USER();
	
	// if session not active redirect to login page.
        
	if(!$session->is_loggedin())
	{
		$session->redirect('index.php');
	}