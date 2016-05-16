<link rel="stylesheet" href="editor/themes/default/default.css" />
		<script src="editor/kindeditor-all.js"></script>
		<script src="editor/lang/en.js"></script>
        <script src="editor/plugins/image/image.js"></script>
<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
				K('#image').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#url').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
		</script>
<script type="text/javascript">
var y = jQuery.noConflict();
y(document).ready(function(){
	y(function() {
		y("#module tbody").sortable({ handle: '.drag', cursor: "move", opacity: 0.6,  update: function() {
			var order = y(this).sortable("serialize") + '&action=sortPg&table=banner';
			y.post("sorter.php", order);
		}
		});
	});
});
</script>
<script>
function Toggle(i) {
  new Ajax.Updater('resultTg'+i, 'toggle.php?act=banner&ref='+i, { method: 'get',
    parameters: $('Toggle'+i).serialize()} );
}
</script>

<?php
if ($mode == 'add')  {
    echo'<form enctype="multipartdata" action="module/banner/banner_ep.php" method="POST" >
    <input type="hidden" name="ref" value="'.$ref.'">
    <input type="hidden" name="act" value="insert"/>
        <tr><td id="a" colspan=2>Image Size (900 x 350)<br />
            <input type="text" id="url" name="banner" value="" readonly="readonly" class="field2"/>
            <input type="button" id="image" value="Select" class="awesome green small" />
        </td></tr>
        <tr><td id="a">
            Caption<br><input type="text" name="caps" size="50" value="" class="field"/>
        </td> </tr>
        <tfoot><tr><td colspan=2><input class="awesome green small" type="submit" value="Submit" style="float:right;"></td></tr></tfoot>
    </form>';
}
elseif($mode == 'modify'){
    $query_1 = "SELECT * FROM banner WHERE id=".$rev."";
    $result_1 = mysqli_query($con, $query_1);
    $row_1 = mysqli_fetch_array($result_1, MYSQLI_ASSOC);
        $id_1=$row_1['id'];
        $banner_1=$row_1['banner'];
        $caps_1=$row_1['caps'];
        $target_1=$row_1['target'];
            echo'<form enctype="multipartdata" action="module/banner/banner_ep.php" method="POST" >
                <input type="hidden" name="ref" value="'.$ref.'">
                <input type="hidden" name="id" value="'.$id_1.'"/>
                <input type="hidden" name="act" value="update"/>
                    <tr><td id="a" colspan=2><b>Banner '.$id_1.' :</b> Image Size (900 x 350)<br />
                        <img src="'.$banner_1.'" style="max-width:900px;border:0px;margin:10px 0px;"><br />
                        <input type="text" id="url" name="banner" value="'.$banner_1.'" readonly="readonly" class="field2"/> <input type="button" id="image" value="Select" class="awesome green small"/>
                    </td></tr>
                    <tr><td id="a">
                        Caption<br><input type="text" name="caps" size="50" value="'.$caps_1.'" class="field"/>
                    </td> </tr>
                    <tfoot><tr><td colspan=2><input class="awesome yellow small" type="submit" value="Update" style="float:right;"></td></tr></tfoot>
            </form>';
}
else {
    echo '<tbody>';
    $x = 1;
    $query_1 = "SELECT * FROM banner ORDER BY arrange ASC";
    $result_1 = mysqli_query($con,$query_1);
    while ($row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC)) {
      $id_1 = $row_1['id'];
      $banner_1 = $row_1['banner'];
      $caps_1 = $row_1['caps'];
      $enable_1 = $row_1['enable'];
      echo '<tr';
      if ($x % 2) {
        echo " class='odd'";
      }
      echo ' id="arrange_'.$id_1.'"><td>
                <img src="images/drag.png" width=10 border=0 rel="tipsy" title="Drag to sort" class="drag" style="margin:5px 5px;">
                <div style="float:right; position:relative;z-index:2;margin-right:10px;margin-top:5px;">
                    <form id="Toggle'.$id_1.'" style="display:inline-block;  padding:0;vertical-align:bottom;">
                         <div class="onoffswitch"  rel="tipsy" title="Toggle On/Off">
                            <input type="checkbox" name="onoffswitch'.$id_1.'" ';
                            if ($enable_1 == 1) {
                              echo 'checked ';
                            }
                            echo ' class="onoffswitch-checkbox" id="myonoffswitch'.$id_1.'" >
                            <label class="onoffswitch-label" for="myonoffswitch'.$id_1.'" >
                                <span class="onoffswitch-inner" onclick="Toggle('.$id_1.')">
                                    <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                                    <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                                </span>
                            </label>
                        </div>
                    </form>
                    <img src="images/sepa.png" width="11" height="17" alt="" style="display:inline-block;">
                    <a href="mods.php?ref='.$ref.'&mode=modify&rev='.$id_1.'" rel="tipsy" title="Modify Banner">
                        <div class="awesome icon yellow" style="display:inline-block;"><img src="images/edit.png" width="16" ></div>
                    </a>';
      if ($_SESSION['SESS_POWER'] == 1) {
        echo '<img src="images/sepa.png" width="11" height="17" alt="" style="display:inline-block;">
                            <a href="module/banner/banner_ep.php?ref='.$ref.'&id='.$id_1.'" onclick="return confirm(\'Are you sure you want to Delete this Banner?\');" rel="tipsy" title="Delete Banner">
                                <div class="awesome icon red" style=" display:inline-block;"><img src="images/trash.png" height="16" border="0"></div>
                            </a>';
      }
      echo '</div>
        <center><img src="'.$banner_1.'" style="width:600px;border:0px;margin-top:-45px;position:relative;z-index:1;padding:5px 0px">
      </td></tr>';
      $x++;
    }
    echo'</tbody>';
}
?>