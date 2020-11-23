<?php 
    $db = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    function query($query){
        global $db;
        $result = mysqli_query($db, $query); //Menginisasi variable result dengan data yang diminta query dari db
        $rows = []; //Membuat array kosong untuk menampung data hasil line 19-21
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row; //Menambahkan data ke dalam array rows
        }
        return $rows;
    }

    function insert($data){
        global $db;
        $nrp = htmlspecialchars($data['nrpI']);
        $nama = htmlspecialchars($data['namaI']);
        $gambar = upload();
        if(!$gambar){
            return false;
        }
        $jurusan = $data['jurusanI'];
        $queryInsert = "INSERT INTO mahasiswa VALUES ('$nrp', '$nama', '$gambar', '$jurusan')";
        mysqli_query($db, $queryInsert);
        return mysqli_affected_rows($db);
    }
    function upload(){
        $namaFile = $_FILES['picI']['name'];
        $tmpNama = $_FILES['picI']['tmp_name']; //Tempat penyimpanan sementara

        $ekstensiValid = array('jpg', 'jpeg', 'png');
        $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);
        if(!in_array($ekstensiGambar, $ekstensiValid)){
            echo "<script>alert('Ekstensi gambar yang anda upload tidak didukung')</script>";
            return false;
        }
        $namaBaru = uniqid().".".$ekstensiGambar;
        move_uploaded_file($tmpNama, "img/" . $namaBaru);
        return $namaBaru;
    }
    function delete($data){
        global $db;
        $nrp = htmlspecialchars($data['nrpD']);
        $queryNrp = "DELETE FROM mahasiswa WHERE nrp = '$nrp'"; //cari nrp
        mysqli_query($db, $queryNrp);
        return mysqli_affected_rows($db);
    }
    function searchNama($keyword){
        $querySearchN= "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%'";
        return query($querySearchN);
    }

    function searchJurusan($id_jur){
        $querySearchJur= "SELECT nama FROM jurusan WHERE id_jur = '$id_jur'";
        return query($querySearchJur);
    }
?>