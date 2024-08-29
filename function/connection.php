<?php 

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'nizarae_news';

    $connection = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());