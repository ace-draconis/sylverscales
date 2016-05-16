<?php
include('db/config.php');

$mode=$_GET['mode'];
$ref=$_GET['ref'];
?>
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css"   />
<link rel="stylesheet" type="text/css" href="css/buttons.css"  />
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" href="editor/themes/default/default.css" />
<style>
body{
  background: url(images/subtle_dots.png);
  margin:0;
  padding:15px 10px;
}
.awesome{
  width:80px;
}
.opt {
   display:none;
}
</style>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script src="editor/kindeditor-all.js"></script>
<script src="editor/plugins/insertfile/insertfile.js"></script>
<script src="editor/plugins/image/image.js"></script>
<script src="editor/plugins/link/link.js"></script>
<script src="editor/lang/en.js"></script>
<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true,
                    extraParams:true
				});
				K('#image').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#url1').val(),
							clickFn : function(url) {
								K('#url1').val(url);
								editor.hideDialog();
							}
						});
					});
				});
                K('#media').click(function() {
					editor.loadPlugin('insertfile', function() {
						editor.plugin.fileDialog({
							fileUrl : K('#url2').val(),
                            viewType : 'VIEW',
						    dirName : 'media',
							clickFn : function(url) {
								K('#url2').val(url);
								editor.hideDialog();
							}
						});
					});
				});
                K('#youtube').click(function() {
					editor.loadPlugin('link', function() {
						editor.plugin.link.edit({
							fileUrl : K('#url3').val(),
							click : function(url) {
								K('#url3').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
		</script>

<?php


if ($_SESSION['SESS_MEMBER_ID']==''){ header( 'refresh: 0; url=noty.php?mode=error');}
else{
echo'<div class="title"><h4 >GALLERY MODULE</h4></div>';
if($mode=="addfilter"){
  echo'<table cellspacing="0px" cellpadding="0px" class="box" style="margin-bottom:0px;margin-top:31px !important;width:100%;">
        <form enctype="multipart/form-data" method="POST" action="gallery_ep.php">
            <input type="hidden" name="act" value="addfilter">
           <tr><th colspan=2>Filter <img src="images/arrow-right.png" width="12" height="15" alt=""> ADD NEW</th></tr>
            <tr><td id="a">FILTER<br><input type="text" class="field" name="filter" ></td></tr>
            <tfoot><tr><td colspan=2>
                <input type="submit" class="awesome small green" value="Insert" style="float:right;"></td></tr></tfoot>
        </form>
    </table>';}
elseif($mode=='modfilter'){
  $query = "SELECT * FROM filter WHERE id=".$ref."";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

       $id = $row['id'];
       $filter= $row['name'];
       $enable= $row['enable'];

            echo'<table cellspacing="0px" cellpadding="0px" class="box" style="margin-top:30px !important;width:100%;" id="view">
                    <form enctype="multipart/form-data" method="POST" action="gallery_ep.php">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="last" value="'.$filter.'">
                        <input type="hidden" name="act" value="modfilter">
                       <tbody>
                       <tr><th colspan=3>MODIFY FILTER </th></tr>
                        <tr><td id="a">FILTER<br><input type="text" name="filter" style="width:100%;" class="field" value="'.$filter.'"></td>
                         <td id="a" style="width:40px;">ENABLE<br>

                            <div class="onoffswitch" style="display:inline-block;vertical-align:bottom; ">
                                <input type="checkbox" name="enable" value="1"';
                                if ($enable == 1) {
                                  echo 'checked ';
                                }
                                echo ' class="onoffswitch-checkbox" id="myonoffswitch" >
                                <label class="onoffswitch-label" for="myonoffswitch" >
                                    <span class="onoffswitch-inner" >
                                        <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                                        <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                                    </span>
                                </label>
                            </div>
                            </td>
                            <td id="a" style="width:5px;">';
                            if ($_SESSION['SESS_POWER'] == 1) {
                            echo '<br><a href="gallery_ep.php?id='.$id.'&act=delfilter" onclick="return confirm(\'Are you sure you want to Delete this Filter?\');" rel="tipsy" title="Delete Filter">
                                <div class="awesome icon red" style=" display:inline-block;"><img src="images/trash.png" height="16" border="0"></div>
                            </a>';}
                            echo'</td>
                        </tr>
                        </tbody>
                        <tfoot><tr><td colspan=3>
                            <input type="submit" class="awesome small yellow" value="Update" style="float:right;"></td>
                        </tr></tfoot>
                    </form>
                </table>';
}
elseif($mode=="add"){
echo'
<form enctype="multipart/form-data" action="gallery_ep.php" method="POST" >
    <input type="hidden" name="act" value="insert"/>
    <table cellspacing="0px" cellpadding="0px" class="box" style="margin-bottom:0px;margin-top:31px !important;width:100%;">
        <tr><th colspan=2>Content <img src="images/arrow-right.png" width="12" height="15" alt=""> Add New</th></tr>
        <tr><td id="a">FILTER<br>
        <div class="field">
            <select name="filter" style="min-width:120px;">';
                $query = "SELECT * FROM filter WHERE enable=1 ORDER by arrange ASC";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                   {
                        $filter= $row['name'];
                        echo'<option value="'.$filter.'">'.$filter.'</option>';
                   }

            echo'</select>
        </div>
        </td>
        <td id="a">FORMAT<br>
            <div class="field">
                <select name="type" style="min-width:120px;" id="type">
                    <option class="image" value="image">Image</option>
                    <option class="media" value="video">Video</option>
                    <option class="youtube" value="youtube">YouTube</option>
                    <option class="youtube" value="vimeo">Vimeo</option>
                    <option class="media" value="audio">Audio</option>
                    <option class="media" value="flash">Flash</option>
                </select>
            </div>
        </td>
        </tr>
        <tr><td id="a" colspan=2>FILE/URL<br />
        <div class="isimage"><input type="text" id="url1" name="image" value="" class="field2" style="width:270px;"/>
            <input type="button" id="image" value="Select" class="awesome green small" style="margin-bottom:5px;" /></div>
        <div class="opt ismedia"><input type="text" id="url2" name="media" value="" class="field2" style="width:270px;"/>
            <input type="button" id="media" value="Select" class="awesome green small" style="margin-bottom:5px;" /></div>
        <div class="opt isyoutube"><input type="text" id="url3" name="youtube" value=""  class="field2" style="width:270px;"/>
            <input type="button" id="youtube" value="Select" class="awesome green small" style="margin-bottom:5px;" /></div>
        </td></tr>
        <tr><td id="a" colspan=2>
            Title<br><input type="text" name="title" value="" class="field" style="width:100%;"/>
        </td> </tr>
        <tr><td id="a" colspan=2>
            Description<br><textarea name="descr" class="textarea-field" style="width:100%;"/></textarea>
        </td> </tr>
        <tfoot><tr><td colspan=2><input class="awesome green small" type="submit" value="Submit" style="float:right;"></td></tr></tfoot>
    </table>
</form>';

}
else{
$query = "SELECT * FROM gallery WHERE id=".$ref."";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
   {
     $id = $row['id'];
     $enable = $row['enable'];
     $filter = $row['filter'];
     $type = $row['type'];
     $content = $row['content'];
     $title = $row['title'];
     $descr = $row['descr'];
        echo'<form enctype="multipart/form-data" action="gallery_ep.php" method="POST" >
            <input type="hidden" name="id" value="'.$id.'"/>
            <input type="hidden" name="act" value="update"/>
            <table cellspacing="0px" cellpadding="0px" class="box" style="margin-bottom:0px;margin-top:31px !important;width:100%;">
                <tr><th colspan=2>Content <img src="images/arrow-right.png" width="12" height="15" alt=""> Modify</th></tr>
                 <tr><td id="a">FILTER<br>
        <div class="field">
            <select name="filter" style="min-width:120px;">';
                $query1 = "SELECT * FROM filter WHERE enable=1 ORDER by arrange ASC";
                $result1 = mysqli_query($con, $query1);
                while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
                   {
                        $filter1= $row1['name'];
                        echo'<option value="'.$filter1.'"'; if($filter==$filter1){echo' selected';} echo'>'.$filter1.'</option>';
                   }

            echo'</select>
        </div>
        </td>
        <td id="a">FORMAT<br>
            <div class="field">
                <select name="type" style="min-width:120px;" id="type">
                    <option class="image" value="image"'; if($type=="image"){echo' selected';} echo'>Image</option>
                    <option class="media" value="video"'; if($type=="video"){echo' selected';} echo'>Video</option>
                    <option class="youtube" value="youtube"'; if($type=="youtube"){echo' selected';} echo'>YouTube</option>
                    <option class="youtube" value="vimeo"'; if($type=="vimeo"){echo' selected';} echo'>Vimeo</option>
                    <option class="media" value="audio"'; if($type=="audio"){echo' selected';} echo'>Audio</option>
                    <option class="media" value="flash"'; if($type=="flash"){echo' selected';} echo'>Flash</option>
                </select>
            </div>
        </td>
        </tr>
                <tr><td id="a" colspan=2>FILE/URL<br />
        <div class="opt isimage"><input type="text" name="image" value="'.$content.'" class="field2" style="width:270px;" id="url1"/>
            <input type="button" id="image" value="Select" class="awesome green small" style="margin-bottom:5px;" /></div>
        <div class="opt ismedia"><input type="text" name="media" value="'.$content.'" class="field2" style="width:270px;" id="url2"/>
            <input type="button" id="media" value="Select" class="awesome green small" style="margin-bottom:5px;" /></div>
        <div class="opt isyoutube"><input type="text" name="youtube" value="'.$content.'" class="field2" style="width:270px;" id="url3"/>
            <input type="button" id="youtube" value="Select" class="awesome green small" style="margin-bottom:5px;" /></div>
        </td></tr>
                  <tr><td id="a" colspan=2>
            Title<br><input type="text" name="title" size="50" value="'.$title.'" class="field" style="width:100%;"/>
        </td> </tr>
        <tr><td id="a" colspan=2>
            Description<br><textarea name="descr" size="50" class="textarea-field" style="width:100%;"/>'.$descr.'</textarea>
        </td> </tr>
                <tfoot><tr><td colspan=2><input class="awesome green small" type="submit" value="Submit" style="float:right;"></td></tr></tfoot>
        </table></form>';
		}
    }
}
echo'<br><br></div></div>';

?>
<script>
$(document).ready(function()
    	{
          var value = $("#type option:selected").attr('class');
    var theDiv = $(".is" + value);
    theDiv.removeClass('opt');
    	} );
</script>
<script type="text/javascript">

$("#type").change(function(){

    var value = $("#type option:selected").attr('class');
    var theDiv = $(".is" + value);
    theDiv.removeClass('opt');
    theDiv.slideDown().removeClass("opt");
    theDiv.siblings('[class*=is]').slideUp(function() { $(this).addClass("opt"); });
});
</script>