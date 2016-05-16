<?php
include("db/config.php");

$name=$_POST['name'];
$content=$_POST['content'];

        $company=$_POST['company'];
        $domain=$_POST['domain'];
        $logo=$_POST['logo'];
        $title=$_POST['title'];
        $description=$_POST['description'];
        $keyword=$_POST['keyword'];

        $query = sprintf("UPDATE setting SET company=%s, domain=%s, logo=%s, title=%s, description=%s, keyword=%s WHERE id=%s",
                       GetSQLValueString($con,$company, "text"),
                       GetSQLValueString($con,$domain, "text"),
                       GetSQLValueString($con,$logo, "text"),
                       GetSQLValueString($con,$title, "text"),
                       GetSQLValueString($con,$description, "text"),
                       GetSQLValueString($con,$keyword, "text"),
                       GetSQLValueString($con,1, "int"));

mysqli_query($con, $query)or die("Query failed");
$ref = 'noty.php?mode=success';
header( 'refresh: 0; url='.$ref);
?>