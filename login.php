<style>
    body{
       display:flex;
       flex-direction: column;
       align-items: center;
       justify-content: center;
       height: 100vh;
    }
</style>

<?php

    include 'connection.php';

    if (isset($_POST['masuk'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($_GET['as'] == 'user') {
            $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
            $loc = sprintf('location: user.php?username=%s', $username);
        } else if ($_GET['as'] == 'admin'){
            $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username'");
            $loc = sprintf('location: admin.php');
        }
        
        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_assoc($query);
            if ($password == $row['pass']) {
                $as = $_GET['as'];
                header($loc);
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Login Form</title>
</head>
<body>
    <?php
        if ($_GET['as'] == 'user') {
    ?>

        <h1>Masuk</h1>

        <section>
            <form class="form" method="POST">
                <table>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td><a class="btn btn-primary" href="index.html">Kembali</a></td>
                        <td><button class="btn btn-success" ype="submit" name="masuk">Masuk</button></td>
                    </tr>
                </table>
            </form>
        </section>

        <section>
            <p>Belum punya akun? <a href="sign_in.php">daftar sekarang</a></p>
        </section>
    <?php
        } else if ($_GET['as'] == 'admin') {
    ?>

        <h1>Masuk</h1>

        <section>
            <form method="POST">
                <table>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td><a class="btn btn-primary" href="index.html">Kembali</a></td>
                        <td><button class="btn btn-success" ype="submit" name="masuk">Masuk</button></td>
                    </tr>
                </table>
            </form>
        </section>

    <?php
        }
    ?>
</body>
</html>