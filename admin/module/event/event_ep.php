<?php
include ("../../db/connect.php");
include ("../../functions.php");
    $rev = $_POST['ref'];
    $nid=$_POST['nid'];
    $nsubject=$_POST['nsubject'];
    $ncontent=$_POST['ncontent'];
    $npicture=$_POST['npicture'];
    $ndate=$_POST['ndate'];
    $act=$_POST['act'];
    if ($_SESSION['SESS_MEMBER_ID']==''){ header( 'refresh: 0; url=../../noty.php?mode=error');}
    else{
        if($act=='insert'){
            $query = sprintf("INSERT INTO event (nsubject, ncontent, npicture, ndate) VALUES (%s, %s, %s, %s)",
                  GetSQLValueString($con,$nsubject, "text"),
                  GetSQLValueString($con,$ncontent, "text"),
                  GetSQLValueString($con,$npicture, "text"),
                  GetSQLValueString($con,$ndate, "date"));
        }
        elseif($act=='update'){
            $query = sprintf("UPDATE event SET nsubject=%s, ncontent=%s, npicture=%s, ndate=%s WHERE nid=%s",
                       GetSQLValueString($con,$nsubject, "text"),
                       GetSQLValueString($con,$ncontent, "text"),
                       GetSQLValueString($con,$npicture, "text"),
                       GetSQLValueString($con,$ndate, "date"),
                       GetSQLValueString($con,$nid, "int"));
        }
        else{
        $rev = $_GET['ref'];  
        $id=$_GET['id'];
             $query="DELETE FROM event WHERE id='".$id."'";
        }
        mysqli_query($con, $query);
        $ref = '../../mods.php?ref='.$rev;
        header( 'refresh: 0; url='.$ref);
    }
?>