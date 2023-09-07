<?php

    include 'connection.php';

?>

<style>

    ul{
        list-style:none;
        text-align: center;
        margin: 0;
    }

    h1{
        text-align: center;
    }

    section{
        margin: 20px;
    }

    h2{
        text-align: center;
    }

    body{
        height: 100vh;
        justify-content: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .btn-primary{
        margin: 10px 0;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>
    <section><h1>Anda adalah admin</h1></section>
    <section>
        <h2>Management Data</h2>
        
            <a class="btn btn-primary" href="mng.php?data=user">Manage User</a>
            <a class="btn btn-primary" href="mng.php?data=gejala">Manage Gejala</a>
            <a class="btn btn-primary" href="mng.php?data=admin">Manage Admin</a>
            <a class="btn btn-primary" href="mng.php?data=penyakit">Manage Penyakit</a>
            <a class="btn btn-primary" href="mng.php?data=basis_pengetahuan">Manage Basis Pengetahuan</a>
        
    </section>
    <section>
        <a class="btn btn-danger" href="index.html?">Log out</a>
    </section>
</body>
</html>