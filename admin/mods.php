<?php
include('header.php');
include('menu.php');

if ($_SESSION['SESS_MEMBER_ID']==''){
    echo'<script>self.location="noty.php?mode=error";</script>' ;
}
else{
$ref=$_GET['ref'];
$mode=$_GET['mode'];
$rev = $_GET['rev'];

    $query = "SELECT * FROM module WHERE id ='".$ref."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $name=$row['name'];
        $url=$row['url'];
        $enable=$row['enable'];

        if($_SESSION['SESS_POWER']!=1&&$enable==0){
            echo'<script>
                self.location="noty.php?mode=error";
            </script>' ;}

echo '<div id="mask" class="list-wrap">
<div  id="viewcont" style="display:none;">
<br>
<center><table cellspacing="0px" cellpadding="0px" class="box" id="module" style="min-width:360px;max-width:960px;">
<thead><tr>
  <th colspan=6><img src="images/module.png" width="28" alt=""> '.$name.' ';
  if($mode=='add'){echo'<img src="images/arrow-right.png" width="12" height="15" alt=""> Add new';}
  elseif($mode=='modify'){echo'<img src="images/arrow-right.png" width="12" height="15" alt=""> Modify';}
if ($_SESSION['SESS_POWER']==1){
echo'
<div style="float:right;">
   <center><a href="mods.php?ref='.$ref.'" class="awesome icon blue"><img src="images/all.png" width="16" rel="tipsy" title="View All"></a>
   <img src="images/sepa.png" width="11" height="17" alt="">
   <a href="mods.php?ref='.$ref.'&mode=add" class="awesome icon green"><img src="images/add.png" width="16"  rel="tipsy" title="Add New"></a></center>
</div>';
}
echo'</th></tr></thead>';
include($url);
echo'</table></center>
</div></div></div>';
}
include('footer.php');
?>
