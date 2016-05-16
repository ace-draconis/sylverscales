<?php
 require("db/config.php");
    $act=$_POST['act'];
    $filter=$_POST['filter'];
    $type=$_POST['type'];
    $enable=$_POST['enable'];
    if($type=='image'){$content=$_POST['image'];}
    elseif($type=='video'|| $type=='audio'|| $type=='flash'){$content=$_POST['media'];}
    elseif($type=='youtube' || $type='vimeo'){$content=$_POST['youtube'];}
    $title=$_POST['title'];
    $descr=$_POST['descr'];

if ($_SESSION['SESS_MEMBER_ID']==''){ header( 'refresh: 0; url=noty.php?mode=error');}
else{
    if($act=='addfilter')
    {
            $query = sprintf("INSERT INTO filter (name) VALUES (%s)",
                           GetSQLValueString($con,$filter, "text"));
            mysqli_query($con, $query)or die("Insert failed");

            $ref = 'noti.php?mode=insert';
            header( 'refresh: 0; url='.$ref);
    }
    elseif($act=='modfilter')
    {
            $id=$_POST['id'];
            $last=$_POST['last'];
            $query1 = sprintf("UPDATE gallery SET filter=%s WHERE filter=%s",
                           GetSQLValueString($con,$filter, "text"),
                           GetSQLValueString($con,$last, "text"));

            mysqli_query($con, $query1)or die("Update1 failed");

            $query2 = sprintf("UPDATE filter SET name=%s, enable=%s WHERE id=%s",
                           GetSQLValueString($con,$filter, "text"),
                           GetSQLValueString($con,$enable, "int"),
                           GetSQLValueString($con,$id, "int"));

            mysqli_query($con, $query2)or die("Update failed");

            $ref = 'noti.php?mode=success';
            header( 'refresh: 0; url='.$ref);
    }
    elseif($act=='insert'){
        $query = sprintf("INSERT INTO gallery (filter, type, content, title, descr) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($con,$filter, "text"),
                       GetSQLValueString($con,$type, "text"),
                       GetSQLValueString($con,$content, "text"),
                       GetSQLValueString($con,$title, "text"),
                       GetSQLValueString($con,$descr, "text"));
        mysqli_query($con, $query)or die("Insert failed");
        $ref = 'noti.php?mode=insert';
        header( 'refresh: 0; url='.$ref);
    }
    elseif($act=='update'){
        $id=$_POST['id'];
        $query = sprintf("UPDATE gallery SET filter=%s, type=%s, content=%s, title=%s, descr=%s WHERE id=%s",
                       GetSQLValueString($con,$filter, "text"),
                       GetSQLValueString($con,$type, "text"),
                       GetSQLValueString($con,$content, "text"),
                       GetSQLValueString($con,$title, "text"),
                       GetSQLValueString($con,$descr, "text"),
                       GetSQLValueString($con,$id, "int"));

        mysqli_query($con, $query)or die("Update failed");
        $ref = 'noti.php?mode=success';
        header( 'refresh: 0; url='.$ref);
    }
    else{
    $id=$_GET['id'];
    $act=$_GET['act'];
        if($act=='delfilter'){
            $query1 = "SELECT * FROM filter WHERE id=".$id."";
            $result1 = mysqli_query($con, $query1);
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                $filter1= $row1['name'];

            $query2 = sprintf("UPDATE gallery SET filter=%s WHERE filter=%s",
                GetSQLValueString($con,NULL, "text"),
                GetSQLValueString($con,$filter1, "text"));

            mysqli_query($con, $query2)or die("Update1 failed");

            $query3="DELETE FROM filter WHERE id=".$id."";
            mysqli_query($con, $query3);
            $ref = 'noti.php?mode=delete';
            header( 'refresh: 0; url='.$ref);
        }
        else{
            $query="DELETE FROM gallery WHERE id='".$id."'";
            mysqli_query($con, $query);
            $ref = 'gallery.php';
            header( 'refresh: 0; url='.$ref);
        }

    }
}
?>