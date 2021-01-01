<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['tugas']))
{
    echo "<script>alert('Anda harus login!');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="jquery-ui.css">
    <script src="jquery-1.12.4.js"></script>
    <script src="jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#date" ).datepicker({
        dateFormat: "yy-mm-dd"
        });
    } );
    </script>
    
    <!--dropdown button-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="navbar">
         <div class="container">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Master Data
                            </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="index.php">Mahasiswa</a>
                            <a class="dropdown-item" href="#">Dosen</a>
                                <a class="dropdown-item" href="#">Mata Kuliah</a>
                            </div>
                        </div>
                    </div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">Input Data
            <a href="index.php" class="btn btn-danger" role="button" style="float: right">Kembali</a>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nim">N I M : 117227...</label>
                        <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM. . ." required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama. . ." required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat. . ." required>
                    </div>
                    
                    <div class="form-group">
                        <label for="date">T T L</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD">
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option disabled="" selected="">-Pilih-</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Mata Kuliah">Mata Kuliah</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>
                
<?php

if (isset($_POST['simpan']))
{
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['date'];
    $status = $_POST['status'];

    $ambil = "SELECT * FROM tugas_data WHERE nim_data='$nim'";
    $cek = mysqli_query($koneksi, $ambil);
    if (mysqli_num_rows($cek) == 1)
    {
        echo "<script>alert('NIM sudah digunakan.')</script>";
        echo "<script>location='tambahdata.php'</script>";
    }
    else
    {
        mysqli_query($koneksi, "INSERT INTO tugas_data (nim_data, nama_data, alamat_data, ttl_data, status_data)
                            VALUES (
                                    '$nim',
                                    '$nama', 
                                    '$alamat',
                                    '$ttl', 
                                    '$status')");

        echo "<script>alert('Data berhasil disimpan.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php?datatersimpan=sukses'>";
    }
}

?>
                
            </div>
        </div>
    </div>
</body>
</html>
