<?php

require_once '../config/init.php';

if (!isset($_SESSION['email'])) {
    header('Location: ../dashboard/index.php');
} else {
    if ($user->role != 1) {
        header('Location: ../dashboard/index.php');
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteKategori($id)) {
        header('Location: index.php');
    } else {
        echo 'Gagal menghapus kategori!';
    }
} else {
    header('Location: index.php');
}
