<?php
    include 'connection.php';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id penyakit</th>
            <th>kondisi</th>
        </tr>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM tb_rules");
            while($sql = mysqli_fetch_assoc($query)){
        ?>

        <tr>
            <td><?php echo $sql['id_penyakit']?></td>
            <td><?php echo $sql['kondisi']?></td>
        </tr>

        <?php
            }
        ?>
    </table>
</body>
</html>