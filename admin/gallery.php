<?php
include ('header.php');
$_SESSION['P_ID']=$_GET['id'];
?>
<style>
/*.contain{
width:235px;height:175px; display: inline;float:left;margin:2px;
}*/
/* CSS3 STYLE GENERIC */
.contain {
   width: 235px;
   height: 175px;
   margin: 5px;
   float: left;
   border: 5px solid #fff;
   overflow: hidden;
   position: relative;
   text-align: center;
   box-shadow: 0px 0px 5px #aaa;
   cursor: default;
}
.contain .mask, .contain .content {
   width: 235px;
   height: 175px;
   position: absolute;
   overflow: hidden;
   top: 0;
   left: 0;
}
 .act{
     width: 235px;
     margin-left:-100px;
     margin-top:-23px;
 }

/* THIRD EFFECTS */

.third-effect .mask {
   opacity: 0;
   overflow:visible;
   border:100px solid rgba(0,0,0,0.7);
   -moz-box-sizing:border-box;
   -webkit-box-sizing:border-box;
   box-sizing:border-box;
   -webkit-transition: all 0.4s ease-in-out;
   -moz-transition: all 0.4s ease-in-out;
   -o-transition: all 0.4s ease-in-out;
   -ms-transition: all 0.4s ease-in-out;
   transition: all 0.4s ease-in-out;
}

.third-effect:hover .mask {
   opacity: 1;
   border:100px solid rgba(0,0,0,0.7);
}


.porto{
 margin:0px;  position:relative;
}
</style>
<script type="text/javascript">
var y = jQuery.noConflict();
y(document).ready(function(){
	y(function() {
		y("#gallery .cont").sortable({ handle: '.drag', cursor: "move", opacity: 0.6,  update: function() {
			var order = y(this).sortable("serialize") + '&action=sortPg&table=gallery';
			y.post("sorter.php", order);
		}
		});
        y("#filter ul").sortable({ handle: '.drag2', cursor: "move", items: "li:not(.ui-state-disabled)", width:'700px', opacity: 0.6,  update: function() {
			var order = y(this).sortable("serialize") + '&action=sortPg&table=filter';
			y.post("sorter.php", order, function() {
               y('#dynamic').load('menu.php');
            });
		}
		});
	});
});
</script>
    <?php
    if ($_SESSION['SESS_MEMBER_ID']==''){
     echo'<script>
    self.location="noty.php?mode=error";
    </script> ' ;
    }
    else {

    $query = "SELECT enable FROM module WHERE id = 4";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $enable=$row['enable'];

        if($_SESSION['SESS_POWER']!=1&&$enable==0){
            echo'<script>
                self.location="noty.php?mode=error";
            </script>' ;}

        include ('menu.php');
        echo '<div id="mask" class="list-wrap"><div  id="viewcont" style="display:none;"> <center><br>
  <div id="filter"><table cellspacing="0px" cellpadding="0px" style="margin:0;"><tr><td><ul class="dropdown"><li class="ui-state-disabled">FILTERS</li>';
        $y = 1;
        $query2 = "SELECT * FROM filter ORDER by arrange ASC";
        $result2 = mysqli_query($con,$query2);
        $maxmain2 = mysqli_num_rows($result2);
        while ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
            $id2 = $row2['id'];
            $name2 = $row2['name'];
            $enable2 = $row2['enable'];
            $file2 = 'gallery_e.php?ref='.$id2.'&mode=modfilter';
            echo '<li id="arrange_'.$id2.'" style="width:80px;padding:0;">
                <div style="height:38px;width:15px;float:left;margin:0px;margin-right:5px;">
                    <img src="images/drag.png" width=15px border=0 title="Drag to sort" class="drag2" rel="tipsy" style="cursor:move;">
                </div>
               <a href="'.$file2.'" style="';
            if ($enable2 == 0) {
                echo 'color:#ff7777;';
            }
            echo '" class="mini"><div style="height:38px;float:left;text-align:left;padding-left:5px;">
                        <center>'.$name2.'</center>
                 </div></a>
    </li>';
            $y++;
        }
        if ($_SESSION['SESS_POWER'] == 1) {
            echo '<li class="ui-state-disabled">
      <a href="gallery_e.php?mode=addfilter" class="mini awesome icon green" ><img src="images/add.png" width="15"  rel="tipsy" title="Add New Filter"></a>
      </li>';
        }
        echo '</ul></td>';
        echo '</tr></table></div><br>
           <table cellspacing="0px" cellpadding="0px" class="box" style="width:770px;">
             <thead><tr><th><img src="images/module.png" width="28" alt="">&nbsp;&nbsp;Gallery Module';
        if ($_SESSION['SESS_POWER'] == 1) {
            echo '<div style="float:right;">
        <center><a href="gallery.php" class="awesome icon blue"><img src="images/all.png" width="16" rel="tipsy" title="View All"></a>
        <img src="images/sepa.png" width="11" height="17" alt="">
        <a href="gallery_e.php?mode=add" class="med awesome icon green"><img src="images/add.png" width="16"  rel="tipsy" title="Add New"></a></center>
      </div>';
        }
        echo '</th></tr>
    </thead><tbody><tr><td style="padding:5px 0px !important;" id="gallery"><div class="cont">';
        $x = 1;
        $query = "SELECT * FROM gallery ORDER BY arrange ASC";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $id = $row['id'];
            $enable = $row['enable'];
            $type = $row['type'];
            $content = $row['content'];
            $title = $row['title'];
            $desc = $row['desc'];
            echo '<div class="contain third-effect ';
            if ($x % 2) {
                echo 'odd ';
            }
            echo '" id="arrange_'.$id.'">';
            if($type == 'image') {
                echo '<img src="'.$content.'" class="porto" width="235" height="175">';
            }
            else{
                echo '<img src="images/'.$type.'.gif" class="porto" width="235" height="175">';
            }
            echo '<div class="mask"><div class="act">
                <img src="images/drag.png" width=10 border=0 rel="tipsy" title="Drag to sort" class="drag" style="margin:0px 5px; ">
                    <form id="Toggle'.$id.'" style="display:inline-block;  padding:0;vertical-align:bottom;">
                         <div class="onoffswitch"  rel="tipsy" title="Toggle On/Off">
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
                        </div>
                    </form>
                    <img src="images/sepa.png" width="11" height="17" alt="" style="display:inline-block;">
                    <a href="gallery_e.php?mode=mod&ref='.$id.'" rel="tipsy" title="Modify Content" class="med">
                        <div class="awesome icon yellow" style="display:inline-block;"><img src="images/edit.png" width="16" ></div>
                    </a>';
            if ($_SESSION['SESS_POWER'] == 1) {
                echo '<img src="images/sepa.png" width="11" height="17" alt="" style="display:inline-block;">
                            <a href="gallery_ep.php?id='.$id.'&act=delete" onclick="return confirm(\'Are you sure you want to Delete this Content?\');" rel="tipsy" title="Delete Content">
                                <div class="awesome icon red" style=" display:inline-block;"><img src="images/trash.png" height="16" border="0"></div>
                            </a>';
            }
            echo '</div></div></div>';
            $x++;
        }
        echo '</div></td></tr>
        </tbody>
          </table>
</div></div></div>';
    }
    include ('footer.php');
    ?>
<script>
function Toggle(i) {
  new Ajax.Updater('resultTg'+i, 'toggle.php?act=gallery&ref='+i, { method: 'get',
    parameters: $('Toggle'+i).serialize()} );
}
</script>