<?php
$filename = 'db/connect.php';
if (file_exists($filename)) {
include ('header.php');
if (!empty ($_SESSION['SESS_MEMBER_ID'])) {
    $_SESSION['P_ID'] = "index";
include ('menu.php');
echo '<div id="mask" class="list-wrap">
<div class="container_16" id="viewcont" style="display:none;">';
?>

<script type="text/javascript">
var z = jQuery.noConflict();
z(document).ready(function()
	{
		z(function()
			{
				z("#pages tbody").sortable(
					{handle: '.drag1', cursor: "move", width: '700px', opacity: 0.6, update: function()
						{
							var order = z(this).sortable("serialize") + '&action=sortPg&table=menu';
							z.post("sorter.php", order, function()
								{
									z('#dynamic').load('menu.php');
								}
							);
						}
					}
				);
				z("#module tbody").sortable(
					{handle: '.drag2', cursor: "move", width: '700px', opacity: 0.6, update: function()
						{
							var order = z(this).sortable("serialize") + '&action=sortPg&table=module';
							z.post("sorter.php", order, function()
								{
									z('#dynamic').load('menu.php');
								}
							);
						}
					}
				);
			}
		);
	}
);
</script>
      <?php
      echo '<center><br><table cellspacing="0px" cellpadding="5px" class="box" id="pages" style="width:500px;">
            <thead><tr>
                <th colspan=7>PAGES & URLS</th>
            </tr>
            <tr>';
                if($_SESSION['SESS_POWER']==1){ echo'<td id=a style="width:1px;"></td>';}
                echo'<td id=a style="width:10px;"><center>No.</center></td>
                <td id=a>Name</td>';
                if($_SESSION['SESS_POWER']==1){
                    echo'<td id=a style="width:80px;"><center>TYPE</center></td>
                    <td id=a style="width:80px;"><center>STATUS</center></td>';
                }
                echo'<td id=a style="width:80px;"><center>ACTION</center></td>
            </tr></thead>';
            $x = 1;
            $count = 1;
            $query0 = "SELECT * FROM menu ORDER by arrange ASC";
            $result0 = mysqli_query($con,$query0);
            $maxmain0 = mysqli_num_rows($result0);
            while ($row0 = mysqli_fetch_array($result0,MYSQLI_ASSOC)) {
                $id0 = $row0['id'];
                $mode0 = $row0['mode'];
                $ref0 = $row0['ref'];

                if ($mode0 == 'page') {
                    $query1 = "SELECT * FROM general WHERE id='".$ref0."'";
                    $result1 = mysqli_query($con,$query1);
                    $maxmain1 = mysqli_num_rows($result1);
                    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                    $id1 = $row1['id'];
                    $title1 = $row1['title'];
                    $enable1 = $row1['enable'];
                    $urlable1 = $row1['urlable'];

                    echo '<tr';
                    if ($x % 2) {
                        echo " class='odd'";
                    }
                    echo ' id="arrange_'.$id0.'">';
                    if($_SESSION['SESS_POWER']==1){ echo'<td style="padding:0px"><img src="images/drag.png" width=15px border=0 title="Drag to sort" class="drag1" rel="tipsy" style="cursor:move;vertical-align:top;"></td>';}
                    echo'<td style="padding:5px;"><img src="images/0'.$count.'.png" width="30" alt=""></td>
                      <td>'.$title1.'</td>';
                      if($_SESSION['SESS_POWER']==1){
                      echo'<td>
                          <center><form id="Toggles'.$id1.'" style="display:inline-block;vertical-align: middle !important;">
                          <div class="pageswitch">
                              <input type="checkbox" name="pageswitch'.$id1.'" ';
                                        if ($urlable1 == 0) {
                                            echo 'checked ';
                                        }
                                        echo ' class="pageswitch-checkbox" id="mypageswitch'.$id1.'" >
                              <label class="pageswitch-label" for="mypageswitch'.$id1.'" >
                                  <span class="pageswitch-inner" onclick="Toggles('.$id1.')">
                                      <span class="pageswitch-active"><span class="pageswitch-switch">PAGE</span></span>
                                      <span class="pageswitch-inactive"><span class="pageswitch-switch">URL</span></span>
                                  </span>
                              </label>
                          </div></form></center>
                      </td>
                      <td>
                            <center><form id="Publish'.$id1.'" style="display:inline-block;vertical-align: middle !important;">
                            <div class="onoffswitch">
                              <input type="checkbox" name="onoffswitch'.$id1.'" ';
                                        if ($enable1 == 1) {
                                            echo 'checked ';
                                        }
                                        echo ' class="onoffswitch-checkbox" id="myonoffswitch'.$id1.'" >
                              <label class="onoffswitch-label" for="myonoffswitch'.$id1.'" >
                                  <span class="onoffswitch-inner" onclick="Publish('.$id1.')">
                                      <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                                      <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                                  </span>
                              </label>
                          </div></form></center>
                        </td>';
                       }
                        echo'<td><center><a href="page.php?id='.$id1.'" rel="tipsy" title="Modify Page / URL">
                              <div class="awesome small yellow" style="display:inline-block;">Modify</div>
                          </a></center></td>
                      </tr>';
                    $count++;
                    $x++;
                }
                elseif ($mode0 == 'module') {
                    $query1 = "SELECT * FROM module WHERE id='".$ref0."'";
                    $result1 = mysqli_query($con,$query1);
                    $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                    $id1 = $row1['id'];
                    $title1 = $row1['name'];
                    $enable1 = $row1['enable'];
                    $url1 = $row1['url'];

                    if($_SESSION['SESS_POWER']!=1 && $enable1==0)
                    {

                    }
                    else{
                    echo '<tr';
                    if ($x % 2) {
                        echo " class='odd'";
                    }
                    echo '  id="arrange_'.$id0.'">';
                    if($_SESSION['SESS_POWER']==1){ echo'<td style="padding:0px"><img src="images/drag.png" width=15px border=0 title="Drag to sort" class="drag1" rel="tipsy" style="cursor:move;vertical-align:top;"></td>'; }

                    echo'<td style="padding:5px;"><img src="images/module.png" width="30" alt=""></td>
                      <td>'.$title1.'</td>';
                      if($_SESSION['SESS_POWER']==1){ echo'
                      <td>
                          <center><div class="awesome small blue">MODULE</div></center>
                      </td>
                      <td>
                            <center><form id="Toggle'.$id1.'" style="display:inline-block;vertical-align: middle !important;">
                            <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" ';
                                      if ($enable1 == 1) {
                                          echo 'checked ';
                                      }
                                      echo ' class="onoffswitch-checkbox" id="myonoffswitch" >
                            <label class="onoffswitch-label" for="myonoffswitch" >
                                <span class="onoffswitch-inner" onclick="Toggle('.$id1.')">
                                    <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                                    <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                                </span>
                            </label>
                        </div></form></center>
                      </td>';
                      }
                      echo'<td><center><a href="'.$url1.'" rel="tipsy" title="Modify Module">
                            <div class="awesome small yellow" style="display:inline-block;">Modify</div>
                        </a></center></td>
                    </tr>';
                    $x++;
                    }
          }


      }
      echo '</table>';
      if ($_SESSION['SESS_POWER']==1){
      echo'<table cellspacing="0px" cellpadding="5px" class="box" id="module" style="width:500px;">
      <thead><tr>
        <th colspan=7>MODULES</th>
      </tr>
      <tr>
        <td id=a style="width:5px;"></td>
        <td id=a style="width:10px;"></td>
        <td id=a>Name</td><td id=a style="width:80px;"><center>STATUS</center></td>
        <td id=a style="width:80px;"><center>ACTION</center></td>
      </tr></thead>';
      $y = 1;
      $query2 = "SELECT * FROM module WHERE id NOT LIKE '%4%' ORDER by arrange ASC";
      $result2 = mysqli_query($con,$query2);
      $maxmain2 = mysqli_num_rows($result2);
      while ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
          $id2 = $row2['id'];
          $name2 = $row2['name'];
          $enable2 = $row2['enable'];
          $url2 = $row2['url'];
          echo '<tr';
          if ($y % 2) {
              echo " class='odd'";
          }
          echo '  id="arrange_'.$id2.'">
                <td style="padding:0px;"><img src="images/drag.png" width=15px border=0 title="Drag to sort" class="drag2" rel="tipsy" style="cursor:move;vertical-align:top;"></td>
                <td style="padding:5px;"><img src="images/module.png" width="30px" alt=""></td>
                <td>'.$name2.'</td>
                <td>
                      <center><form id="Toggle'.$id2.'" style="display:inline-block;">
                        <div class="onoffswitch">
                          <input type="checkbox" name="onoffswitch'.$id2.'" ';
                                if ($enable2 == 1) {
                                    echo 'checked ';
                                }
                                echo ' class="onoffswitch-checkbox" id="modswitch'.$id2.'" >
                          <label class="onoffswitch-label" for="modswitch'.$id2.'" >
                              <span class="onoffswitch-inner" onclick="Toggle('.$id2.')">
                                  <span class="onoffswitch-active"><span class="onoffswitch-switch">ON</span></span>
                                  <span class="onoffswitch-inactive"><span class="onoffswitch-switch">OFF</span></span>
                              </span>
                          </label>
                      </div></form></center>
                  </td>
                  <td><center><a href="mods.php?ref='.$id2.'" rel="tipsy" title="Modify Module">
                        <div class="awesome small yellow" style="display:inline-block;">Modify</div>
                    </a></center></td>
                </tr>';
          $y++;
      }
      echo'</table>';
      }

      echo'<table cellspacing="0px" cellpadding="5px" class="box"  style="width:500px;">
      <tr>
        <th colspan=2>Shortcut Menu</th>
      </tr>
          <tr>
            <td width="128"><div align="right">E-Mail Login&nbsp;:</div></td>
            <td ><div align="left"><strong><a href="'.$domain.'/webmail" target="_blank" class="mystyle2">CLICK HERE</a></strong></div></td>
          </tr>
          <tr>
            <td><div align="right">cPanel :</div></td>
            <td><div align="left"><strong><a href="'.$domain.'/cpanel" target="_blank" class="mystyle2">CLICK HERE</a></strong></div></td>
          </tr>
          <tr>
            <td><div align="right">Backup Database :</div></td>
            <td><div align="left"><strong><a href="'.$domain.':2082/frontend/x3/backup/index.html" target="_blank" class="mystyle2">CLICK HERE</a></strong></div></td>
          </tr>
      </table></center></div></div></div>';
  }
  else {
        $error = $_SESSION['ERROR'];
      echo '<form id="viewcont" style="display:none;" name="loginForm" method="post" action="login-exec.php">
              <div class="noty" style="width:245px;">
              <h4>Login Panel</h4><br>
            <p>Username <span style="float:right;color:red;">'.$error[0].'</span>
                <input name="username" type="text" class="field2" id="username" style="background:white;"/>
                </p>
              <p>Password  <span style="float:right;color:red;">'.$error[1].'</span>
                <input name="password" type="password" class="field2" id="password" style="background:white;"/>
                 </p>
                  <input type="submit" name="Submit" value="Login" class="awesome green small" style="float:right;"/>
            </div> </form>';
       unset($_SESSION['ERROR']);
  }

  include ('footer.php');
  ?>
<script>
function Publish(i) {
	new Ajax.Updater('resultPb'+i, 'toggle.php?act=publish&ref='+i,
		{method: 'get',
		onSuccess: function (html) {
				new Ajax.Updater('dynamic', 'menu.php', 'html');
			},
		parameters: $('Publish'+i).serialize()}
	);
}
function Toggles(j) {
	new Ajax.Updater('resultTogs'+j, 'toggle.php?act=urlable&ref='+j,
		{method: 'get',
		onSuccess: function (html) {
				new Ajax.Updater('dynamic', 'menu.php', 'html');
			},
		parameters: $('Toggles'+j).serialize()}
	);
}
function Toggle(k) {
	new Ajax.Updater('resultTog'+k, 'toggle.php?act=module&ref='+k,
		{method: 'get',
		onSuccess: function (html) {
				new Ajax.Updater('dynamic', 'menu.php', 'html');
			},
		parameters: $('Toggle'+k).serialize()}
	);
}
</script>
<?php
} else {
    echo'<script>self.location="install.php";</script>' ;
}
?>