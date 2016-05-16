<?php
if($mode == 'add') {
  echo'<form enctype="multipart/form-data" method="POST" action="module/theme/theme_ep.php">
                    <input type="hidden" name="act" value="insert">
                    <input type="hidden" name="ref" value="'.$ref.'">
                           <tr><td id="a">Name<br><input type="text" name="name" class="field2" /></td></tr>
                           <tr><td id="a">Theme (.zip)<br><input type="file" name="uploadedfile" /></td></tr>
                   <tfoot>  <tr><td colspan=2><input class="awesome small green" type="submit" value="Upload" style="float:right;"></td></tr> </tfoot>
                    </form>';
}
else {
  $x = 1;
  $query_1 = "SELECT * FROM theme ORDER BY id ASC";
  $result_1 = mysqli_query($con,$query_1);
  $count_1 = mysqli_num_rows($result_1);
  while ($row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC)) {
    $id_1 = $row_1['id'];
    $name_1 = $row_1['name'];
    $theme_1 = $row_1['theme'];
    $vary_1 = $row_1['vary'];
    $mode_1 = $row_1['mode'];
    $enable_1 = $row_1['enable'];
    $myFile = "../theme/".$theme_1."/info.txt";
    $fh = fopen($myFile,'r');
    $info = fread($fh,200);
    fclose($fh);
    echo '<tr';
    if ($x % 2) {
      echo " class='odd'";
    }
    echo'><td>';
    if($count_1>1){
          if ($enable_1 == 0) {
            echo'<a href="module/theme/theme_ep.php?ref='.$ref.'&act=enable&id='.$id_1.'" style="display:inline-block;" rel="tipsy" title="Toggle Theme On/Off"><div class="awesome small red">OFF</div></a>';
          }
          else {
            echo '<div class="awesome small green">ON</div>';
          }
          if ($enable_1 == 0) {
            echo'<img src="images/sepa.png" width="11" height="17" alt="" style="display:inline-block;">
            <a href="module/theme/theme_ep.php?ref='.$ref.'&act=delete&id='.$id_1.'" onclick="return confirm(\'Are you sure you want to Delete this '.$name.'?\');"  class="awesome icon red">
            <img src="images/trash.png" width="16" rel="tipsy" title="Delete">
            </a>';
          }
    }
    echo'<span rel="tipsy" title="<pre>'.$info.'</pre>" style="float:right;">'.$name_1.'</span><br>
    <img src="../theme/'.$theme_1.'/'.$vary_1.'.png" width="460px" border="0" style="margin:10px 0px;">';
    if ($enable_1 == 1) {
    include ('../theme/'.$theme_1.'/var.php');
    }
    echo '</td></tr>';
    $x++;
  }
}
?>