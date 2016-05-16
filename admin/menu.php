<script type='text/javascript'>
var l = jQuery.noConflict();
 l(function() {
   l('[rel=tipsy]').tipsy({fade: true, gravity: 's'});
 });
</script>

<script type="text/javascript">
var x = jQuery.noConflict();
x(document).ready(function(){
	x(function() {
		x("#contentLeft ul").sortable({ handle: '.handle', cursor: "move", items: "li:not(.ui-state-disabled)", opacity: 0.6,  update: function() {
			var order = x(this).sortable("serialize") + '&action=sortPg&table=menu';
			x.post("sorter.php", order, function() {
               z('#cont').load('cont.php');
            });
		}
		});
	});
});
</script>
<?php
include ('db/connect.php');
$ref=$_SESSION['P_ID'];

echo'<div class="container_16"><div id="dynamic"><div class="grid_16" id="contentLeft"> ';
if($_SESSION['SESS_MEMBER_ID'] != NULL) {
echo'<ul id="nav" class="dropdown dropdown-horizontal">
<li class="ui-state-disabled '; if($ref=='index'){echo' active';} echo'" style="width:40px !important;"><a href="index.php"><div style="height:38px;float:left;text-align:left;padding-left:5px;color:black !important;">
                        <center><img src="images/dash.png" width="32" rel="tipsy" title="Dashboard"></center>
                 </div></a></li>';

            $query1 = "SELECT * FROM menu ORDER by arrange ASC";
    		$result1 = mysqli_query($con, $query1);
            while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
 		    {
 		        $id1=$row1['id'];
                $mode1=$row1['mode'];
                $ref1=$row1['ref'];

                if($mode1=='page'){
                    $query2 = "SELECT * FROM general WHERE id='".$ref1."'";
            		$result2 = mysqli_query($con, $query2);
                    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
         		        $id2=$row2['id'];
                        $title2=$row2['title'];
                        $enable2=$row2['enable'];
                        $urlable2=$row2['urlable'];

                        $file2='page.php?id='.$id2.'';
                }
                elseif($mode1=='module'){
                    $query2 = "SELECT * FROM module WHERE id='".$ref1."'";
            		$result2 = mysqli_query($con, $query2);
                    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
         		        $id2='mod'.$row2['id'];
                        $title2=$row2['name'];
                        $enable2=$row2['enable'];
                        $file2=$row2['url'].'?id='.$id2;
                }
                if($_SESSION['SESS_POWER']!=1 && $enable2==0)
                    {

                    }
                else{
                echo'<li id="arrange_'.$id1.'" '; if($ref==$id2){echo' class="active"';} echo'>';
                    if($_SESSION['SESS_POWER']==1){
                        echo'<div style="height:38px;width:15px;float:left;margin-right:-9px;">
                            <img src="images/drag.png" width=15px border=0 rel="tipsy" title="Drag to sort" class="handle" style="position:relative;margin-left:-8px;cursor:move;vertical-align:top;">
                        </div>';
                    }
                 echo'<a href="'.$file2.'" style="'; if($enable2==0){echo'color:#ff7777;';}echo'">
                 <div style="height:38px;float:left;text-align:left;padding-left:5px;min-width:70px;">
                 '.$title2.'<div style="height:38px; float:right;margin-right:-9px;margin-left:5px;">';
                 if($mode1=='page'){
                        if($urlable2==1){
                            echo'<div id="circle" rel="tipsy" title="URL" style="background:#ff9900;"></div>';
                         }
                         else{
                            echo'<div id="circle" rel="tipsy" title="PAGE" style="background:#99cc00;"></div>';
                         }
                 }
                 else{
                     echo'<div id="circle" rel="tipsy" title="MODULE" style="background:#00aeef;"></div>';
                 }

                 echo'</div></div></a></li>';
                 }
            }
            echo'<li class="ui-state-disabled '; if($ref=='contact'){echo' active';} echo'"><a href="page.php?id=contact"><div style="height:38px;float:left;text-align:left;padding-left:5px;">
                        <center>Contact Us</center>
                 </div></a></li>
</ul>
<ul id="nav" class="dropdown dropdown-horizontal" style="float:right;">
<li><img src="images/module.png" width="32px" alt="">  Modules
    <ul>';
        $query4 = "SELECT * FROM module WHERE enable=1 AND id NOT LIKE '%4%' ORDER by arrange ASC";
    	$result4 = mysqli_query($con,$query4);
        $maxmain4 = mysqli_num_rows($result4);
        while($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC))
 		    {
                $id4=$row4['id'];
                $name4=$row4['name'];
 		    		echo'<li><a href="mods.php?ref='.$id4.'"><div style="height:38px;text-align:left;width:100%;">'.$name4.'</div></a></li>';
            }
echo'</ul>
</li>
</ul>';}
echo'</div></div></div>';
?>