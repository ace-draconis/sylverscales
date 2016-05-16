<style>
.bordered-box-content .icon span, .social-share a, blockquote span {
  background: url(images/icons-sprite.png) no-repeat;
}
/*----*****---- << Social Share >> ----*****----*/
.social-share {clear: both; margin: 0px; width: 100%;}
.social-share a {
  position: relative;
  z-index: 10;
  width: 29px;
  height: 29px;
  display: inline-block;
  *display: inline;
  zoom: 1;
  margin: 0px;
  -webkit-transition: all 200ms linear;
  -moz-transition: all 200ms linear;
  -o-transition: all 200ms linear;
  -ms-transition: all 300ms linear;
  transition: all 200ms linear;
}
.social-share a.facebook, .social-share.grey a.facebook:hover {
  background-position: -326px -419px;
}
.social-share a.facebook:hover, .social-share.grey a.facebook {
  background-position: -326px -379px;
}
.social-share a.youtube, .social-share.grey a.youtube:hover {
  background-position: -144px -419px;
}
.social-share a.youtube:hover, .social-share.grey a.youtube {
  background-position: -144px -379px;
}
.social-share a.google, .social-share.grey a.google:hover {
  background-position: -235px -419px;
}
.social-share a.google:hover, .social-share.grey a.google {
  background-position: -235px -379px;
}
.social-share a.twitter, .social-share.grey a.twitter:hover {
  background-position: -265px -419px;
}
.social-share a.twitter:hover, .social-share.grey a.twitter {
  background-position: -265px -379px;
}
.social-share a.rss, .social-share.grey a.rss:hover {
  background-position: -21px -419px;
}
.social-share a.rss:hover, .social-share.grey a.rss {
  background-position: -21px -379px;
}
.social-share a.twitter-bird, .social-share.grey a.twitter-bird:hover {
  background-position: -52px -419px;
}
.social-share a.twitter-bird:hover, .social-share.grey a.twitter-bird {
  background-position: -52px -379px;
}
.social-share a.dribble, .social-share.grey a.dribble:hover {
  background-position: -83px -419px;
}
.social-share a.dribble:hover, .social-share.grey a.dribble {
  background-position: -83px -379px;
}
.social-share a.digg, .social-share.grey a.digg:hover {
  background-position: -114px -419px;
}
.social-share a.digg:hover, .social-share.grey a.digg {
  background-position: -114px -379px;
}
.social-share a.vimeo, .social-share.grey a.vimeo:hover {
  background-position: -175px -419px;
}
.social-share a.vimeo:hover, .social-share.grey a.vimeo {
  background-position: -175px -379px;
}
.social-share a.deviantart, .social-share.grey a.deviantart:hover {
  background-position: -205px -419px;
}
.social-share a.deviantart:hover, .social-share.grey a.deviantart {
  background-position: -205px -379px;
}
.social-share a.picasa, .social-share.grey a.picasa:hover {
  background-position: -295px -419px;
}
.social-share a.picasa:hover, .social-share.grey a.picasa {
  background-position: -295px -379px;
}
.social-share a.skype, .social-share.grey a.skype:hover {
  background-position: -357px -419px;
}
.social-share a.skype:hover, .social-share.grey a.skype {
  background-position: -357px -379px;
}
</style>
<script type="text/javascript">
var z = jQuery.noConflict();
z(document).ready(function(){
	z(function() {
        z("#module tbody").sortable({ handle: '.drag2', cursor: "move", width:'700px', opacity: 0.6,  update: function() {
			var order = z(this).sortable("serialize") + '&action=sortPg&table=social';
			z.post("sorter.php", order, function() {

            });
		}
		});
	});
});
</script>
<script>
function Toggle(i) {
  new Ajax.Updater('resultTg'+i, 'toggle.php?act=social&ref='+i, { method: 'get',
    onLoading: function (oXHR) {
                        $('resultTg'+i).update('<div class="button"><img src="images/preloader.gif" alt=""></div>');
                    },
    parameters: $('Toggle'+i).serialize()} );
}
</script>
<?php
global $basedir;

