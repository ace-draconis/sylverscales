<?php
include('header.php');
$_SESSION['P_ID']=$_GET['id'];
if ($_SESSION['SESS_MEMBER_ID']==''){
     echo'<script>
    self.location="noty.php?mode=error";
    </script> ' ;
    }
else{
include('menu.php');
?>
     <script type="text/javascript" src="../js/gmap3.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <style>
    #map{
        margin: 20px auto;
        border: 5px solid #333;
        width: 100%;
        height: 250px;
      }
    .gm-style .gm-style-iw{
      color:black;
      font-weight: bold;
    }
    </style>
<script charset="utf-8" src="editor/kindeditor-all.js"></script>
<script charset="utf-8" src="editor/lang/en.js"></script>
<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('#content', {
				cssPath : '../css/style.php',
				uploadJson : 'editor/php/upload_json.php',
				fileManagerJson : 'editor/php/file_manager_json.php',
				allowFileManager : true,
                urlType : 'absolute'
			});

		});
	</script>


<?php
echo'<div id="mask" class="list-wrap">
<br><center><form enctype="multipart/form-data" action="page_ep.php" method="POST">
<table cellspacing="0px" cellpadding="0px" class="box" id="viewcont" style="display:none;">
<tr><th colspan=3><img src="images/pages.png" width="28" alt=""> Page Editor <img src="images/arrow-right.png" width="12" height="15" alt="">';
if($_SESSION['P_ID']=='contact'){
echo' Contact Us</th></tr>';

 $query = "SELECT * FROM contact WHERE id=1";
 $result = mysqli_query($con, $query);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $email=$row['email'];
        $address=$row['address'];
        $label=$row['label'];
        $enable=$row['enable'];
        $content=$row['content'];


    echo'
    <script>
    var gmap = jQuery.noConflict();
    gmap(function()
    	{
    		var address = "'.$address.'";
    		gmap("#map").gmap3(
    			{map:
    				{
    				address: address,
    				options: {
    					zoom: 17,
    					opts: {
    						scrollwheel: true
    						}
    					}
    				},
    			infowindow: {
    				address: address,
    				options: {
    					size: new google.maps.Size(50, 50),
    					content: "'.$label.'"
    					},
    				events: {
    					closeclick: function(infowindow) {
    							alert("closing : " + s(this).attr("id") + " : " + infowindow.getContent());
    						}
    					}
    				}
    			}
    		);
    	}
    );
    </script>';

        echo'<input type="hidden" name="act" value="contact">
        <tr>
            <td id="a">
               Your Email<br><input type="text" name="email" size="60" value="'.$email.'" class="field"><br />
                <a style="text-transform:none;">Add more than one email by separating them with " <b style="font-size:20px;">,</b> " (comma).</a>
            </td>
            <td id="a">Address<br><input type="text" name="address" size="60" value="'.$address.'" class="field"><br />
                <a style="text-transform:none;">Address for google map location.</a></td>
                <td id="a">Tag Label<br><input type="text" name="label" size="40" value="'.$label.'" class="field"><br />
                <a style="text-transform:none;">Label for google map tag location.</a></td>
        </tr>
        <tr>
            <td id="a" colspan=3>
                Page Content<br>
                <center><textarea name="content" id="content" style="width:1000px;height:400px;visibility:hidden;">'.$content.'</textarea></center>
            </td>
        </tr>';
}
else{
            $query = "SELECT * FROM general WHERE id='".$ref."'";
    		$result = mysqli_query($con,$query);
            $maxgen = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $id=$row['id'];
            $enable=$row['enable'];
            $urlable=$row['urlable'];
            $url=$row['url'];
            $target=$row['target'];
            $title=$row['title'];
            $content=$row['content'];
echo' '.$title.'';
if($_SESSION['SESS_POWER']==1){
echo'<div style="float:right;">
   <center>
         <div id="resultTog" rel="tipsy" title="Toggle between PAGE / URL" style="display:inline-block;"><center>';
        if($urlable==0){
              echo'<a href="toggle.php?act=url&ref='.$id.'"><div class="awesome small green">PAGE</div></a>';
         }
         else{
              echo'<a href="toggle.php?act=url&ref='.$id.'"><div class="awesome small yellow">URL</div></a>';
         }
         echo'</center></div>
    <img src="images/sepa.png" width="11" height="17" style="display:inline-block; " >

          <div class="onoffswitch" style="display:inline-block;vertical-align:bottom; ">
    <input type="checkbox" name="onoffswitch" ';
    if ($enable == 1) {
      echo 'checked ';
    }
    echo ' class="onoffswitch-checkbox" id="myonoffswitch" >
    <label class="onoffswitch-label" for="myonoffswitch" >
        <span class="onoffswitch-inner" onclick="Publish('.$id.')">
            <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
            <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
        </span>
    </label>
</div>';
}
echo'</th></tr>';
    if($urlable==1)
        {
            echo'<tr><td id="a" >
                <input type="hidden" name="act" value="url"/>
                <input type="hidden" name="id" value="'.$id.'">
                URL Name <a>(Maximum 15 characters)</a><br><input type="text" name="title" maxlength="15" size="20" value="'.$title.'" class="field2"/></td>
                <td id="a">Target<br>
                <div class="field">
                <select name="target">
                    <option value="_self" '; if($target=='_self'){echo' selected';} echo'>_self</option>
                    <option value="_blank" '; if($target=='_blank'){echo' selected';} echo'>_blank</option>
                    <option value="_parent" '; if($target=='_parent'){echo' selected';} echo'>_parent</option>
                    <option value="_top" '; if($target=='_top'){echo' selected';} echo'>_top</option>
                </select>
                </div>
                </td>
                </tr>
                <tr><td id="a" colspan=2 style="width:400px;">URL<br><input type="text" name="url"  size="60" value="'.$url.'" class="field"/></td></tr>';
        }
    else
        {
            echo'<tr><td id="a">
                <input type="hidden" name="act" value="update"/>
                <input type="hidden" name="id" value="'.$id.'">
                Page Name <a>(Maximum 15 characters)</a><br><input type="text" name="title" maxlength="15" size="20" value="'.$title.'" class="field2"/></td></tr>
                <tr><td id="a">
                Page Content<br>
                <center><textarea id="content" name="content" style="width:1000px;height:400px;">'.$content.'</textarea></center></td></tr>';
        }
}
    echo'<tfoot><tr><td colspan="3"><input type="submit" class="awesome yellow small" value="Update" style="float:right;"></td></tr></tfoot></table></form></center></div></div></div>';
include('footer.php');
}
?>
<script>
function Publish(i) {
  new Ajax.Updater('resultPb'+i, 'toggle.php?act=publish&ref='+i, { method: 'get',

    onSuccess: function (oXHR) {
                        new Ajax.Updater('dynamic', 'menu.php', 'html');
                    }} );
}
function Toggle(j) {
  new Ajax.Updater('resultTog'+j, 'toggle.php?act=url&ref='+j, { method: 'get',
  onLoading: function (oXHR) {
                        $('resultTog'+j).update('<div class="button"  ><img src="images/preloader.gif"></div>');
                    },
  onSuccess: function (oXHR) {
                        new Ajax.Updater('dynamic', 'menu.php');
                        new Ajax.Updater('wrapper', 'pwrap.php');
                    },
  parameters: $('Toggle'+j).serialize()} );
  $('Toggle'+j).reset();
}
</script>