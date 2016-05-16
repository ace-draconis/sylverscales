<?php
include('head.php');
?>
<style>
body{
  background: url(images/subtle_dots.png);
  width: auto;
  height:auto;
  padding: 0;
  margin: 0;
}

.awesome{
  width:80px !important;
}
</style>

<?php
$mod=$_GET['mode'];

echo '<div class="noty"><center><img src="images/success.png" height="110px"><br><h5 id="note">';
if ($mod == 'insert'||$mod == 'success'||$mod == 'delete') {
    if ($mod == 'success') {
        echo 'Successfully updated!';
    }
    elseif ($mod == 'insert') {
        echo 'Successfully inserted!';
    }
    elseif ($mod == 'delete') {
        echo 'Successfully deleted!';
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
        echo 'You are not an authorized user!';
    }
    echo '</h5> <a rel="tipsy" title=" Return to main page" class="awesome yellow small" href="index.php">Main page</a></center>';
}
echo '</div></div></div>';
?>
<script type="text/javascript">
var i = jQuery.noConflict();
 i(document).ready(function () {
        i("#cls").click(function () {
            self.parent.location.reload()
        });
 });
 setTimeout(function() {
  self.parent.location.reload()
}, 1000);
</script>