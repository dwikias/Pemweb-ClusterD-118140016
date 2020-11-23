<?php 
    require 'functions.php';
 
     $mhs = query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data</title>
    <style>
        table{
            text-align: center;
        }
    </style>
</head>
<body>
   <button><a href="main.php">Tambah Data</a></button>
    
    <table border="1px" celpadding="10px" cellspacing="0px">
        <tr>
            <th>NRP</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Jurusan</th>
        </tr>
        <?php foreach($mhs as $m){ ?>
        <tr>
            <td><?php echo $m['nrp'];?></td>
            <td><?php echo $m['nama'];?></td>
            <td><img src="img/<?php echo $m['foto'];?>" width="150"></td>
           
            <td><?php echo $m['id_jur'];?></td>
            
        </tr>
        <?php }?>
    </table>

</body>
</html>
