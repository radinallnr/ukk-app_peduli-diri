<?php
    if(isset($_POST['daftar']))
    {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $text = $nik . "," . $nama . "\n";    
        $fp = fopen('catatan.txt', 'a+');
        if($nik =='' AND $nama ==''){
        echo '<script>alert("Data Tidak Komplite" ) </script>';
        }

        if(fwrite($fp, $text)){
            echo '<script>alert("Anda Berhasil Mendaftar!" ) </script>';
        }
    }
    else if(isset($_POST['masuk']))
    {
            $data = file_get_contents("config.txt"); 
            $contents = explode("\n", $data);

            foreach($contents as $values){
                $login = explode(",", $values);
                $nik = $login[0];
                $nama = $login[1];

                if($nik == $_POST['nik'] && $nama == $_POST['nama']){
                    session_start();
                    $_SESSION['username'] = $nama;
                    header('location: home.php');
                }else{
                    echo '<script>alert("Nik atau Nama Anda Salah!." ) </script>';
                
                }
            }
    }
?>



<html>
    <form action="" method="POST" style="padding-top: auto;">
        <br><br><br><br><br><br><br>
        <table align="center" style="padding-top: auto;">
            <tr>
                <td><input type="text" name= "nik" placeholder="NIK" required></td>
            </tr>
            <tr>
                <td><input type="text" name= "nama" placeholder="NAMA LENGKAP" required></td>
            </tr>
            <tr>
                <td><input type="submit" name= "daftar" value="Saya Pengguna Baru" required></td>
                <td><input type="submit" name= "masuk" value="Masuk"></td>
            </tr>
        </table>
    </form>
</html>