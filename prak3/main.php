<?php
    require 'functions.php';
    if(isset($_POST['submitI'])){
        if(insert($_POST) > 0){
            echo "
                <script>
                    alert ('Data Berhasil Ditambahkan!');
                </script>
            ";
        } else{
            echo "
            <script>
                alert ('Data Gagal Ditambahkan!');
            </script>
            ";
        }
    }
    if(isset($_POST['submitS'])){
        $keyword = $_POST['namaS'];
        echo '<script> document.location.href = "tampilData.php?nama=' . $keyword . '";</script>';
    }
    if(isset($_POST['submitD'])){
        if(delete($_POST) > 0){
            echo "
                <script>
                    alert ('Data Berhasil Dihapus!');
                </script>
            ";
        } else{
            echo "
            <script>
                alert ('Data Gagal Dihapus!');
            </script>
            ";
        }
    }
?>




<h1>DATA MAHASISWA PENS</h1>
<p>============================</p>
<h1>TAMBAH DATA</h1>

<form action="tampilData.php" method="POST" enctype="multipart/form-data">
    <label for="nrpI">NRP:</label>
    <input type="text" name="nrpI" id="nrpI" required><br>
    <label for="nameI">Nama:</label>
    <input type="text" name="namaI" id="nameI" required><br>
    <label for="gambarI">Foto:</label>
    <input type="file" name="picI" id="gambarI" required><br>
    <label for="jurusanI">Jurusan:</label>
    <select name="jurusanI" id="jurusanI">
        <option value="if">Teknik Informatika</option>
        <option value="el">Teknik Elektro</option>
        <option value="si">Teknik Sipil</option>
        <option value="gl">Teknik Geologi</option>
        <option value="gt">Teknik Geomatika</option>
        <option value="tg">Teknik Geofisika</option>
    </select><br>
    <button type="submit" name="submitI">Tambah</button>
</form>
<p>============================</p>
<h1>SEARCH DATA</h1>
<form action="" method="POST">
    <label for="nameS">Nama:</label>
    <input type="text" name="namaS" id="nameS" required>
    <button type="submit" name="submitS">Cari Data</button>
</form>
<p>============================</p>
<h1>HAPUS DATA</h1>
<form action="" method="POST">
    <label for="nrpD">NRP:</label>
    <input type="text" name="nrpD" id="nrpD" required>
    <button type="submit" name="submitD" onclick="return confirm('Yakin ingin menghapus data?')">Hapus Data</button>
</form>
<p>============================</p>