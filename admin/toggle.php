<?php
 require("db/config.php");
    $act=$_GET['act'];
    $ref=$_GET['ref'];
    if($act=='publish')
    {
            $query = "SELECT * FROM general WHERE id='".$ref."'";
      		$result = mysqli_query($con, $query);
     		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
     		{
         		$enable=$row['enable'];
                if ($enable==0){ $enable=1; }
                else { $enable=0; }
                sleep(1);
                $query="UPDATE general SET enable='".$enable."' WHERE id='".$ref."'";
        		mysqli_query($con, $query);

                if($enable==0){
                    echo'<input type="button" onclick="Publish('.$ref.')" value="Offline" class="bt_0" alt="Offline" title="Offline">';
                }
                else{
                    echo'<input type="button" onclick="Publish('.$ref.')" value="Published" class="bt_1" alt="Published" title="Published">';
                }
                /*$url = parse_url($_SERVER['HTTP_REFERER']);
                $trimmedheader = $url['scheme'] . '://' . $url['host'] . $url['path'];
                header('Location:'.$trimmedheader.'?id='.$ref);*/
            }
    }
    else if($act=='urlable')
    {
            $query = "SELECT * FROM general WHERE id='".$ref."'";
      		$result = mysqli_query($con, $query);
     		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
     		{
         		$urlable=$row['urlable'];
                if ($urlable==0){ $urlable=1; }
                else { $urlable=0; }
                sleep(1);
                $query="UPDATE general SET urlable='".$urlable."' WHERE id='".$ref."'";
                mysqli_query($con, $query);

                if($urlable==0){
                    echo'<input type="button" onclick="Toggles('.$ref.')" value="PAGE" class="bt_2" alt="PAGE" title="PAGE">';
                }
                else{
                    echo'<input type="button" onclick="Toggles('.$ref.')" value="URL" class="bt_2" alt="URL" title="URL">';
                }
            }
    }
    else if($act=='url')
    {
            $query = "SELECT * FROM general WHERE id='".$ref."'";
      		$result = mysqli_query($con, $query);
     		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
     		{
                $urlable=$row['urlable'];
                if ($urlable==0){ $urlable=1; }
                else { $urlable=0; }
                /*sleep(1); */
                $query="UPDATE general SET urlable='".$urlable."' WHERE id='".$ref."'";
                mysqli_query($con, $query);

                /*if($urlable==0){
                    echo'<input type="button" onclick="Toggle('.$ref.')" value="PAGE" class="bt_2" alt="PAGE" title="PAGE">';
                }
                else{
                    echo'<input type="button" onclick="Toggle('.$ref.')" value="URL" class="bt_2" alt="URL" title="URL">';
                }*/
                $url = parse_url($_SERVER['HTTP_REFERER']);
                $trimmedheader = $url['scheme'] . '://' . $url['host'] . $url['path'];
                header('Location:'.$trimmedheader.'?id='.$ref);
            }
    }
    else if($act=='theme'){
        $query1="UPDATE theme SET enable=IF(id=".$ref.", 1, 0)";
        mysqli_query($con,$query1);
        $refer = 'theme.php';
        header( 'refresh: 0; url='.$refer);
    }
    else{
        $query = "SELECT * FROM ".$act." WHERE id='".$ref."'";
      	$result = mysqli_query($con, $query);
     	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
     		{
         		$enable=$row['enable'];
                if ($enable==0){ $enable=1; }
                else { $enable=0; }
                sleep(1);
                $query="UPDATE ".$act." SET enable='".$enable."' WHERE id='".$ref."'";
        		mysqli_query($con, $query);
            }
    }
?>