<!DOCTYPE html>
<html>
    <head>
        <title>Tugas 1</title>
    </head>
    <body>
       <div class="header">
       <h2>Menghitung Faktorial</h2>
        <form method="post" action="">
	        <input type="text" name="faktorialial" placeholder="Masukan bilangan">
	        <button type="submit" name="hitung">Hitung Angka</button><br>
        </form>

        <?php 
            function faktorial($x){
            $angka = 1;
            $hasil = 1;
            while($angka <= $x){
                $hasil = $hasil * $angka;
                $angka= $angka+1;
            }
            return $hasil;
            }
            
            if(isset($_POST['hitung'])){
                $x = $_POST['faktorialial'];
                echo 'Faktorial dari'.' '.$x.' adalah '.faktorial($x);
            }
         ?>
        </div>

    </body>

</html>