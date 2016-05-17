<?php
error_reporting(0);
session_start();
include('functions.php');
switch($_SERVER['REQUEST_METHOD'])
{
case 'GET': $step = &$_GET['step']; break;
case 'POST': $step = &$_POST['step']; break;

default:
}
//Deploy database
function deploy($db_host, $db_user, $db_pass, $db_name){
            $link = mysqli_connect($db_host, $db_user, $db_pass);
            // Name of the file
            $filename = 'db/sylverscales.sql';
            mysqli_select_db($link, $db_name) or die('Error selecting MySQL database: ' . mysqli_error($link));
            // Temporary variable, used to store current query
            $templine = '';
            // Read in entire file
            $lines = file($filename);
            // Loop through each line
            foreach ($lines as $line_num => $line) {
                    // Only continue if it's not a comment
                    if (substr($line, 0, 2) != '--' && $line != '') {
                            // Add this line to the current segment
                            $templine .= $line;
                            // If it has a semicolon at the end, it's the end of the query
                            if (substr(trim($line), -1, 1) == ';') {
                                    // Perform the query
                                    mysqli_query($link, $templine) or print('Error performing query \'<b>' . $templine . '</b>\': ' . mysqli_error($link) . '<br /><br />');
                                    // Reset temp variable to empty
                                    $templine = '';
                            }
                    }
            }

            //create configuration file
            $myfile = fopen("db/connect.php", "w") or die("Unable to open file!");
            $txt = "<?php\n
            error_reporting(0);\n
            session_start();\n
            \$con = mysqli_connect('$db_host', '$db_user', '$db_pass', '$db_name');\n
            if (mysqli_connect_errno(\$con)) \n
            {echo 'Failed to connect to MySQL: ' . mysqli_connect_error();}\n
            ?>";
            fwrite($myfile, $txt);
            fclose($myfile);

            $error[4] = 'DATABASE CREATED<br>CONNECTION ESTABLISHED';
            $_SESSION['ERROR']=$error;

            echo'<script>
            self.location="install.php?step=2";
            </script>' ;
}

include ('head.php');
echo '
<body>
<header>
  <div class="container_16" id="wrap"><div id="main"><center>
    <div class="grid_16" style="height:70px;padding-top:5px;">
    <div class="grid_3 ">
            <img src="../attached/image/content/20150725145733_66769.png" border="0" height="60px" align="left" style="margin-top:0px;">
        </div>
    </div>
    </div>
    </div>

