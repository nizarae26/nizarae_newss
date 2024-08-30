<?php
require_once '../config/init.php';

// Periksa apakah user sudah login dan memiliki hak akses
if (!isset($_SESSION['email']) || $user->role != 1) {
    header('Location: ../dashboard/index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kategori = findKategori($id);

    if ($kategori && mysqli_num_rows($kategori) > 0) {
        $item = mysqli_fetch_object($kategori);
    } else {
        header('Location: master_kategori.php');
        exit();
    }
} else {
    header('Location: master_kategori.php');
    exit();
}

// Ambil data kategori
// $kategori = getKategori();
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Kategori</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>
<?php require_once '../layouts/navigationadmin.php'; ?>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-md-3 col-xs-12">
                <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action">Master Data</a>
                    <a href="data_user.php" class="list-group-item list-group-item-action">Data User</a>
                    <a href="data_artikel.php" class="list-group-item list-group-item-action">Data Artikel</a>
                    <a href="master_kategori.php" class="list-group-item list-group-item-action active">Kelola Kategori</a>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="card">
                    <div class="card-header text-center">
                        Edit Kategori
                    </div>

                    <form action="" method="post">
    <div class="card-body">
        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?php echo isset($item) ? htmlspecialchars($item->keterangan) : ''; ?>">
        </div>
    </div>
    <div class="card-footer text-muted text-center">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="master_kategori.php" class="btn btn-danger">Batal</a>
    </div>
</form>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>