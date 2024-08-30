<?php
require_once '../config/init.php';

// Periksa apakah user sudah login dan memiliki hak akses
if (!isset($_SESSION['email']) || $user->role != 1) {
    header('Location: ../dashboard/index.php');
    exit();
}

// Ambil data artikel
$query = "
    SELECT
        artikel.id,
        artikel.judul,
        artikel.created_at,
        users.name AS author_name
    FROM
        artikel
    LEFT JOIN
        users ON artikel.user_id = users.id
";
$articles = fetchData($query);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Artikel</title>
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
                    <a href="data_artikel.php" class="list-group-item list-group-item-action active">Data Artikel</a>
                    <a href="master_kategori.php" class="list-group-item list-group-item-action ">Kelola Kategori</a>
                </div>
            </div>
            <div class="col-md-9 col-xs-12">
                <div class="card">
                    <div class="card-header text-center">
                        Data Artikel
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Created At</th>
                                        <th>Penulis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1;
                                    ?>
                                    <?php while ($article = mysqli_fetch_object($articles)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $article->id; ?></td>
                                            <td><?php echo $article->judul; ?></td>
                                            <td><?php echo $article->created_at; ?></td>
                                            <td><?php echo $article->author_name; ?></td>
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
