<?php
include "koneksi.php";
require_once "action.php";

$koneksi = new Connection();

$conn = $koneksi->getConn();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Ke Perpustakaan Digital</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="img js-fullheight" style="background-image: url(assets/img/background_login.jpg);">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login Perpustakaan Digital</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['login'])) {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];

                                        $data = mysqli_query($conn, "SELECT*FROM user where username='$username' and password='$password'");
                                        $cek = mysqli_num_rows($data);
                                        if ($cek > 0) {
                                            $_SESSION['user'] = mysqli_fetch_array($data);
                                            echo '<script>alert("Selamat datang, Login Berhasil"); location.href="index.php"</script>';
                                        } else {

                                            echo '<script>alert("Maaf, Username/Password salah")</script>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="inputEmail">Username</label>
                                            <input class="form-control" id="inputusername" type="text" name="username" placeholder="Enter username" />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Enter Password" />
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login" value="login" href="index.html">Login</button>
                                            <a class="btn btn-danger" href="register.php">Register</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        &copy; 2024 Perpustakaan Digital.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>

</html>