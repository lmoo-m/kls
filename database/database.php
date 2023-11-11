<?php 
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "kelas";

    $db = mysqli_connect($hostname, $user, $password, $database);

    if(!$db){
        die();
    }