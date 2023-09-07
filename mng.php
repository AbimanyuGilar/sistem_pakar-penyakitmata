<style>

    .table_striped{
        color: gray;
    }

    .btn-h{
        margin:10px;
    }

</style>

<?php
    include 'connection.php';
    if ($_GET['data'] == 'penyakit') {
        $tb = 'tb_penyakit';
    } else if ($_GET['data'] == 'user') {
        $tb = 'tb_user';
    } else if ($_GET['data'] == 'gejala') {
        $tb = 'tb_gejala';
    } else if ($_GET['data'] == 'admin') {
        $tb = 'tb_admin';
    } else if ($_GET['data'] == 'basis_pengetahuan') {
        $tb = 'basis_pengetahuan';
    }
    $query = mysqli_query($conn, "SELECT * FROM $tb;");
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Management</title>
    </head>
    <body>
        
        
        <section>
            <a class="btn-h btn btn-primary" href="admin.php">Kembali</a>
            <a class="btn-h btn btn-success" href="add.php?data=<?php echo $_GET['data'] ?>">Tambahkan baru</a>

            <table class="table table-striped">
                
            <?php
                if ($tb == 'tb_penyakit') {
            ?>
                <tr>
                    <th>id</th>
                    <th>penyakit</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php
                } else if ($tb == 'tb_gejala') {
            ?>
                <tr>
                    <th>id</th>
                    <th>gejala</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                } else if ($tb == 'tb_user') {
                    ?>
                <tr>
                    <th>id</th>
                    <th>nama</th>
                    <th>username</th>
                    <th>no telepon</th>
                    <th>password</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php
                } else if ($tb == 'tb_admin') {
            ?>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>password</th>
                    <th></th>
                    <th></th>
                </tr>
                
            <?php
                } else if ($tb == 'basis_pengetahuan') {
                    ?>

<tr>
    <th>id</th>
                    <th>penyakit</th>
                    <th>gejala</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                }
            ?>
            

            <?php 
                if ($tb == 'tb_penyakit'){
                    while($sql = mysqli_fetch_assoc($query)){ 
            ?>
                <tr>
                    <td><?php echo$sql['id_penyakit'] ;?></td>
                    <td><?php echo$sql['penyakit']; ?></td>
                    <td><a class="btn btn-success" href="update.php?data=penyakit&id=<?php echo$sql['id_penyakit'] ?>" type="button">edit</a></td>
                    <td><a class="btn btn-danger" href="process.php?hapus_p=<?php echo $sql['id_penyakit']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">hapus</a></td>
                </tr>
            
            <?php 
                    }    
                } else if ($tb == 'tb_gejala') {
                    while($sql = mysqli_fetch_assoc($query)){
            ?>
                <tr>
                    <td><?php echo$sql['id_gejala'] ;?></td>
                    <td><?php echo$sql['gejala']; ?></td>
                    <td><a class="btn btn-success" href="update.php?data=gejala&id=<?php echo $sql['id_gejala'] ?>" type="button">edit</a></td>
                    <td><a class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')" href="process.php?hapus_g=<?php echo $sql['id_gejala']; ?>" type="button">hapus</a></td>
                </tr>
                <?php
                    }
                } else if ($tb == 'tb_user') {
                    while($sql = mysqli_fetch_assoc($query)){
            ?>
                <tr>
                    <td><?php echo$sql['id_user'] ;?></td>
                    <td><?php echo$sql['nama']; ?></td>
                    <td><?php echo$sql['username']; ?></td>
                    <td><?php echo$sql['no_hp']; ?></td>
                    <td><?php echo$sql['pass']; ?></td>
                    <td><a class="btn btn-success" href="update.php?data=user&id=<?php echo$sql['id_user'] ?>" type="button">edit</a></td>
                    <td><a class="btn btn-danger" href="process.php?hapus_u=<?php echo $sql['id_user']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">hapus</a></td>
                </tr>
                <?php
                    } 
                } else if ($tb == 'tb_admin') {
                    while($sql = mysqli_fetch_assoc($query)){
            ?>
                <tr>
                    <td><?php echo$sql['id_admin'] ;?></td>
                    <td><?php echo$sql['username']; ?></td>
                    <td><?php echo$sql['pass']; ?>
                    <td><a class="btn btn-success" href="update.php?data=admin&&id=<?php echo$sql['id_admin'] ?>" type="button">edit</a></td>
                    <td><a class="btn btn-danger" href="process.php?hapus_a=<?php echo $sql['id_admin']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">hapus</a></td>
                </tr>

                <?php
                    }
                } else if ($tb == 'basis_pengetahuan') {
                    $join = mysqli_query($conn, "SELECT * FROM basis_pengetahuan a, tb_penyakit b, tb_gejala c WHERE a.id_penyakit=b.id_penyakit AND a.id_gejala=c.id_gejala;");
                    while($sql = mysqli_fetch_assoc($join)){
            ?>    
                <tr>
                    <td><?php echo $sql['id_rule'];?></td>
                    <td><?php echo $sql['penyakit'] ;?></td>
                    <td><?php echo $sql['gejala']; ?></td>

                    <td><a class="btn btn-success" href="update.php?data=basis_pengetahuan&id=<?php echo$sql['id_rule'] ?>" type="button">edit</a></td>
                    <td><a class="btn btn-danger" href="process.php?hapus_bp=<?php echo $sql['id_rule']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">hapus</a></td>
                </tr>
            <?php
                }
            }
            ?>
        </table>
    </section>
</body>
</html>