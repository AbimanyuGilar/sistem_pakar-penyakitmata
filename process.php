<?php
    include 'connection.php';
    $id = $_GET['id'];
    if($_GET['action'] == 'add'){
        
        if(isset($_POST['add'])){
            if($_POST['add'] == 'penyakit'){
                $penyakit = $_POST['penyakit'];
                $id = $_POST['id'];
                $add = mysqli_query($conn, "INSERT INTO tb_penyakit VALUES('$id', '$penyakit');");
                if($add){
                    header('location: add.php?data=penyakit');
                }
                } else if ($_POST['add'] == 'gejala') {
                    $id = $_POST['id'];
                    $gejala = $_POST['gejala'];
                    $add = mysqli_query($conn, "INSERT INTO tb_gejala VALUES('$id', '$gejala');");
                    if($add){
                        header('location: add.php?data=gejala');
                    }
                } else if ($_POST['add'] == 'admin') {
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $add = mysqli_query($conn, "INSERT INTO tb_admin VALUES(null, '$username', '$pass');");
                    if($add){
                        header('location: add.php?data=admin');
                    }
                } else if ($_POST['add'] == 'user') {
                    $nama = $_POST['nama'];
                    $no_hp = $_POST['no_hp'];
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $add = mysqli_query($conn, "INSERT INTO tb_user VALUES(null, '$nama','$no_hp','$username' ,'$pass');");
                    if($add){
                        header('location: add.php?data=user');
                    }
                } else if ($_POST['add'] == 'basis_pengetahuan') {
                    $id_penyakit = $_POST['penyakit'];
                    $id_gejala = $_POST['gejala'];
                    $add = mysqli_query($conn, "INSERT INTO basis_pengetahuan VALUES(null, '$id_penyakit', '$id_gejala');");
                    if($add){
                        header('location: add.php?data=basis_pengetahuan');
                    }
                    
                    
                    
                    $query = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_penyakit='$id_penyakit' AND id_gejala='$id_gejala';");

                    
                    while ($sql = mysqli_fetch_assoc($query)) {
                        $id_rule = $sql['id_rule'];
                        $array = array();
                        $pnow = $sql['id_penyakit'];
                        $query2 = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_penyakit='$pnow' ORDER BY basis_pengetahuan.id_gejala ASC");
                        while($sql = mysqli_fetch_assoc($query2)){
                            array_push($array, $sql['id_gejala']);
                        }
                        $array = implode(',', $array);
                        mysqli_query($conn, "INSERT INTO tb_rules VALUES('$id_rule', '$pnow', '$array')");
                        mysqli_query($conn, "UPDATE tb_rules SET kondisi='$array' WHERE id_penyakit='$pnow';");
                    }
                }   
            }
        } else if ($_GET['action'] == 'update') {
            $nw_id = $_POST['id'];
            if(isset($_POST['add'])){  
                if($_POST['add'] == 'penyakit'){
                    $penyakit = $_POST['penyakit'];
                    $add = mysqli_query($conn, "UPDATE tb_penyakit SET id_penyakit='$nw_id', penyakit='$penyakit' WHERE id_penyakit='$id';");;
                    if($add){
                        header('location: mng.php?data=penyakit');
                    }
                } else if ($_POST['add'] == 'gejala') {
                    $gejala = $_POST['gejala'];
                    $add = mysqli_query($conn, "UPDATE tb_gejala SET id_gejala='$nw_id', gejala='$gejala' WHERE id_gejala='$id';");
                    if($add){
                        header('location: mng.php?data=gejala');
                    }
                } else if ($_POST['add'] == 'admin') {
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $add = mysqli_query($conn, "UPDATE tb_admin SET username='$username', pass='$pass' WHERE id_admin='$id';");
                    if($add){
                        header('location: mng.php?data=admin');
                    }
                } else if ($_POST['add'] == 'user') {
                    $nama = $_POST['nama'];
                    $no_hp = $_POST['no_hp'];
                    $username = $_POST['username'];
                    $pass = $_POST['password'];
                    $add = mysqli_query($conn, "UPDATE tb_user SET nama='$nama', no_hp='$no_hp', username='$username', pass='$pass' WHERE id_user='$id';");
                    if($add){
                        header('location: mng.php?data=user');
                    }
                } else if ($_POST['add'] == 'basis_pengetahuan') {
                    $id_penyakit = $_POST['penyakit'];
                    $id_gejala = $_POST['gejala'];
                    $query_p = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_rule='$id'");
                    $sql_p = mysqli_fetch_assoc($query_p);
                    $id_p = $sql_p['id_penyakit'];
                    $add = mysqli_query($conn, "UPDATE basis_pengetahuan SET id_penyakit='$id_penyakit', id_gejala='$id_gejala' WHERE id_rule='$id';");
                    
                    $query = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_penyakit='$id_penyakit' ORDER BY basis_pengetahuan.id_gejala ASC");
        
                    $array = array();
                    while ($sql = mysqli_fetch_assoc($query)) {
                        array_push($array, $sql['id_gejala']);
                    }  
                    $array = implode(',', $array);
                    mysqli_query($conn, "UPDATE tb_rules SET id_penyakit='$id_penyakit' ,kondisi='$array' WHERE id_rules='$id'");
                    mysqli_query($conn, "UPDATE tb_rules SET kondisi='$array' WHERE id_penyakit='$id_penyakit';"); 
                    
                    $old_id = $_GET['id_p'];
                    $gejala = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_penyakit='$old_id' ORDER BY basis_pengetahuan.id_gejala ASC;");
                    $kondisi = array();
                    while($sql = mysqli_fetch_assoc($gejala)){
                        array_push($kondisi, $sql['id_gejala']);
                    }
                    $kondisi = implode(',', $kondisi);
                    mysqli_query($conn, "UPDATE tb_rules SET kondisi='$kondisi' WHERE id_penyakit='$old_id'");
                }
                
                
                if($add){
                    header('location: mng.php?data=basis_pengetahuan');
                }
            }
        }

    if(isset($_GET['hapus_p'])){
        $id = $_GET['hapus_p'];
        $del = mysqli_query($conn, "DELETE FROM tb_penyakit WHERE id_penyakit = '$id'");
        if($del){
            header('location: mng.php?data=penyakit');
        }
    } else if (isset($_GET['hapus_g'])){
        $id = $_GET['hapus_g'];
        $del = mysqli_query($conn, "DELETE FROM tb_gejala WHERE id_gejala = '$id'");
        if($del){
            header('location: mng.php?data=gejala');
        }
    } else if (isset($_GET['hapus_u'])){
        $id = $_GET['hapus_u'];
        $del = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$id'");
        if($del){
            header('location: mng.php?data=user');
        }
    }   else if (isset($_GET['hapus_a'])){
        $id = $_GET['hapus_a'];
        $del = mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = '$id'");
        if($del){
            header('location: mng.php?data=admin');
        }
    }   else if (isset($_GET['hapus_bp'])){
        $id = $_GET['hapus_bp'];
        $queryid = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_rule='$id'");
        $sqlid = mysqli_fetch_assoc($queryid);
        $id_penyakit =  $sqlid['id_penyakit'];
        $del = mysqli_query($conn, "DELETE FROM basis_pengetahuan WHERE id_rule = '$id'");
        if($del){
            header('location: mng.php?data=basis_pengetahuan');
        }
        
        $query = mysqli_query($conn, "SELECT * FROM basis_pengetahuan WHERE id_penyakit='$id_penyakit' ORDER BY basis_pengetahuan.id_gejala ASC");
        mysqli_query($conn, "DELETE FROM tb_rules WHERE id_rules='$id';");

        $array = array();
        while ($sql = mysqli_fetch_assoc($query)) {
            array_push($array, $sql['id_gejala']);
        }  
        $array = implode(', ', $array);
        mysqli_query($conn, "UPDATE tb_rules SET kondisi='$array' WHERE id_penyakit='$id_penyakit'");
    }
?>