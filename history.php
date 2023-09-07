<style>
    .btn{
        margin:10px;
    }
</style>

<?php

    include 'connection.php';

    $username = $_GET['username'];
    $query = mysqli_query($conn, "SELECT * FROM tb_history WHERE username='$username';");

?>

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
    <table class="table table-striped">
        <tr>
            <th>Gejala</th>
            <th>Penyakit</th>
        </tr>
        <?php
            while($sql = mysqli_fetch_assoc($query)){
                $condition_id = $sql['kondisi'];
                $condition_id = explode(',',$condition_id);
                $condition = array();
                foreach($condition_id as $id_gejala){
                    $query_g = mysqli_query($conn, "SELECT * FROM tb_gejala WHERE id_gejala='$id_gejala'");
                    $query_g = mysqli_fetch_assoc($query_g);
                    array_push($condition, $query_g['gejala']);
                }
                $condition = implode(', ', $condition);
        ?>
        <tr>
            <td><?php echo $condition ?></td>
            <td><?php echo $sql['diagnosis'] ?></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <a class="btn btn-primary" href="user.php?username=<?php echo $_GET['username'] ?>">Kembali</a>
</body>
</html>