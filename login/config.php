<?php
 $server = "localhost";
 $user = "root";
 $password = "";
 $dbname = "locol";

 $connect = mysqli_connect($server, $user, $password, $dbname);

 if (!$connect)
 {
    die ("ERROR: Cannot connect to the database $dbname on sever $sever 
    using username $user (" .mysql_connect_errno(). ", ".mysql_connect_error(). ")");
 }
 mysqli_query($connect, "SET NAMES utf8");
?>