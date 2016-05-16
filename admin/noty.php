<?php
include ('header.php');
$mod = $_GET['mode'];
echo '<div id="mask" class="list-wrap"><div class="container_16" id="viewcont" style="display:none;">   <center><br>
<div class="noty"><center><img src="images/success.png" height="110px"><br><h5 id="note">';
if ($mod == 'insert'||$mod == 'success'||$mod == 'delete'||$mod == 'notify') {
    if ($mod == 'success') {
        echo 'Successfully updated!';
    }
    elseif ($mod == 'insert') {
        echo 'Successfully inserted!';
    }
    elseif ($mod == 'delete') {
        echo 'Successfully deleted!';
    }
    elseif ($mod == 'notify') {
        $err = $_SESSION['ERROR'];
         foreach($err as $msg)
        {
    	    echo'+ '.$msg.'<br>';
        }
        unset($_SESSION['ERROR']);

    }
echo '</h5><a rel="tipsy" title="Return to previous page" class="awesome yellow small" href="#" onClick="history.go(-2)">Back</a></center>';
}
elseif ($mod == 'logfail'||$mod == 'error'||$mod == 'logout') {
    if ($mod == 'logfail') {
        echo 'WRONG USERNAME / PASSWORD';
    }
    elseif ($mod == 'logout') {
        echo 'You have been logged out.';
    }
    elseif ($mod == 'error') {
        echo 'Not an authorized user!';
    }
    echo '</h5> <a rel="tipsy" title=" Return to main page" class="awesome yellow small" href="index.php">Main page</a></center>';
}

echo '</div></div></div>';
include ("footer.php");
?>
<script type="text/javascript">
var i = jQuery.noConflict();
 i(document).ready(function () {
        i("#cls").click(function () {
            self.parent.location.reload()
        });
 });
setTimeout(function() {
  window.history.back();
}, 5000);
</script>