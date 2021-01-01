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

$ambil = $koneksi->query("SELECT * FROM tugas_data WHERE id_data='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    
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
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">Edit Data
            <a href="index.php" class="btn btn-danger" role="button" style="float: right">Kembali</a>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nim">N I M</label>
                        <input type="number" class="form-control" id="nim" name="nim" value="<?php echo $pecah['nim_data']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $pecah['nama_data']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $pecah['alamat_data']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="date">T T L</label>
                        <input type="text" class="form-control" id="date" name="date" value="<?php echo $pecah['ttl_data']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="<?php echo $pecah['status_data']; ?>"><?php echo $pecah['status_data']; ?></option>
                            <option>&nbsp;</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Mata Kuliah">Mata Kuliah</option>
                             
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="ubah">Update</button>
                </form>
            </div>
        </div>
    </div>

<?php
if (isset($_POST['ubah']))
{
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['date'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE tugas_data SET nim_data='$nim', 
		                                             nama_data='$nama', 
		                                             alamat_data='$alamat',
		                                             ttl_data='$ttl',
		                                             status_data='$status'
		                                             WHERE id_data='$_GET[id]'");

    echo "<script>alert('Data berhasil diupdate.');</script>";
    echo "<script>location='index.php?update=sukses';</script>";
}
?>

</body>
</html>
