<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['SESS_POWER']);
	unset($_SESSION['ERROR']);

$ref = 'noty.php?mode=logout';
header( 'refresh: 0; url='.$ref);
?>

