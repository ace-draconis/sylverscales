<?php
include ('header.php');
$mode = $_GET['mode'];
$rev = $_GET['ref'];
?>
<script type="text/javascript">
var z = jQuery.noConflict();
z(document).ready(function(){
	z(function() {
        z("#module tbody").sortable({ handle: '.drag2', cursor: "move", width:'700px', opacity: 0.6,  update: function() {
			var order = z(this).sortable("serialize") + '&action=sortPg&table=module';
			z.post("sorter.php", order, function() {
              z('#dynamic').load('menu.php');
            });
		}
		});
	});
});
</script>
<?php
if ($_SESSION['SESS_POWER'] != 1) {
   echo'<script>
    self.location="noty.php?mode=error";
    </script>' ;
}
else {
    include ('menu.php');
    echo '<div id="mask" class="list-wrap"><div class="container_16" id="viewcont" style="display:none;"> <center><br>
           <table cellspacing="0px" cellpadding="0px" class="box" id="module" >
             <thead>
             <tr><th colspan=5><img src="images/module.png" width="28" alt=""> Modules Manager';
    if ($mode == 'add') {
        echo ' <img src="images/arrow-right.png" width="12" height="15" alt=""> Add New';
    }
    elseif ($mode == 'modify') {
        echo ' <img src="images/arrow-right.png" width="12" height="15" alt=""> Modify';
    }
    if ($_SESSION['SESS_POWER'] == 1) {
        echo '<div style="float:right;">
        <center><a href="module.php" class="awesome icon blue"><img src="images/all.png" width="16" rel="tipsy" title="View All"></a><img src="images/sepa.png" width="11" height="17" alt=""><a href="module.php?mode=add" class="awesome icon green"><img src="images/add.png" width="16"  rel="tipsy" title="Add New"></a></center>
      </div>';
    }
    echo '</th></tr></thead>';
    if ($mode == 'add') {
        echo '<form enctype="multipart/form-data" method="POST" action="module_ep.php">
                    <input type="hidden" name="id" value=" ">
                    <input type="hidden" name="act" value="insert">
                            <tr><td id=a>Module Name<br><input type="text" name="name" class="field2"></td></tr>
                            <tr><td id=a colspan=2>URL<br><input type="text" name="url" size="50" value="" class="field"/></td></tr>
                     <tfoot><tr><td colspan=2><input class="awesome small green" type="submit" value="Insert" style="float:right;"></td></tr></tfoot>
                    </form>';
    }
    elseif ($mode == 'modify') {
        $query = "SELECT * FROM module WHERE id=".$rev."";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id = $row['id'];
        $name = $row['name'];
        $url = $row['url'];
        $enable = $row['enable'];

        echo '<form enctype="multipart/form-data" method="POST" action="module_ep.php">
                    <input type="hidden" name="id" value="'.$id.'">
                    <input type="hidden" name="act" value="update">
                            <tr><td id=a>Module Name<br><input type="text" name="name" value="'.$name.'" class="field2"></td></tr>
                            <tr><td id=a colspan=2>URL<br><input type="text" name="url" size="50" value="'.$url.'" class="field"/></td></tr>
                   <tfoot> <tr><td colspan=2><input class="awesome small yellow" type="submit" value="Update" style="float:right;"></td></tr> </tfoot>
                    </form>';
    }
    else {
        echo '<thead><tr><td id=a style="width:0px;"></td><td id=a style="width:5px;">No.</td><td id=a >Module Name</td><td id=a style="width:90px;"><center>Status</center></td><td id=a style="width:100px;"><center>Action</center></td></tr></thead><tbody>';
        $x = 1;
        $query = "SELECT * FROM module ORDER BY arrange ASC";
        $result = mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $url = $row['url'];
            $target = $row['target'];
            $enable = $row['enable'];
            echo '<tr';
            if ($x % 2) {
                echo " class='odd'";
            }
            echo ' id="arrange_'.$id.'">
            <td style="padding:0px;"><img src="images/drag.png" width=15px border=0 title="Drag to sort" class="drag2" rel="tipsy" style="cursor:move;vertical-align:top;"></td>
            <td><center>'.$x.'</center></td>
                <td>'.$name.'</td>
                <td><center><form id="Toggle'.$id.'" style="display:inline-block;">
                         <div class="onoffswitch">
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
                                    </form></center>
                                </td>
                                <td>
                                <center>
                    <a href="module.php?mode=modify&ref='.$id.'" class="awesome icon yellow"><img src="images/edit.png" width="16" rel="tipsy" title="Modify"></a>
                    <img src="images/sepa.png" width="11" height="17" alt="">
                    <a href="module_ep.php?id='.$id.'&act=delete" onclick="return confirm(\'Are you sure you want to Delete this Module?\');"  class="awesome icon red"><img src="images/trash.png" width="16" rel="tipsy" title="Delete"></a>
                </center>
                </td></tr>';
            $x++;
        }
    }
    echo '</tbody>
          </table>
</div></div></div>';
}
include ('footer.php');
?>
<script>
function Toggle(i) {
  new Ajax.Updater('resultTg'+i, 'toggle.php?act=module&ref='+i, { method: 'get',
  onSuccess: function (html) {
                        new Ajax.Updater('dynamic', 'menu.php', 'html');
                    },
    parameters: $('Toggle'+i).serialize()} );
}
</script>