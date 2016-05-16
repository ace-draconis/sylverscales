<?php
require("admin/db/connect.php");

        $query3 = "SELECT * FROM setting WHERE id='1'";
        $result3 = mysqli_query($con,$query3);
        $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
        $company3=$row3['company'];


        $query4 = "SELECT * FROM contact WHERE id='1'";
        $result4 = mysqli_query($con,$query4);
        $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);

        $email4=$row4['email'];

        $PostDate=date('l jS \of F Y h:i:s A');

    	$Name=$_POST['name'];
        $SFrom=$_POST['email'];
    	$Content=$_POST['message'];

    	$MyIP=$_SERVER['REMOTE_ADDR'];

    	$to= $_POST['email'];

    	// Your subject
        $subject="$company3 Enquiry";
    	// From
        $header .= 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= "From: $company3 Enquiry <$SFrom>\r\n";
        $header .= "Cc: $email4\r\n";

    	// Your message
        $message.="<HTML>";
        $message.="<HEAD>";
        $message.="<BODY>";
    	$message.="Dear $Name,<br>";
    	$message.="<br>";
    	$message.="Thank you. We have received your email.<br><br>";
    	$message.="Detail of $subject are as below:-<br><br>";
    	$message.="<table><tr><td><b>Name      :</b></td><td> $Name</td></tr>";
        $message.="<tr><td><b>Email            :</b></td><td>  $SFrom</td></tr>";
        $message.="<tr><td><b>Message          :</b></td><td>  $Content</td></tr>";
        $message.="<tr><th colspan=2>&nbsp;</th></tr>";
    	$message.="<tr><td><b>IP Address       :</b></td><td>  $MyIP</td></tr>";
    	$message.="<tr><th colspan=2>&nbsp;</th></tr>";
    	$message.="<tr><td><b>Date Posted      :</b></td><td>  $PostDate</td></tr>";
    	$message.="<tr><th colspan=2>&nbsp;</th></tr></table>";
    	$message.="Thank you.<br>";
    	$message.="<br>";
    	$message.="Regards,<br>";
    	$message.="$company3<br>";
        $message.="</BODY>";
        $message.="</HTML>";
    	// send email
           if($SFrom!=""){
             mail($to,$subject,$message,$header);
             echo'<h3>Email Successfully Sent. Thank you.</h3>';
           }


?>
