<?php
$filename = 'admin/db/connect.php';
if (file_exists($filename)) {
require("admin/db/connect.php");
}
else{
echo'<script>self.location="admin/install.php";</script>' ;
}

if(isset($_GET['id'])) {$ref=$_GET['id'];}
else{$ref=1;}
if(isset($_GET['mode'])) {$mode=$_GET['mode'];$ref=0;}
else{$mode='';}
?>
<!DOCTYPE html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->
<head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <meta name="robots" content="index, follow" />
<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<?php
$query = "SELECT * FROM setting WHERE id='1'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$logo=$row['logo'];
$company=$row['company'];
$domain=$row['domain'];
$title=$row['title'];
$keyword=$row['keyword'];
$description=$row['description'];

echo'
<meta name="description" content="'.$description.'" />
<meta name="keywords" content="'.$keyword.'" />
<title>'.$title.'</title>';

    $queryx = "SELECT * FROM theme WHERE enable=1";
    $resultx = mysqli_query($con,$queryx);
    $rowx = mysqli_fetch_array($resultx, MYSQLI_ASSOC);

    $theme=$rowx['theme'];
    $vary=$rowx['vary'];
    $mode=$rowx['mode'];

?>
   <link rel="stylesheet" type="text/css" href="css/content.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css"/>

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/flowtype.js"></script>
    <script type="text/javascript" src="js/jquery.mobilemenu.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
 <script>
 var mobile = jQuery.noConflict();
 mobile(document).ready(function()
  {
   mobile('#main-nav ul.menu').mobileMenu({
    defaultText: 'Navigate to...',
    className: 'mobile-menu',
    subMenuDash: '&ndash;'
   });  }
);
 </script>

     <script>
     var flow = jQuery.noConflict();
     flow(document).ready(function()
     	{
     		flow('.element h4').flowtype(
     			{
     			minimum: 230,
     			maximum: 330,
     			minFont: 16,
     			maxFont: 40,
     			fontRatio: 80
     			}
     		);
     	}
     );
     function hideAddressBar()
     {
     	if(!window.location.hash)
     	{
     		if(document.height <= window.outerHeight + 10)
     		{
     			document.body.style.height = (window.outerHeight + 50) +'px';
     			setTimeout(function() {window.scrollTo(0, 1);}, 50);
     		}
     		else
     		{
     			setTimeout(function() {window.scrollTo(0, 1);}, 0);
     		}
     	}
     }
     window.addEventListener("load", hideAddressBar);
     window.addEventListener("orientationchange", hideAddressBar);
     </script>

<?php
    $queryy = "SELECT * FROM contact WHERE id=1";
    $resulty = mysqli_query($con,$queryy);
    $rowy = mysqli_fetch_array($resulty, MYSQLI_ASSOC);

    $address=$rowy['address'];
    $label=$rowy['label'];
include('plugins.php');
include('theme/'.$theme.'/body.php');
?>
     <!-- Gallery Filter Layout Start-->
    <script>
      var tog = jQuery.noConflict();
      tog(document).ready(function()
      	{
      		tog("#four").hide();
      	}
      );
      tog("#three").click(function()
      	{
      		tog(".element").switchClass("span4", "span3", 1500, "swing");
      		tog("#three").hide();
      		tog("#four").show();
      	}
      );
      tog("#four").click(function()
      	{
      		tog(".element").switchClass("span3", "span4", 1500, "easeInOutQuad");
      		tog("#four").hide();
      		tog("#three").show();
      	}
      );
</script>
<!-- Gallery Filter Layout Ends-->