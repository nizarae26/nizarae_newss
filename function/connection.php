<?php 

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'nizarae_news';

    $connection = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());

    function fetchData($query) {
        global $connection;
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query gagal: " . mysqli_error($connection));
        }
        return $result;
    }