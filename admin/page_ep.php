<?php
require ("db/config.php");
$act = $_POST['act'];
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

if ($_SESSION['SESS_MEMBER_ID'] == '') {
    header('refresh: 0; url=noty.php?mode=error');
}
else {
    if ($act == 'update') {
            $query = sprintf("UPDATE general SET title=%s, content=%s WHERE id=%s",
            GetSQLValueString($con,$title,"text"),
            GetSQLValueString($con,$content,"text"),
            GetSQLValueString($con,$id,"int"));

    }
    elseif ($act == 'url') {
        $url = $_POST['url'];
        $target = $_POST['target'];
        $query = sprintf("UPDATE general SET title=%s, url=%s, target=%s WHERE id=%s",
            GetSQLValueString($con,$title,"text"),
            GetSQLValueString($con,$url,"text"),
            GetSQLValueString($con,$target,"text"),
            GetSQLValueString($con,$id,"int"));
    }
    else {
        $email = $_POST['email'];
        $address = $_POST['address'];
        $label = $_POST['label'];
         $query = sprintf("UPDATE contact SET email=%s, address=%s, label=%s, content=%s WHERE id=1",
            GetSQLValueString($con,$email,"text"),
            GetSQLValueString($con,$address,"text"),
            GetSQLValueString($con,$label,"text"),
            GetSQLValueString($con,$content,"text"));
    }
    mysqli_query($con,$query) or die("Query failed");
    $ref = 'noty.php?mode=success';
    header('refresh: 0; url='.$ref);
}
?>