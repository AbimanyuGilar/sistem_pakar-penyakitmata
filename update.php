<style>
    body{
        height:100vh;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    }
</style>

<?php
    include 'connection.php';
    $id = $_GET['id'];
    $data = $_GET['data'];
    $tb = sprintf('tb_%s', $data);
    $id_data = sprintf('id_%s', $data);

    if ($data != 'basis_pengetahuan') { 
        $query = mysqli_query($conn, "SELECT * FROM $tb WHERE $id_data = '$id';");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_rule = '$id';");
    }

    $query_p = mysqli_query($conn, "SELECT * FROM tb_penyakit;");
    $query_g = mysqli_query($conn, "SELECT * FROM tb_gejala;");
    $sql = mysqli_fetch_assoc($query);
    

    $join = mysqli_query($conn, "SELECT * FROM basis_pengetahuan a, tb_penyakit b, tb_gejala c WHERE a.id_penyakit=b.id_penyakit AND a.id_gejala=c.id_gejala AND a.id_rule='$id';" );
    $sql_j = mysqli_fetch_assoc($join);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Edit Data</title>
</head>
<body>
    <h1>
        <?php
            echo sprintf('Edit %s',$data);   
        ?>
    </h1>
    <?php if ($data != 'basis_pengetahuan') {?>
        <form method="POST" action="process.php?action=update&id=<?php echo $_GET['id']; ?>">
    <?php } else {?>
        <form method="POST" action="process.php?action=update&id=<?php echo $_GET['id']; ?>&id_p=<?php echo $sql['id_penyakit'] ?>">
    <?php } ?>
        <table>
        <?php if ($data == 'admin') {?>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input value="<?php echo $sql['username']; ?>" type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input value="<?php echo $sql['pass']; ?>" type="password" id="password" name="password"></td>
                </tr>
        <?php } else if ($data == 'user') {?>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input value="<?php echo $sql['nama']?>" type="text" id="nama" name="nama">
                </tr>
                <tr>
                    <td><label for="no_hp">No. telepon</label></td>
                    <td><input value="<?php echo $sql['no_hp']?>" type="number" id="no_hp" name="no_hp">
                </tr>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input value="<?php echo $sql['username']?>" type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input value="<?php echo $sql['pass']?>" type="password" id="password" name="password"></td>
                </tr>
        <?php } else if ($data == 'basis_pengetahuan') { ?>
                    <tr>
                    <td><label for="penyakit">Penyakit</label></td>                    
                        <td>
                            <select type="text" id="penyakit" name="penyakit" value="<?php echo $sql['id_penyakit'] ?>">
                                <option selected value="<?php echo $sql['id_penyakit'] ?>"><?php echo $sql_j['penyakit'] ?></option>
                                
                                <?php
                                    while($sql_p = mysqli_fetch_assoc($query_p)){
                                ?> 
                                    <option name="penyakit" value="<?php echo $sql_p['id_penyakit'] ?>"><?php echo $sql_p['penyakit'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td> 
                    </tr>
                    <tr>
                        <td><label for="gejala">Gejala</label></td>                    
                        <td>
                            <select type="text" id="gejala" name="gejala">
                            <option selected value="<?php echo $sql['id_gejala'] ?>"><?php echo $sql_j['gejala'] ?></option>
                                <?php
                                    while($sql_g = mysqli_fetch_assoc($query_g)){
                                ?> 
                                    <option name="gejala" value="<?php echo $sql_g['id_gejala'] ?>"><?php echo $sql_g['gejala'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>   

                    </tr>
                <?php } else {?>
                    <tr>
                        <td><label for="id">ID</label></td>
                        <td><input value="<?php echo $sql[$id_data] ?>" type="text" id="id" name="id"></td>
                    </tr>
                    <tr>
                        <td><label for="<?php echo $data; ?>"><?php echo $data; ?></label></td>
                        <td><input value="<?php echo $sql[$data] ?>" type="text" id="<?php echo $data; ?>" name="<?php echo $data; ?>"></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><a class="btn btn-primary" href="mng.php?data=<?php echo $data; ?>">kembali</a></td>
                    <td><button class="btn btn-success" type="submit" name="add" value="<?php echo $data; ?>">Simpan Perubahan</button></td>
                </tr>
            </table>
    </form>
</body>
</html>