<style>
    body{
        height:100vh;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
</style>

<?php
    include 'connection.php';
    $data = $_GET['data'];
    $query_p = mysqli_query($conn, "SELECT * FROM tb_penyakit");
    $query_g = mysqli_query($conn, "SELECT * FROM tb_gejala");
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
    <h1>Tambahkan <?php echo $data; ?></h1>
    <form method="POST" action="process.php?action=add">
        <table>
        <?php if ($data == 'admin') {?>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>
        
        <?php } else if ($data == 'user') {?>
            
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td><input type="text" id="nama" name="nama">
                </tr>
                <tr>
                    <td><label for="no_hp">No. telepon</label></td>
                    <td><input type="number" id="no_hp" name="no_hp">
                </tr>
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>
            <?php } else if ($data == 'basis_pengetahuan') { ?>
                
                    <tr>
                    <td><label for="penyakit">Penyakit</label></td>                    
                        <td>
                            <select type="text" id="penyakit" name="penyakit">
                                <?php
                                    while($sql = mysqli_fetch_assoc($query_p)){
                                ?> 
                                    <option name="penyakit" value="<?php echo $sql['id_penyakit'] ?>"><?php echo $sql['penyakit'] ?></option>
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
                                <?php
                                    while($sql = mysqli_fetch_assoc($query_g)){
                                ?> 
                                    <option name="gejala" value="<?php echo $sql['id_gejala'] ?>"><?php echo $sql['gejala'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>   
                    </tr>
                
            <?php } else {?>
            
                <tr>
                    <td><label for="id">ID</label></td>
                    <td><input type="text" id="id" name="id"></td>
                </tr>
                <tr>
                    <td><label for="<?php echo $data; ?>"><?php echo $data; ?></label></td>
                    <td><input type="text" id="<?php echo $data; ?>" name="<?php echo $data; ?>"></td>
                </tr>
            
            <?php } ?>
                <tr>
                    <td><a class="btn btn-primary" href="mng.php?data=<?php echo $data; ?>">kembali</a></td>
                    <td><button class="btn btn-success" type="submit" name="add" value="<?php echo $data; ?>">Tambahkan</button></td>
                </tr>
        </table>
    </form>
</body>
</html>