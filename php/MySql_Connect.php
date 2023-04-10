<?php
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '');
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'st_assignment');
    
    $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if (!$dbcon)  {  
        die('Could not connect: ' . mysql_error());  
    }

    mysqli_select_db($dbcon, DB_NAME);
?>