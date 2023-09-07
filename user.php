<style>
    body{
        height:100vh;
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .buttons{
        display: flex;
        align-items: center;
        margin: 10px;
    }

    .btn{
        margin:  0 10px;
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
    <title>Document</title>
</head>
<body>
    <h1>
        Halo <?php echo $_GET['username']?>
    </h1>
    <div class="buttons">
        <a class="btn btn-primary" href="survey.php?username=<?php echo $_GET['username']?>">Mulai Konsultasi</a>
        <a class="btn btn-success" href="history.php?username=<?php echo $_GET['username']?>">Lihat histori</a><br>
    </div>
    <a class="btn btn-danger" href="index.html">Log out</a>
</body>
</html>