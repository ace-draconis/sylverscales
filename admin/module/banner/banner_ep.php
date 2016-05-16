<?php
include ("../../db/connect.php");
include ("../../functions.php");
    $rev = $_POST['ref'];
    $id=$_POST['id'];
    $banner=$_POST['banner'];
    $caps=$_POST['caps'];
    $act=$_POST['act'];
    if ($_SESSION['SESS_MEMBER_ID']==''){ header( 'refresh: 0; url=../../noty.php?mode=error');}
    else{
        if($act=='insert'){
            $query = sprintf("INSERT INTO banner (banner, caps) VALUES (%s, %s)",
                  GetSQLValueString($con,$banner, "text"),
                  GetSQLValueString($con,$caps, "text"));
        }
        elseif($act=='update'){
            $query = sprintf("UPDATE banner SET banner=%s, caps=%s WHERE id=%s",
                       GetSQLValueString($con,$banner, "text"),
                       GetSQLValueString($con,$caps, "text"),
                       GetSQLValueString($con,$id, "int"));
        }
        else{
        $rev = $_GET['ref'];  
        $id=$_GET['id'];
             $query="DELETE FROM banner WHERE id='".$id."'";
        }
        mysqli_query($con, $query);
        $ref = '../../mods.php?ref='.$rev;
        header( 'refresh: 0; url='.$ref);
    }
?>