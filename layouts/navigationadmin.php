<?php
// require_once 'config/init.php';
// $errors = '';

$kategori = getKategori();

// if (isset($_GET['cari'])) {
//     $cari = $_GET['cari'];

//     if (empty(trim($_GET['cari']))) {
//         $error = 'Kotak pencarian belum diisi';
//     } else {
//         $articles = search($cari);
//     }
// }
// 
?>

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $base_url; ?>admin/index.php">
        <img src="../assets/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Nizarae News
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo ucwords($user->name);
                    } else {
                        echo 'Masuk';
                    }
                    ?>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <?php if (isset($_SESSION['email'])) { ?>
                        <a class="dropdown-item" href="<?php echo $base_url; ?>auth/logout.php">Logout</a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="<?php echo $base_url; ?>auth/register.php">Register</a>
                        <a class="dropdown-item" href="<?php echo $base_url; ?>auth/login.php">Login</a>
                    <?php } ?>
                </div>
            </li>

        </ul>
    </div>
</nav>