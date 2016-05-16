<?php
include('header.php');
if ($_SESSION['SESS_MEMBER_ID']==''){
     echo'<script>
    self.location="noty.php?mode=error";
    </script> ' ;
    }
else{
$mode = $_GET['mode'];
$rev = $_GET['ref'];
include('menu.php');
echo'<div id="mask" class="list-wrap">
<div class="container_16" id="viewcont" style="display:none;">
<center><br>
           <table cellspacing="0px" cellpadding="0px" class="box">
             <thead>
             <tr><th colspan=5><img src="images/user.png" width="28" alt=""> ';
             if ($_SESSION['SESS_POWER'] != 1) {
                echo 'My Account';
              }
              else {
                echo 'User MODULE';
              }
              if($mode=='add'){ echo ' <img src="images/arrow-right.png" width="12" height="15" alt=""> Add New'; }
              elseif($mode=='modify'){ echo ' <img src="images/arrow-right.png" width="12" height="15" alt=""> Modify'; }
    if ($_SESSION['SESS_POWER'] == 1) {
      echo '<div style="float:right;">
        <center><a href="user.php" class="awesome icon blue"><img src="images/all.png" width="16" rel="tipsy" title="View All"></a><img src="images/sepa.png" width="11" height="17" alt=""><a href="user.php?mode=add" class="awesome icon green"><img src="images/add.png" width="16"  rel="tipsy" title="Add New"></a></center>
      </div>';
    }
    echo '</th></tr></thead>';
    if($mode=='add'){
        echo'<tr><td>
                <form enctype="multipart/form-data" method="POST" action="user_ep.php">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="hidden" name="act" value="insert">
                    <div style="width:290px;display:inline-block;">

                     <fieldset>
                        <legend>Login Information</legend>
                        <table class="box" style="width:100%;margin:0;">
                             <tr><td id=a>Position<br><div class="field">
                            <select name="post">';
                                for ($x = 1; $x < 3; $x++) {
                                  echo '<option value='.$x.' >'.level($x).'</option>';
                                }
                            echo '</select>
                            </div>
                            </td>
                        </tr>
                            <tr><td id=a>Username<br><input type="text" name="username" class="field2"></td></tr>
                            <tr><td id=a>Password<br><input type="password" name="pwd1" class="field2"></td></tr>
                            <tr><td id=a>Confirm Password<br><input type="password" name="pwd2" class="field2"></td></tr>
                        </table>
                     </fieldset>
                     </div>

                     </td></tr>
                    <tfoot><tr><td> <input class="awesome small green" type="submit" value="Insert" style="float:right;"></td></tr></tfoot></table></form>';
    }
    elseif($mode=='modify'){
      $query = "SELECT * FROM users WHERE id=".$rev."";
      $result = mysqli_query($con,$query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $id = $row['id'];

      $username = $row['username'];
      $post = $row['post'];
      $enable = $row['enable'];
      echo '<tr><td>
                <form enctype="multipart/form-data" method="POST" action="user_ep.php">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="hidden" name="act" value="update">
                     <div style="width:290px;display:inline-block;">

                     <fieldset>
                        <legend>Login Information</legend>
                        <table class="box" style="width:100%;margin:0px;">';
                              if ($_SESSION['SESS_POWER'] == 1) {
                                echo ' <tr><td id=a>Position<br><div class="field">
                                                    <select name="post">';
                                                    for ($x = 1; $x < 3; $x++) {
                                                      echo '<option value='.$x.' ';
                                                      if ($post == $x) {
                                                        echo 'selected';
                                                      }
                                                      echo '>'.level($x).'</option>';
                                                    }
                                                    echo '</select></div>
                                                    </td>
                                                </tr>';
                              }
                              else{echo'<input type="hidden" name="post" value="'.$post.'">';}
                              echo '<tr><td id=a>Username<br><input type="text" name="username" value="'.$username.'" class="field2" ';  if ($_SESSION['SESS_POWER'] != 1) { echo'readonly';}  echo'></td></tr>
                            <tr><td id=a>New Password<br><input type="password" name="pwd1" class="field2"></td></tr>
                            <tr><td id=a>Confirm New Password<br><input type="password" name="pwd2" class="field2"></td></tr>
                        </table>
                     </fieldset>
                     </div>
                    </td></tr>
                    <tfoot><tr><td> <input class="awesome small yellow" type="submit" value="Update" style="float:right;"></td></tr></tfoot></table></form>';
    }
    else{
    echo'<thead><tr><td id=a style="width:5px;">No.</td><td id=a>Username</td><td id=a>Position</td><td style="width:90px;" id=a><center>Status</center></td><td style="width:90px;" id=a><center>Action</center></td></tr></thead><tbody>';
        $x=1;
        $queryx = "SELECT * FROM users WHERE post=1";
        $resultx = mysqli_query($con,$queryx);
        $num_rows = mysqli_num_rows($resultx);

        $query = "SELECT * FROM users ORDER BY post ASC";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
           {
           $id = $row['id'];
           $username = $row['username'];
           $post = $row['post'];
           $enable = $row['enable'];
           //fetch position-----------------------------------------------------
           $position=level($post);
                    echo'<tr'; if($x%2){echo" class='odd'";} echo'>
                        <td><center>'.$x.'</center></td><td>'.$username.'</td>
                        <td>'.$position.'</td>
                        <td>
                            <form id="Toggle'.$id.'" style="display:inline-block;">';
                                 if($post!=1){
                                        echo'<div class="onoffswitch"  rel="tipsy" title="Toggle On/Off">
                                            <input type="checkbox" name="onoffswitch'.$id.'" ';
                                            if ($enable == 1) {
                                              echo 'checked ';
                                            }
                                            echo ' class="onoffswitch-checkbox" id="myonoffswitch'.$id.'" >
                                            <label class="onoffswitch-label" for="myonoffswitch'.$id.'" >
                                                <span class="onoffswitch-inner" onclick="Toggle('.$id.')">
                                                    <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                                                    <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                                                </span>
                                            </label>
                                        </div>';
                                 }
                        echo'</form></td>
                        <td><center>
                    <a href="user.php?mode=modify&ref='.$id.'" class="awesome icon magenta"><img src="images/edit.png" width="16" rel="tipsy" title="Modify"></a>';
                            if($post!=1||($post==1&&$num_rows>1)){
                    echo'<img src="images/sepa.png" width="11" height="17" alt="">
                    <a href="user_ep.php?id='.$id.'&act=delete" onclick="return confirm(\'Are you sure you want to Delete this User?\');"  class="awesome icon red"><img src="images/trash.png" width="16" rel="tipsy" title="Delete"></a>';
                            }
                        echo'</center></td></tr>';
                $x++;
           }
        }
        echo'</tbody>
          </table>
</div></div></div>';
}
include('footer.php');
?>
<script>
function Toggle(i) {
  new Ajax.Updater('resultTg'+i, 'toggle.php?act=users&ref='+i, { method: 'get',
    onLoading: function (oXHR) {
                        $('resultTg'+i).update('<div class="button"><img src="images/preloader.gif"></div>');
                    },
    parameters: $('Toggle'+i).serialize()} );
}
</script>