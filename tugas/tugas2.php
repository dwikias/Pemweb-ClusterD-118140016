<!DOCTYPE html>
<html>
    <head>
        <title>Tugas 2</title>
    </head>
    <body>
        <div class="header">
            <h2>Menghitung Harga Bet Nama</h2>
           <form action="" method="POST">
               <input type="text" name="nama" placeholder="Masukan nama">
               <select  name="warna" >
                <option value="red">merah</option>
                <option value="yellow">kuning</option>
                <option value="blue">biru</option>
                <option value="black">hitam</option>
            </select>
               <input type='submit' name='submit'>
           </form>

           <?php

            function betNama ($nama){
                $teks = str_replace(' ', '', $nama); //menghilangkan spaci
                if (strlen($teks) <= 10){
                    $harga = strlen($teks)*300;
                } else if (strlen($teks) > 10 && strlen($teks) <= 20) {
                    $harga = strlen($teks)*500;
                } else {
                    $harga = strlen($teks)*700;
                }
                return $harga;
            }

            function warna($color="red",$nama){
                echo 'Nama dan Warna : <font color="'.$color.'"> '.$nama.'</font>';
            }

            if(isset($_POST['submit'])){
                $nama = $_POST['nama'];
                $warna = $_POST['warna'];
                
                switch($warna){
                    case 'red' :
                        warna('red',$nama);
                    break;
                    case 'blue' :
                        warna('blue',$nama);
                    break;
                    case 'yellow':
                        warna('yellow',$nama);
                    break;
                    case 'black' :
                        warna('black',$nama);
                    break;
                    default :
                        warna('',$nama);
                }
                echo "<br>";
                echo "Harga Bet Nama : Rp.".betNama($nama);
            }
            ?>
        </div>
    </body>  
</html>