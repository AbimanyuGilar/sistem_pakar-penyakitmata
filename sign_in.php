<style>

    body{
        height: 100vh;
        display:flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

</style>

<?php

    include 'connection.php';

    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];
        $query = mysqli_query($conn, "INSERT INTO tb_user VALUE(null, '$nama', '$no_hp', '$username', '$password')");
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
    <title>Sign In Form</title>
</head>
<body>
    <h1>Formulir Pendaftaran</h1>
        <section>
            <form method="POST">
                <table>
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td><input type="text" name="nama" id="nama"></td>
                    </tr>
                    <tr>
                        <td><label for="no_hp">No. telepon</label></td>
                        <td><input type="number" name="no_hp" id="no_hp"></td>
                    </tr>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>  
                </table>
                <a class="btn btn-primary" href="login.php?as=user">Kembali</a>
                <button class="btn btn-success" type="submit" name="daftar">Daftar</button>
            </form>
        </section>
    </body>
</html>