</header>
<div id="mask" class="list-wrap">
<div class="container_16" id="viewcont" >';
if($step==1){
    $db_host=$_POST['db_host'];
    $db_name=$_POST['db_name'];
    $db_user=$_POST['db_user'];
    $db_pass=$_POST['db_pass'];

    if(!$db_host){$error[0]='host missing';}
    if(!$db_name){$error[1]='database name missing';}
    if(!$db_user){$error[2]='username missing';}

$link = mysqli_connect($db_host, $db_user, $db_pass);
if (!$link) {
    $error[3] = 'Connection failed';
}
if($error){
    $_SESSION['ERROR'] = $error;
    echo'<script>self.location="install.php";</script>' ;
}
else{

    $query = "CREATE DATABASE $db_name";
    if (mysqli_query($link, $query)) {
        deploy($db_host, $db_user, $db_pass, $db_name);
    } else {
        $query="SELECT COUNT (DISTINCT 'table_name') FROM 'information_schema'.'columns' WHERE table_type = 'BASE TABLE' AND 'table_schema' = '".$db_name."'";
        $result = mysql_query($query, $link);
        if($result==0){
        deploy($db_host, $db_user, $db_pass, $db_name);
        }
        else{
            $error[3] = mysqli_error($link);
            $_SESSION['ERROR']=$error;
            echo'<script>
            self.location="install.php";
            </script>' ;
        }
    }
}

}
else if($step==2){
     $error=$_SESSION['ERROR'];
     echo '<center>
        <form id="viewcont"  name="loginForm" method="post" action="install.php">
        <input name="step" type="hidden" value="3"/>
              <div class="noty" style="width:245px;margin-top:-200px;">
              <h4>REGISTRATION</h4><br>
              <center><p><b>';
              if(isset($error[3])){echo'<span style="color:red;">'.$error[3].'</span><br>';}
              if(isset($error[4])){echo'<span style="color:green;">'.$error[4].'</span><br>';}
              echo'<img src="images/02.png" width="48" height="48" alt=""></b><br>ADMINISTRATOR REGISTRATION</p> </center>
                <p>USERNAME<span style="float:right;color:red;">'.$error[0].'</span>
                <input name="username" type="input" class="field2" id="username" value="admin" style="background:white;"/>
                </p>
                <p>PASSWORD<span style="float:right;color:red;">'.$error[1].'</span>
                <input name="password1" type="password" class="field2" id="password1"  style="background:white;"/>
                </p>
                <p>REPEAT PASSWORD<span style="float:right;color:red;">'.$error[2].'</span>
                <input name="password2" type="password" class="field2" id="password2"  style="background:white;"/>
                </p>
                <input type="submit" name="Register" value="Register" class="awesome green small" style="float:right;"/>
            </div></form>
      </center>';
       unset($_SESSION['ERROR']);
}
else if($step==3){
    include('db/connect.php');

    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

     //validate
    $error=errors($username, $password1, $password2);

     //if any error, show notification
    if($error)
    {
        $_SESSION['ERROR'] = $error;
        $ref = 'install.php?step=2';
        echo'<script>self.location="'. $ref.'";</script> ';
    }
    else{
        $query = sprintf("INSERT INTO users VALUES (%s,%s,md5(%s),%s,%s)",
            GetSQLValueString($con, NULL, "int"),
            GetSQLValueString($con, $username, "text"),
            GetSQLValueString($con, $password1, "text"),
            GetSQLValueString($con, "1", "int"),
            GetSQLValueString($con, "1", "int"));
            mysqli_query($con, $query);

        $error[4] = 'ADMINISTRATOR CREATED<br>PLEASE DELETE "install.php" FILE';
        $_SESSION['ERROR']=$error;

        $ref ='install.php?step=4';
         echo'<script>self.location="'. $ref.'";</script> ';
    }
}
else if($step==4){
     $error = $_SESSION['ERROR'];
      echo '<form id="viewcont" name="loginForm" method="post" action="login-exec.php">
              <div class="noty" style="width:245px;margin-top:-210px;"">
              <h4>Login Panel</h4><br>
              <center><p><b>';
              if(isset($error[4])){echo'<span style="color:green;">'.$error[4].'</span><br>';}
              echo'<img src="images/03.png" width="48" height="48" alt=""></b><br>FIRST TIME LOGIN</p> </center>
            <p>Username
                <input name="username" type="text" class="field2" id="username" style="background:white;"/>
                </p>
              <p>Password
                <input name="password" type="password" class="field2" id="password" style="background:white;"/>
                 </p>
                  <input type="submit" name="Submit" value="Login" class="awesome green small" style="float:right;"/>
            </div> </form>';
       unset($_SESSION['ERROR']);
}
else{
     $error=$_SESSION['ERROR'];
     echo '<center>
        <form id="viewcont"  name="loginForm" method="post" action="install.php">
        <input name="step" type="hidden" value="1"/>
              <div class="noty" style="width:245px;margin-top:-210px;">
              <h4>INSTALLATION</h4><br>
              <center><p><b>';
              if(isset($error[3])){echo'<span style="color:red;">'.$error[3].'</span><br>';}
              echo'<img src="images/01.png" width="48" height="48" alt=""></b><br>DATABASE DEPLOYMENT</p> </center>
                <p>DATABASE NAME <span style="float:right;color:red;">'.$error[1].'</span>
                <input name="db_name" type="text" class="field2" id="db_name" value="sylverscales" style="background:white;"/>
                </p>
                <p>HOST<span style="float:right;color:red;">'.$error[0].'</span>
                <input name="db_host" type="input" class="field2" id="db_host" value="localhost" style="background:white;"/>
                </p>
                <p>USERNAME<span style="float:right;color:red;">'.$error[2].'</span>
                <input name="db_user" type="input" class="field2" id="db_user" value="root" style="background:white;"/>
                </p>
                <p>PASSWORD
                <input name="db_pass" type="password" class="field2" id="db_pass"  style="background:white;"/>
                </p>
                <input type="submit" name="Deploy" value="Deploy" class="awesome green small" style="float:right;"/>
            </div></form>
      </center>';
      unset($_SESSION['ERROR']);
}
echo'</div></div></div>';

include ('footer.php');
?>