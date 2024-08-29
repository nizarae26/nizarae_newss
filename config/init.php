<?php

    session_start();
    $base_url = 'http://localhost/nizarae_news/';

    require_once '../function/connection.php';
    require_once '../function/control.php';
    require_once '../function/artikel.php';
    require_once '../function/kategori.php';
    require_once '../function/komentar.php';
    require_once '../function/auth.php';

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $user = mysqli_fetch_object(get_user($email));
    }