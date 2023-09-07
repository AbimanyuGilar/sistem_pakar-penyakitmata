    <style>
        .container-fluid{
            background-color: #e0dc20;
            margin: 10px;
            border-radius:10px;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form{
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
        }
        .btn{
            margin: 10px 0;
        }
        .btn-d{
            width: 500px;
        }
    </style>

<?php
    include 'connection.php';
    $query = mysqli_query($conn, "SELECT * FROM tb_gejala;");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>User</title>
</head>
<body>
<h1>Silahkan jawab pertanyaan berikut</h1>

<form method="POST" action="result(percobaan).php">
    <?php while ($sql = mysqli_fetch_assoc($query)) { ?>
    <div class="container-fluid">
        <div class="row">
        <h3 class="row-sm-4">
            <?php 
                echo $sql['gejala'];
            ?>
        </h3>
        
            <div class="row-sm-4">
                <input name="<?php echo$sql['id_gejala']?>" class="radio" type="radio" id="y" value="yes">
                <label for="y">ya</label><br>
                <input checked class="radio" name="<?php echo$sql['id_gejala']?>" type="radio" id="n" value="no">
                <label for="n">tidak</label><br>
            </div>
        </div>
    </div>        
    <?php } ?>
    
    <button class="btn-d btn btn-success" type="submit" value="diagnose">Diagnosa</button>
    <a class="btn btn-primary" href="user.php?username=<?php echo $_GET['username']?>">Kembali<a>
</form>

<script>
    
</script>
</body>
</html>