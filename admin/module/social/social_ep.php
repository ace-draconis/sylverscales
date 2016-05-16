<?php
include ("../../db/connect.php");
include ("../../functions.php");
$rev = $_POST['ref'];
$act = $_POST['act'];
$id = $_POST['id'];
$name = $_POST['name'];
$url = $_POST['url'];
$target = $_POST['target'];
if ($_SESSION['SESS_MEMBER_ID'] == '') {
    header('refresh: 0; url=../../noty.php?mode=error');
}
else {
    if ($act == 'insert') {
        $query = sprintf("INSERT INTO social (name, url, target) VALUES (%s, %s, %s)",
            GetSQLValueString($con,$name,"text"),
            GetSQLValueString($con,$url,"text"),
            GetSQLValueString($con,$target,"text"));
    }
    elseif ($act == 'update') {
        $query = sprintf("UPDATE social SET name=%s, url=%s, target=%s WHERE id=%s",
            GetSQLValueString($con,$name,"text"),
            GetSQLValueString($con,$url,"text"),
            GetSQLValueString($con,$target,"text"),
            GetSQLValueString($con,$id,"int"));
    }
    else {
        $id = $_GET['id'];
        $rev = $_GET['ref'];
        $query = "DELETE FROM social WHERE id='".$id."'";
    }
    mysqli_query($con,$query);
    $ref = '../../mods.php?ref='.$rev;
    header('refresh: 0; url='.$ref);
}
?>