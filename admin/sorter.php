<?php
 include("db/config.php");

$table=mysqli_real_escape_string($con, $_POST['table']);
$action= mysqli_real_escape_string($con, $_POST['action']);
$arrange=$_POST['arrange'];

if ($action == "sortPg"){
	$count = 1;
	foreach ($arrange as $ref) {

		$query = "UPDATE ".$table." SET arrange=".$count." WHERE id=".$ref;
		mysqli_query($con, $query) or die('Error, insert query failed');
		$count++;
	}
}
?>