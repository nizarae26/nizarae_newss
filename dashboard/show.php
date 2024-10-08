<?php

require_once '../config/init.php';
$error = '';



?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nizarae News</title>

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>

    <?php require_once '../layouts/navigation.php'; ?>

    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-md-9 col-xs-12 px-5">
                <div class="card mb-3">

                    <?php if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $article = find($id);

                        if ($article) {
                            $item = mysqli_fetch_object($article);

                            if ($item) {
                                reading($id);
                            } else {
                                die('Artikel tidak ditemukan');
                            }
                        } else {
                            die('Query gagal atau artikel tidak ditemukan');
                        }
                    }
                    ?>
                    <?php if (!empty($item->image)) { ?>
                        <img class="card-img-top" src="../assets/images/<?php echo $item->image; ?>" alt="Card image cap">
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item->judul; ?></h5>

                        <p class="card-text">
                            <?php echo nl2br($item->konten); ?>
                        </p>
                    </div>
                    <?php if (isset($_SESSION['email'])) { ?>
                        <?php if ($item->user_id == $user->id || $user->role == 0) { ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="edit.php?id=<?php echo $item->id; ?>" class="card-link">Sunting</a>
                                    <a href="delete.php?id=<?php echo $item->id; ?>" class="card-link">Hapus</a>
                                </li>
                            </ul>
                        <?php } ?>
                    <?php } ?>

                    <div class="card-footer">
                        <small class="text-muted">
                            <?php echo '@' . ucwords($item->name); ?>,
                            <?php echo $item->kategori; ?>

                            <span class="float-right">
                                <?php
                                $date = date_create($item->created_at);
                                echo date_format($date, 'F j, Y');
                                ?>
                            </span>
                        </small>
                    </div>
                </div>

                <!-- <div class="card mb-3">
                    <div class="card-header">
                        Komentar
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
                                <textarea name="keterangan" class="form-control" placeholder="Tulis komentar..."></textarea>
                            </div>
                        </div>

                        <div class="card-footer text-muted text-center">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                Kirim
                            </button>
                        </div>
                    </form>
                </div> -->


            </div>

            <?php require_once '../layouts/sidebar.php'; ?>
        </div>
    </div>

</body>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

</html>