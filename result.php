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

    $join = mysqli_query($conn, "SELECT * FROM tb_penyakit a, tb_rules b WHERE a.id_penyakit=b.id_penyakit");
    $join = mysqli_fetch_assoc($join);
    $condition = array();
    $query_g=mysqli_query($conn, "SELECT * FROM tb_gejala");
    while($sql = mysqli_fetch_assoc($query_g)){
        if($_POST[$sql['id_gejala']] == "yes"){
            array_push($condition, $sql['id_gejala']);
        }
    }
    $condition = implode(',', $condition);
    $query_r = mysqli_query($conn, "SELECT * FROM tb_rules WHERE kondisi='$condition'");
    
    if(mysqli_num_rows($query_r)==0){
        $diagnose = 'Tidak ada penyakit yang cocok';
    } else {
        $result = mysqli_fetch_assoc($query_r);
        $result = $result['id_penyakit'];
        $diagnose = mysqli_query($conn, "SELECT * FROM tb_penyakit WHERE id_penyakit='$result'");
        $diagnose = mysqli_fetch_assoc($diagnose);
        $diagnose = $diagnose['penyakit'];
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
        <title>Document</title>
    </head>
    <body>
        <section>
        <h3>Jika anda mengalami :</h3>
        <ul>
            <?php echo $condition ?>
            <?php
                $query_g=mysqli_query($conn, "SELECT * FROM tb_gejala");
                while ($sql = mysqli_fetch_assoc($query_g)) {    
                    if($_POST[$sql['id_gejala']] == "yes"){ 
            ?>
                <li><p><?php echo $sql['gejala'] ?></p></li>
            <?php
                    }
                }
            ?>
        </ul>
        </section>
        <section>
            <h3>Maka anda mengidap :</h3>
        </section>
        <p><?php echo $diagnose ?></p>
    <a class="btn btn-primary" href="survey.php?username=<?php echo $_GET['username']?>">Kembali</a>
</body>
</html>

<?php

    
    $username = $_GET['username'];
    $query_h = mysqli_query($conn, "INSERT INTO tb_history VALUES(null, '$username', '$condition', '$diagnose');");

?>