<?php

            error_reporting(0);

            session_start();

            $con = mysqli_connect('localhost', 'root', '', 'sylverscales');

            if (mysqli_connect_errno($con)) 

            {echo 'Failed to connect to MySQL: ' . mysqli_connect_error();}

            ?>