$list = array("rss","twitter-bird","dribble","digg","youtube","vimeo","deviantart","google","twitter","picasa","facebook","skype");
$target = array("_self","_blank","_parent","_top");
if ($mode == 'add') {
    echo '<form enctype="multipart/form-data" method="POST" action="module/social/social_ep.php">
                    <input type="hidden" name="ref" value="'.$ref.'">
                    <input type="hidden" name="act" value="insert">
                            <tr><td id=a>social link Name<br> <div class="field"><select name="name">';
                                    for($i=0;$i<12;$i++){
                                        echo'<option value="'.$list[$i].'">'.$list[$i].'</option> ';
                                    }
                                echo'</select> </div></td>
                                <td id=a>Target<br>
                            <div class="field">
                            <select name="target">';
                                    for($j=0;$j<4;$j++){
                                        echo'<option value="'.$target[$j].'" >'.$target[$j].'</option>';
                                    }
                                echo'</select>
                           </div>
                           </td>
                                </tr>
                            <tr><td id=a colspan=2>URL<br><input type="text" name="url" size="50" value=" " class="field"/></td></tr>
                            <tr></tr>
                     <tfoot><tr><td colspan=2><input class="awesome small green" type="submit" value="Submit" style="float:right;width:60px;"></td></tr></tfoot>
                    </form>';
}
elseif ($mode == 'modify') {

      $query_1 = "SELECT * FROM social WHERE id=".$rev."";
      $result_1 = mysqli_query($con,$query_1);
      $row_1 = mysqli_fetch_array($result_1,MYSQLI_ASSOC);
      $id_1 = $row_1['id'];
      $name_1 = $row_1['name'];
      $url_1 = $row_1['url'];
      $target_1 = $row_1['target'];
      $enable_1 = $row_1['enable'];

    echo '<form enctype="multipart/form-data" method="POST" action="module/social/social_ep.php">
                    <input type="hidden" name="id" value="'.$id_1.'">
                    <input type="hidden" name="ref" value="'.$ref.'">
                    <input type="hidden" name="act" value="update">
                            <tr><td id=a>social link<br>
                               <div class="field"><select name="name">';
                                    for($i=0;$i<12;$i++){
                                      echo'<option value="'.$list[$i].'"';
                                       if ($name_1 == $list[$i]) {
                                        echo ' selected';
                                      }
                                      echo '>'.$list[$i].'</option>';
                                    }
                                echo'</select></div>
                            </td>
                            <td id=a>Target<br><div class="field"><select name="target">';
                                for($j=0;$j<4;$j++){
                                    echo'<option value="'.$target[$j].'"';
                                        if ($target_1 == $target[$j]) {
                                           echo ' selected';
                                        }
                                    echo '>'.$target[$j].'</option>';
                                }
                                echo'</select></div></td>
                            </tr>
                            <tr><td id=a colspan=2>URL<br><input type="text" name="url" size="50" value="'.$url_1.'" class="field"/></td></tr>

                   <tfoot> <tr><td colspan=2><input class="awesome yellow small" type="submit" value="update" style="float:right;"></td></tr> </tfoot>
                    </form>
            </table>';
    }
else{
echo'<thead><tr><td id=a style="width:0px;"></td><td id=a  colspan=2>Link Name</td><td id=a  style="width:90px;"><center>Status</center></td><td id=a  style="width:100px;"><center>Action</center></td></tr></thead>
             <tbody>';
        $x=1;
        $query_1 = "SELECT * FROM social ORDER BY arrange ASC";
        $result_1 = mysqli_query($con, $query_1);
        while($row_1 = mysqli_fetch_array($result_1, MYSQLI_ASSOC))
           {
           $id_1 = $row_1['id'];
           $name_1 = $row_1['name'];
           $url_1 = $row_1['url'];
           $target_1 = $row_1['target'];
           $enable_1 = $row_1['enable'];

           echo'<tr'; if($x%2){echo" class='odd'";} echo' id="arrange_'.$id_1.'">
                <td style="padding:0px;"><img src="images/drag.png" width=15px border=0 title="Drag to sort" class="drag2" rel="tipsy" style="cursor:move;vertical-align:top;"></td>
                <td style="width:20px;">
                 <div class="social-share" >
                	<a href="'.$url_1.'" target="_blank" class="'.$name_1.'"> </a>
                </div> </td><td style="text-transform:uppercase;">
                '.$name_1.'</td>
                <td><center><form id="Toggle'.$id_1.'" style="display:inline-block;">
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
                    </form></center>
                </td>
                <td><center>
                    <a href="mods.php?ref='.$ref.'&mode=modify&rev='.$id_1.'" class="awesome icon yellow"><img src="images/edit.png" width="16" rel="tipsy" title="Modify"></a>
                    <img src="images/sepa.png" width="11" height="17" alt="">
                    <a href="module/social/social_ep.php?ref='.$ref.'&id='.$id_1.'" onclick="return confirm(\'Are you sure you want to Delete this '.$name.'?\');"  class="awesome icon red"><img src="images/trash.png" width="16" rel="tipsy" title="Delete"></a>
                </center>
                </td></tr>';
           $x++;
           }
echo'</tbody>';
}

?>