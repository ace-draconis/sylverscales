<?php
echo'
<form enctype="multipart/form-data" action="module/theme/theme_ep.php" method="POST" >
<input type="hidden" name="id" value="'.$id.'">
<input type="hidden" name="ref" value="'.$ref.'">
<input type="hidden" name="act" value="update">
<div class="field" id="a" style="display:inline-block;">
COLOR<br>
<select name="vary">
                 <option value="dark"'; if($vary=='dark'){echo' selected';} echo'>Dark</option>
                 <option value="light"'; if($vary=='light'){echo' selected';} echo'>Light</option>
</select>
</div>
<img src="images/sepa.png" width="11" height="17" alt="">
<div class="field" id="a" style="display:inline-block;">
MODE<br>
<select name="mode">
                 <option value="single"'; if($mode=='single'){echo' selected';} echo'>Single-Page</option>
                 <option value="horizontal"'; if($mode=='horizontal'){echo' selected';} echo'>Horizontal Slide</option>
                 <option value="vertical"'; if($mode=='vertical'){echo' selected';} echo'>Vertical Slide</option>
                 <option value="fade"'; if($mode=='fade'){echo' selected';} echo'>Fade In/Out</option>
</select>
</div>
<input class="awesome small yellow" type="submit" value="Change" style="display:inline-block;">
</form>
';
?>