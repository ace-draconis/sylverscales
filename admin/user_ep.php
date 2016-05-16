<?php
 require("db/config.php");
    $act = $_POST['act'];
    $id = $_POST['id'];

    $username = $_POST['username'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];
    $post = $_POST['post'];

    //validate
    $error=errors($username, $pwd1, $pwd2);
    //check if user already exist
    if($act=='insert'){
    $queryz = "SELECT * FROM users WHERE username='".$username."'";
    $resultz = mysqli_query($con, $queryz);
    $num_rowz = mysqli_num_rows($resultz);
        if($num_rowz!=0)
        {
            $error[]='That username already exist in the database!';
        }
    }

    //if any error, show notification
    if($error)
    {
        $_SESSION['ERROR'] = $error;
        $ref = 'noty.php?mode=notify';
        echo'<script>self.location="'. $ref.'";</script> ';
            foreach($error as $msg)
            {
        	    echo'<li>'.$msg.'</li>';
            }
    }

if($act=='insert'){

        $query = sprintf("INSERT INTO users VALUES (%s,%s,md5(%s),%s,%s)",
            GetSQLValueString($con, NULL, "int"),
            GetSQLValueString($con, $username, "text"),
            GetSQLValueString($con, $pwd1, "text"),
            GetSQLValueString($con, $post, "int"),
            GetSQLValueString($con, "1", "int"));
            mysqli_query($con, $query);
        $ref ='user.php';
        header( 'refresh: 0; url='.$ref);
 }
else if($act=='update') {

       $query = sprintf("UPDATE users SET username=%s, password=md5(%s), post=%s WHERE id=%s",
            GetSQLValueString($con, $username, "text"),
            GetSQLValueString($con, $pwd1, "text"),
            GetSQLValueString($con, $post, "int"),
            GetSQLValueString($con, $id, "int"));
            mysqli_query($con, $query);
      if($_SESSION['SESS_POWER'] != 1){$ref = 'logout.php'; }
      else{ $ref = 'noty.php?mode=success'; }
      header( 'refresh: 0; url='.$ref);
 }
else{
 		$act=$_GET['act'];
        $id=$_GET['id'];

        $query="DELETE FROM users WHERE id='".$id."'";
        mysqli_query($con, $query);
        $ref = 'noty.php?mode=success';
        header( 'refresh: 0; url='.$ref);
}
?>