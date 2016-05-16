<?php
include ("head.php");
include('db/connect.php');
include('functions.php');
$query = "SELECT * FROM setting WHERE id='1'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$logo = $row['logo'];
$company = $row['company'];
$domain = $row['domain'];
$keyword = $row['keyword'];
$description = $row['description'];

?>
<body>
<header>
  <div class="container_16" id="wrap"><div id="main"><center>
    <div class="grid_16" style="height:70px;padding-top:5px;">
        <div class="grid_3 ">
            <img src="<?php echo $logo;?>" border="0" height="60px" align="left" style="margin-top:0px;">
        </div>
        <div class="grid_10">&nbsp;</div>
        <div class="grid_3" style="text-align:right;color:#99bb00;padding-top:5px;">
            <?php
            if ($_SESSION['SESS_POWER'] != '') {
              echo '<div><center>';
              if ($_SESSION['SESS_POWER'] == 1) {
                 echo'<a href="setting.php"><img src="images/layout.png" width="35" rel="tipsy" title="Settings"></a>';
              }

               if ($_SESSION['SESS_POWER'] == 2) {
                echo '<a href="user.php?mode=modify&ref='.$_SESSION['SESS_MEMBER_ID'].'" style="margin-left:16px;"><img src="images/user.png" width="35" rel="tipsy" title="Change Password"></a>';
              }
              if ($_SESSION['SESS_POWER'] == 1) {
                echo '<a href="user.php" style="margin-left:16px;"><img src="images/user.png" width="35" rel="tipsy" title="Users"></a>';
              }

              echo '<a href="logout.php" style="margin-left:16px;"><img src="images/log.png" width="35" rel="tipsy" title="Log Out"></a>';

              echo '</center></div><div style="margin-top:-15px;"><center>';
              if ($_SESSION['SESS_POWER'] == 1) {
                echo '<a href="module.php"><img src="images/module.png" width="35" rel="tipsy" title="Modules"></a>';
              }
                 echo '<a href="../index.php" target="_blank" style="margin-left:16px;"><img src="images/view.png" width="35" rel="tipsy" title="Live View"></a>';
            }
            echo'</div>';
            ?>
        </div>
    </div>
    </div>

    </header>
    <div class="container_16">
<div id="loading-image">
    <table cellspacing="0px" cellpadding="5px" class="box" style="width:250px;">
        <tr><th>PROCESSING</th></tr>
        <tr>
            <td style="font-size:12px;">
                  <center>
                  <img src="images/success.png" height="100px" alt=""><br>
                  <img src="images/preloader.gif" width="150px"   border="0" alt="" style="margin:10px;"/> <br>
            </td>
        </tr>
    </table>
</div>
</div>
