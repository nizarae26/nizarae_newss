<?php
require_once '../config/init.php';

// Periksa apakah user sudah login dan memiliki hak akses
if (!isset($_SESSION['email']) || $user->role != 1) {
    header('Location: ../dashboard/index.php');
    exit();
}

if (isset($_POST['submit'])) {
    $data['keterangan'] = $_POST['keterangan'];

    if (!empty(trim($data['keterangan']))) {
        if (strlen($data['keterangan']) >= 4) {
            if (createKategori($data)) {
                header('Location: master_kategori.php');
            } else {
                $error = 'Ada masalah saat menambah data!';
            }
        } else {
            $error = 'Keterangan kategori minimal 4 karakter!';
        }
    } else {
        $error = 'Keterangan tidak boleh kosong!';
    }
}

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
                        Tambah Kategori
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
                                <label for="keterangan">Nama Kategori</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Nama Kategori">
                            </div>

                        </div>

                        <div class="card-footer text-muted text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
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