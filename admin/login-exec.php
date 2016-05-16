<?php
	//Include database connection details
	include('db/config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;

	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($con, $str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($con, $str);
	}

	//Sanitize the POST values
	$username = clean($con, $_POST['username']);
	$password = clean($con, $_POST['password']);
	
	//Input Validations
	if($username == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERROR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();
	}
	
	//Create query
  	$query="SELECT * FROM users WHERE username='".$username."' AND password='".md5($_POST['password'])."' AND enable='1'";
	$result=mysqli_query($con, $query);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) == 1) {
			//username Successful
	   
			$member = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_POWER'] = $member['post'];
			header("location:index.php");

		}else {
			//Login failed
			header("location: noty.php?mode=logfail");
			exit();
		}
	}else {
	   $_SESSION['ERROR'] = $errmsg_arr;
	    $ref = 'noty.php?mode=notify';
               echo'<script>
                    self.location="'. $ref.'";
                </script> ';
	}
?>