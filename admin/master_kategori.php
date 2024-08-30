<?php
require_once '../config/init.php';

// Periksa apakah user sudah login dan memiliki hak akses
if (!isset($_SESSION['email']) || $user->role != 1) {
    header('Location: ../dashboard/index.php');
    exit();
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
                        Kelola Kategori
                    </div>
                    <div class="card-body">
                        <a href="tambah_kategori.php" class="btn btn-primary mb-3">Tambah Kategori</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Keterangan</th>
                                        <th>Created At</th>
                                        <th>Jumlah Artikel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;
                                    ?>
                                    <?php $kategori = getKategori();?>
                                    <?php while ($item = mysqli_fetch_object($kategori)) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $item->id; ?></td>
                                            <td><?php echo $item->keterangan; ?></td>
                                            <td><?php echo $item->created_at; ?></td>
                                            <td><?php echo $item->jumlah; ?> Post</td>
                                            <td>
                                                <a href="edit_kategori.php?id=<?php echo $item->id; ?>" class="btn btn-sm btn-success">Edit</a>
                                                <a href="hapus.php?id=<?php echo $item->id; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
