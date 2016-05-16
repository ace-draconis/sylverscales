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

	</script>


<?php
if ($mode == 'add')  {
    echo'<form enctype="multipartdata" action="module/event/event_ep.php" method="POST" >
                <input type="hidden" name="ref" value="'.$ref.'">
                <input type="hidden" name="act" value="insert"/>
                    <tr><td id="a" colspan=2>
                        <input type="text" id="url" name="npicture" value="" readonly="readonly" class="field2"/> <input type="button" id="image" value="Select" class="awesome green small"/>
                    </td></tr>
                    <tr><td id="a">
                        TITLE<br><input type="text" name="nsubject" value="" class="field"/>
                    </td><td id="a">
                        DATE<br><input type="date" name="ndate" value="" class="field" style="width:150px;"/>
                    </td> </tr>
                    <tr><td id="a" colspan=2>
                        CONTENT<br>
                        <textarea name="ncontent" class="textarea-field" style="width:500px;height:150px;"/></textarea>
                    </td> </tr>
                    <tfoot><tr><td colspan=2><input class="awesome green small" type="submit" value="Submit" style="float:right;"></td></tr></tfoot>
            </form>';
}
elseif($mode == 'modify'){
    $query_1 = "SELECT * FROM event WHERE nid=".$rev."";
    $result_1 = mysqli_query($con, $query_1);
    $row1 = mysqli_fetch_array($result_1, MYSQLI_ASSOC);
        $nid = $row1['nid'];
     $nsubject = $row1['nsubject'];
   $ncontent = $row1['ncontent'];
    $npicture = $row1['npicture'];

     $date = date_create($row1['ndate']);
    $date = date_format($date,"Y-m-d");

            echo'<form enctype="multipartdata" action="module/event/event_ep.php" method="POST" >
                <input type="hidden" name="ref" value="'.$ref.'">
                <input type="hidden" name="nid" value="'.$nid.'"/>
                <input type="hidden" name="act" value="update"/>
                    <tr><td id="a" colspan=2>
                        <img src="'.$npicture.'" style="max-height:100px;border:0px;margin:10px 0px;"><br />
                        <input type="text" id="url" name="npicture" value="'.$npicture.'" readonly="readonly" class="field2"/> <input type="button" id="image" value="Select" class="awesome green small"/>
                    </td></tr>
                    <tr><td id="a">
                        TITLE<br><input type="text" name="nsubject" value="'.$nsubject.'" class="field"/>
                    </td><td id="a">
                        DATE<br><input type="date" name="ndate" value="'.$date.'" class="field" style="width:150px;"/>
                    </td> </tr>
                    <tr><td id="a" colspan=2>
                        CONTENT<br>
                        <textarea name="ncontent" class="textarea-field" style="width:500px;height:150px;"/>'.$ncontent.'</textarea>
                    </td> </tr>
                    <tfoot><tr><td colspan=2><input class="awesome yellow small" type="submit" value="Update" style="float:right;"></td></tr></tfoot>
            </form>';
}
else {
    echo '<thead><tr> <td id=a>News/Events</td> <td id=a  style="width:100px !important;"><center>Action</center></td></tr></thead>
             <tbody>';
             function displaySubStringWithStrip($string, $length=NULL)
          {
              if ($length == NULL)
                {$length = 50; }

              $stringDisplay = substr(strip_tags($string), 0, $length);
              if (strlen(strip_tags($string)) > $length)
              $stringDisplay .= ' ...';
              return $stringDisplay;
          }
    $x = 1;
   $query_1 = "SELECT * FROM event ORDER BY ndate DESC";
    $result_1 = mysqli_query($con, $query_1);
    while ($row1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC)) {
    $nid = $row1['nid'];
     $nsubject = $row1['nsubject'];
   $ncontent = $row1['ncontent'];
    $npicture = $row1['npicture'];
    $short=displaySubStringWithStrip($ncontent, $length=100);
    $date = date_create($row1['ndate']);
    $date = date_format($date,"d M Y");
      echo '<tr';
      if ($x % 2) {
        echo " class='odd'";
      }
      echo '>
      <td style="vertical-align:top;"><b>'.$date.' - '.$nsubject.'</b><br>'.$short.'</td>
      <td>
      <center><a href="mods.php?ref='.$ref.'&mode=modify&rev='.$nid.'" rel="tipsy" title="Modify event">
      <div class="awesome icon yellow" style="display:inline-block;"><img src="images/edit.png" width="16" ></div></a>';
      if ($_SESSION['SESS_POWER'] == 1) {
        echo ' <img src="images/sepa.png" width="11" height="17" alt="" style="display:inline-block;">
                            <a href="module/event/event_ep.php?ref='.$ref.'&id='.$nid.'" onclick="return confirm(\'Are you sure you want to Delete this event?\');" rel="tipsy" title="Delete event">
                                <div class="awesome icon red" style=" display:inline-block;"><img src="images/trash.png" height="16" border="0"></div>
                            </a>';
      }
      echo '
     </center> </td></tr>';
      $x++;
    }
    echo'</tbody>';
}
?>