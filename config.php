<?php

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'locol';

    $connect = mysqli_connect($server, $user, $password, $dbname);

    if(!$connect) {
        die("ERROR: Can't connect to database $dbname on server $server using username $user".mysqli_connect_errno().")");
    }

?>