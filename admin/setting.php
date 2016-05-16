<?php
include('header.php');
if ($_SESSION['SESS_MEMBER_ID']==''){
     echo'<script>
    self.location="noty.php?mode=error";
    </script> ' ;
    }
else{
?>
<link rel="stylesheet" href="editor/themes/default/default.css" />
<script charset="utf-8" src="editor/kindeditor-all.js"></script>
<script charset="utf-8" src="editor/lang/en.js"></script>
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
<?php

include('menu.php');

echo'
<div id="mask" class="list-wrap">
<div class="container_16" id="viewcont" style="display:none;"><br>
<center><table cellspacing="0px" cellpadding="5px" class="box" >
<tr>
  <th colspan=2><img src="images/layout.png" width="28"> Settings</th>
</tr>';

 $query = "SELECT * FROM setting WHERE id=1";
 $result = mysqli_query($con, $query);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $company=$row['company'];
        $domain=$row['domain'];
        $logo=$row['logo'];
        $title=$row['title'];
        $description=$row['description'];
        $keyword=$row['keyword'];
        echo'
        <form enctype="multipart/form-data" action="setting_ep.php" method="POST">
        <tr><td id="a">Company Name<br><input type="text" class="field" name="company" size="64" value="'.$company.'"></td></tr>
        <tr><td id="a">Domain<br><input type="text" name="domain" class="field"  size="64" value="'.$domain.'"></td></tr>
        <tr><td id="a">Logo<br><input type="text" id="url" name="logo" value="'.$logo.'" readonly="readonly" class="field2"/> <input type="button" id="image" value="Select" class="awesome green small"></td></tr>
        <tr><td id="a">Title<br><input type="text" name="title" class="field" size="64" value="'.$title.'"></td></tr>
        <tr><td id="a">Description<br><textarea name="description" class="textarea-field" id="description" style="width:330px;">'.$description.'</textarea></td></tr>
        <tr><td id="a">Keyword<br><textarea name="keyword" class="textarea-field" id="keyword" style="width:330px;">'.$keyword.'</textarea></td></tr>
        <tfoot><tr><td colspan=2><input type="submit" class="awesome yellow small" value="Update" style="float:right;"></td></tr></tfoot></form>
        </table></center></div></div></div>';
include('footer.php');
}
?>