<!--
The MIT License (MIT)

Copyright (c) 2013, Sylver Web Enterprise

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->
<!DOCTYPE html>
<html>
<head>
    <title>Sylver Scales CMS</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/dropdown.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/tipsy.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="css/colorbox.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" media="screen" />
     <link rel="stylesheet" type="text/css" href="css/buttons.css" media="screen" />
<!-- [if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css"/><![endif]-->

<!--    <script type="text/javascript" src="js/jquery-1.9.1.js"></script> -->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/jquery.tipsy.js"></script>
    <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script>
var j = jQuery.noConflict();
j(document).ready(function()
     {
          //Examples of how to assign the ColorBox event to elements
          j(".popup").colorbox({rel: 'group1'});
    	  j(".youtube").colorbox({iframe: true, innerWidth: 640, innerHeight: 390});
          j(".mini").colorbox(
               {
               rel: "nofollow", iframe: true, width: "450", height: "300", scrolling: false, onOpen: function() {
                         j("body").css("overflow", "hidden");
                    }, onClosed: function() {
                         j("body").css("overflow", "auto");
                    }
               }
          );
          j(".med").colorbox(
               {
               rel: "nofollow", iframe: true, width: "450", height: "600", scrolling: false, onOpen: function() {
                         j("body").css("overflow", "hidden");
                    }, onClosed: function() {
                         j("body").css("overflow", "auto");
                    }
               }
          );
     }
);

</script>
<script>
        var k = jQuery.noConflict();
        k(function() {
            k('[rel=tipsy]').tipsy({trigger: 'focus' });
        });
        window.onload = function() {
              k("#loading-image").delay(200).fadeOut("normal", function() {
              k("#viewcont").fadeIn("normal");
            });
        };
    </script>
    <style>
#loading-image {
width:220px;
position:absolute;
top:50%;
margin-top:-90px;
left:50%;
margin-left:-120px;
z-index:999;
}
.awesome {
       width:70px;
}
#mask{
      position:absolute;
    bottom:0;
    top:0;
    left:0;
    right:0;
    margin-top:102px;
    margin-bottom:36px;
    margin-right:0px;
    margin-left:0px;
    padding-top:30px;
    overflow-y: scroll;
    z-index:2;
}
</style>
</head>