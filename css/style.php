<?php
include("../admin/db/connect.php");
include("bootstrap.min.css");
include("content.css");

    $query_x = "SELECT theme FROM theme WHERE enable='1'";
    $result_x = mysqli_query($con,$query_x);
    while($row_x = mysqli_fetch_array($result_x, MYSQLI_ASSOC))
    {
        $theme_x=$row_x['theme'];
    }
include("../theme/".$theme_x."/style.css");
include("../theme/".$theme_x."/css/portfolio.css");
include("../theme/".$theme_x."/skin.css");    
?>
