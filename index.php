<?php
/**
 * Description of index
 *
 * @author Norman Syarif
 */
session_start();
if (isset($_SESSION['username'])) {
  header('Location: penjualan.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sistem Keuangan Toko Komputer "Serba KW"</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/style.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 atas">
                    <span id="text-header">
                        Sistem Keuangan<br/>
                        Toko Komputer "Serba KW"
                    </span>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="container login-form col-md-4 col-md-offset-1">

                        <div class="row">
                            <form action="php/process_login.php" method="post" class="form-horizontal" role="form">
                                <div class="form-group">

                                    <?php
                                    // Show when an error occurs while login
                                    if (isset($_GET['salah'])) {
                                      echo '<div class="alert alert-danger salah">Password Salah!</div>';
                                    } elseif (isset($_GET['notfound'])) {
                                      echo '<div class="alert alert-danger salah">Username tidak ditemukan!</div>';
                                    } elseif (isset($_GET['login'])) {
                                      echo '<div class="alert alert-danger salah">Silahkan login dulu!</div>';
                                    } elseif (isset($_GET['logout'])) {
                                      echo '<div class="alert alert-success salah">Kamu telah logout!</div>';
                                    }
                                    ?>

                                    <div>
                                        <input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div> 
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <div>
                                        <button type="submit" class="btn btn-primary col-md-offset-4">Masuk</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <span>&copy; 2016<br />NORMAN SYARIF | Sistem Informasi UNJA</span>
        </div>

    </body>
</html>