<?php
include ("../../db/connect.php");
include ("../../functions.php");
$rev = $_POST['ref'];
$act = $_POST['act'];
$vary = $_POST['vary'];
$mode = $_POST['mode'];
if($mode==""){$mode ='single';}
$id = $_POST['id'];
if ($_SESSION['SESS_MEMBER_ID'] == '') {
    header('refresh: 0; url=../../noty.php?mode=error');
}
else {
    if ($act == 'insert') {
        $filename = $_FILES['uploadedfile']['name'];
        $name = explode(".",$filename);
        $base = "../../../theme/".$name[0]."/";
        mkdir($base,0777);
       echo $dir = $base.basename($_FILES['uploadedfile']['name']);
        if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$dir)) {
            $unzip = $_FILES['uploadedfile']['name'];
            if (is_file($dir)) { //do da UNZIP!!!!
                include ('pclzip.lib.php');
                $zip = new PclZip($dir);
                $zip->extract(PCLZIP_OPT_PATH,$base);
                unlink($dir);
            }
             $query = sprintf("INSERT INTO theme (enable, theme, vary, mode) VALUES (%s, %s, %s, %s)",
                GetSQLValueString($con, 0,"int"),
                GetSQLValueString($con, $name[0], "text"),
                GetSQLValueString($con, 'default', "text"),
                GetSQLValueString($con, 'single', "text"));
        }
        else {
            echo "There was an error uploading the file, please try again!";
        }

    }
    elseif ($act == 'update') {
        $query = sprintf("UPDATE theme SET vary=%s, mode=%s WHERE id=%s",
                GetSQLValueString($con,$vary,"text"),
                GetSQLValueString($con,$mode,"text"),
                GetSQLValueString($con,$id,"int"));
    }
    else {
        $rev = $_GET['ref'];
        $act = $_GET['act'];
        $id = $_GET['id'];
        if ($act == 'delete') {
            $query1 = "SELECT * FROM theme WHERE id='".$id."'";
            $result = mysqli_query($con,$query1);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $theme = $row['theme'];
            $dir = "../../../theme/".$theme."";
            function rrmdir($dir) {
                if (is_dir($dir)) {
                    $objects = scandir($dir);
                    foreach ($objects as $object) {
                        if ($object != "."&&$object != "..") {
                            if (filetype($dir."/".$object) == "dir") {
                                rrmdir($dir."/".$object);
                            }
                            else {
                                unlink($dir."/".$object);
                            }
                        }
                    }
                    reset($objects);
                    rmdir($dir);
                }
            }
            rrmdir($dir);
            $query = "DELETE FROM theme WHERE id='".$id."'";
        }
        else {
            $query = "UPDATE theme SET enable=IF(id=".$id.", 1, 0)";
        }
    }
    mysqli_query($con,$query);
    $ref = '../../mods.php?ref='.$rev;
  header('refresh: 0; url='.$ref);
}
?>