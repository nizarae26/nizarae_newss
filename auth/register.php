<?php

require_once '../config/init.php';
$error = '';

if (isset($_SESSION['email'])) {
    header('Location: ../dashboard/index.php');
}

if (isset($_POST['submit'])) {
    $data['fullname'] = $_POST['fullname'];
    $data['nama'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];

    if (!empty(trim($data['fullname'])) && !empty(trim($data['nama'])) && !empty(trim($data['email'])) && !empty(trim($data['password']))) {
        if (strlen($data['nama']) >= 3 && strlen($data['email']) >= 6 && strlen($data['password']) >= 8) {
            if (register($data)) {
                $_SESSION['email'] = $data['email'];
                header('Location: ../dashboard/index.php');
            } else {
                $error = 'Register gagal!';
            }
        } else {
            $error = 'Nama minimal 3 karakter <br>
                            Email minimal 6 karakter <br> 
                            Password minimal 8 karakter';
        }
    } else {
        $error = 'Nama, Email dan Password tidak boleh kosong!';
    }
}

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

    <div class="container">
        <div class="row justify-content-md-center pt-4">
            <div class="col-md-4 pl-4">
                <div class="card">
                    <div class="card-header text-center">
                        Register
                    </div>

                    <div class="card-body">
                        <?php if (!empty($error)) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo $error; ?>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>

                        <form method="POST" action="">

                            <div class="form-group">
                                <p2>Fullname</p2>
                                <input id="fullname" type="text" placeholder="Masukkan Nama Lengkap" class="form-control" name="fullname" required autofocus style="margin-top: 1%;">
                            </div>

                            <div class="form-group">
                                <p2>Nama</p2>
                                <input id="name" type="text" placeholder="Masukkan Nama" class="form-control" name="name" required autofocus style="margin-top: 1%;">
                            </div>

                            <div class="form-group">
                                <p2>Email</p2>
                                <input id="email" type="email" placeholder="Masukkkan Email" class="form-control" name="email" required style="margin-top: 1%;">
                            </div>
                            
                            <div class="form-group">
                                <p2>Password</p2>
                                <input id="password" type="password" placeholder="Masukkan Password" class="form-control" name="password" required style="margin-top: 1%;">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="panel panel-default">
                        <div class="panel-heading"></div>

                        <div class="panel-body">
                            
                        </div>

                    </div> -->
            </div>

        </div>
    </div>

</body>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

</html>