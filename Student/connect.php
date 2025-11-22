<?php
    $connect = mysqli_connect("localhost","root", "", "collegefeepayr");
    if(!$connect)
    {
        die("Could not connect to the MySQL Databse".mysqli_error());
    }
?>