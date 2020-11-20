
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS praktikum 2 KAKULAKTOR</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <div class="header">
        <h2 class="title">Ayo Menghitung Gaes</h2>
        <form method="post" action=""> 
            <input type="text" name="bil1" class="bil" placeholder=" Masukkan Bilangan 1" required/>
            <input type="text" name="bil2" class="bil" placeholder="Masukkan Bilangan 2" required/>
            <select class="oprs" name="operasi">
                <option value="pilih">Pilih</option>
                <option value="kali">x</option>
                <option value="bagi">/</option>
                <option value="tambah">+</option>
                <option value="kurang">-</option>
                <option value="modulo">%</option>
            </select>
            <input type="submit" name="hitung" value="Hitung" class="tombol" /> 
            <a href="./" style="text-decoration:none;">  
</form>

<?php 
        if(isset($_POST['hitung'])){
            $bil1      =$_POST['bil1'];
            $bil2      =$_POST['bil2'];
            $operasi    =$_POST['operasi'];
        
            switch ($operasi) {
                case 'kali':
                $hasil = $bil1*$bil2;
                break;
                case 'bagi':
                $hasil = $bil1/$bil2;
                break; 
                case 'tambah':
                $hasil = $bil1+$bil2;
                break;
                case 'kurang':
                $hasil = $bil1-$bil2; 
                break;
                case 'modulo' : 
                $hasil  =   $bil1%$bil2;
                break;
                 
            }
        }
    ?>
	   </form>
        <?php if(isset($_POST['hitung'])){
            
        ?> 
           <input type="text" value="<?php echo $hasil; ?>" style="text-align: center;"/>
        <?php
        }
        else{
        ?>
            <input type="text" value="0"/>
        <?php
        }
        ?> 
    </div>
	
	</body>
</html>
