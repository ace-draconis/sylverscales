<?php
function level($post)
{
if ($post==1){$level='Super Admin';}
else if ($post==2){$level='Administrator';}
return $level;
}
function color($cat)
{
if ($cat==1){$color="#FF0033";}
else if ($cat==2){$color="#FF6600";}
else if ($cat==3){$color="Orange";}
else if ($cat==4){$color="#669900";}
else if ($cat==5){$color="Forestgreen ";}
else if ($cat==6){$color="#003399";}
else if ($cat==7){$color="#0099FF";}
else if ($cat==8){$color="#663399";}
else if ($cat==9){$color="#CC33FF";}
else if ($cat==10){$color="#FF3366";}
else {$color="#FF6699";}
return $color;
}
function error()
{
echo'
<div class="grid_16" style="height:40px;">&nbsp;</div>
<div class="grid_16 header"><h2>Notification</h2></div>
<div class="grid_16" style="height:100px;">&nbsp;</div>
 <table cellspacing="0px" cellpadding="5px" class="box">
              <tr><th>Error!</th></tr>
              <tr>
                <td>
<center> <img src="images/error.png"><br>
You are not an authorized user!<br />
Please return to main page : <span id=e style="padding:4px;"><a class=bt_a href="index.php">Main page</a></span></center>
</td>
</tr>
</table>
<div class="grid_16" style="height:250px;">&nbsp;</div>
';
}
function errors($username, $pwd1, $pwd2) {
        if(strlen($username)<3 || strlen($username)>12)
        {
            $err[0]='Between 3 to 12 characters!';
        }
        else if(preg_match('/[^a-z0-9\-\_\.]+/i',$username))
        {
            $err[0]='Username contains invalid characters!';
        }

        if(strlen($pwd1)<3 || strlen($pwd2)>12)
        {
            $err[1]='Between 3 - 12 character!';
        }
        else if($pwd1!=$pwd2)
        {
            $err[2] = 'Password does not match';
        }
 return $err;
}
if ( !function_exists("GetSQLValueString")) {

	function GetSQLValueString($con,$theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
		if (PHP_VERSION < 6) {
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		}

        $theValue = mysqli_real_escape_string($con, $theValue);
		switch ($theType) {
			case "text" :
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "''";
				break;
			case "int" :
				$theValue = ($theValue != "") ? intval($theValue) : "NULL";
				break;
			case "money" :
				$theValue = ($theValue != "") ? sprintf('%.2f', $theValue) : "NULL";
				break;
			case "double" :
				$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
				break;
			case "date" :
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;
			case "defined" :
				$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
				break;
		}
		return $theValue;
	}
}
?>