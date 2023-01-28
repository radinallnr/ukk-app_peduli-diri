<?php
        include "header.php";

        session_start();
        $user= $_SESSION['username'];
        $datauser= "catatan/$user.txt";

        if(!file_exists($datauser)) {
            die('<center>Kamu Belum Mempunyai Catatan</center>');
        }else{
            $file = fopen($datauser, "r");
        }
?>


<html>
    <body>
        <table border="1" align="center" width="50%">
            <td>
                <a>Urutkan Berdasarkan : </a>
                <select id="urut" onclick="urutkan(this)">
                    <option value="0">Tanggal</option>
                    <option value="1">Waktu</option>
                    <option value="2">Lokasi</option>
                    <option value="3">suhu</option>
                </select>
                <input type="submit" value="Urutkan">
            </td>
        </table>
    <br>
        <table border="1" align="center" width="50%" height="40%">
            <td>
                <table align="center" border="1" width="80%" id="myTable">
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi Yang Dikunjungi</th>
                        <th>suhu</th>
                    </tr>
                    <?php
                    while(($row = fgets($file)) !=false){
                        $col = explode(',',$row);
                        foreach($col as $data){
                            echo "<td>". trim($data)."</td>";
                        }
                    }
                    ?>

                </table>
            </td>
        </table>  
        <script src="main.js"></script>  
    </body>
</html>