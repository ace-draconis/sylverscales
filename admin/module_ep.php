<?php
 require("db/config.php");
    $act=$_POST['act'];
    $id=$_POST['id'];

   $name = $_POST['name'];
   $url = $_POST['url'];
   $target = $_POST['target'];

if ($_SESSION['SESS_MEMBER_ID']==''){ header( 'refresh: 0; url=noty.php?mode=error');}
else{
if($act=='insert'){
        $query = sprintf("INSERT INTO module (name, url) VALUES (%s, %s)",
                GetSQLValueString($con,$name, "text"),
                GetSQLValueString($con,$url, "text"));
        mysqli_query($con, $query);
        $ref ='module.php';
        header( 'refresh: 0; url='.$ref);
}
elseif($act=='update') {
         $query = sprintf("UPDATE module SET name=%s, url=%s WHERE id=%s",
                       GetSQLValueString($con,$name, "text"),
                       GetSQLValueString($con,$url, "text"),
                       GetSQLValueString($con,$id, "int"));
        mysqli_query($con, $query);
        $ref = 'module.php';
        header( 'refresh: 0; url='.$ref);
}
else{
    $act=$_GET['act'];
    $id=$_GET['id'];

    $query="DELETE FROM module WHERE id='".$id."'";

    mysqli_query($con, $query);
    $ref = 'module.php';
    header( 'refresh: 0; url='.$ref);
}
}
?>