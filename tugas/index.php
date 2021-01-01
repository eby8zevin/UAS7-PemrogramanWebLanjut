<?php
session_start();

include 'date.php';
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Full Width Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <style>
    .div-1 {
        background-color: #FFFFFF;
    }
    .scroll {
        overflow-y: scroll;
    }
    </style>
    
</head>
<body style="background-color:#696969;" class="scroll">

<?php include 'navbar.php'; ?>

<a href="http://stmik-yadika.ac.id/" target="_blank">
<img src="http://stmik-yadika.ac.id/theme/images/logobesar.png" alt="STMIK YADIKA BANGIL" title="STMIK YADIKA BANGIL" width="20%" height="20%" style="display: block; margin: auto;"></a>
    
<section class="konten" style="padding-bottom:20px;">
	<div class="container">
		<h3 style="color:#FFFFFF; padding-bottom: 10px;">Buku Tamu
		<a href="print.php" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print</a>
		<a href="api-view.php" class="btn btn-danger"><span class="glyphicon glyphicon-fire"></span> API</a>
		<a href="tambahdata.php" class="btn btn-primary" style="float: right;">Tambah Data</a>
		</h3>
		
		<?php
$perhalaman = 5;
$data = mysqli_query($koneksi, "SELECT * FROM tugas_data");
$jum = mysqli_num_rows($data);
$halaman = ceil($jum / $perhalaman);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $perhalaman;
?>
		
            <table class="table table-bordered" class="table table-responsive" style="background-color:#FFFFFF;">
        	<thead>
        		<tr>
        			<th style="text-align: center;">No</th>
        			<th style="text-align: center;">NIM</th>
        			<th style="text-align: left;">Nama</th>
        			<th style="text-align: left;">Alamat</th>
        			<th style="text-align: center;">TTL</th>
        			<th style="text-align: center;">Status</th>
        		<?php if (isset($_SESSION["tugas"])): ?>
        			<th style="text-align: center;">Opsi</th>
        		<?php
else: ?>
        		<?php
endif ?>
        		
        		</tr>
        	</thead>
        	<tbody>
        	    
        	    <?php $nomor = $start + 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM tugas_data ORDER BY nim_data LIMIT $start,$perhalaman"); ?>
                <?php while ($pecah = $ambil->fetch_assoc())
{ ?>
        		
        		<tr>
        			<td style="text-align: center;"><?php echo $nomor; ?></td>
        			<td style="text-align: center;"><?php echo $pecah['nim_data']; ?></td>
        			<td><?php echo $pecah['nama_data']; ?></td>
        			<td><?php echo $pecah['alamat_data']; ?></td>
        			<td style="text-align: center;">
        				<?php $source = $pecah['ttl_data'];
    $date = new DateTime($source);
    echo $date->format('d - m - Y'); ?>
        			</td>
        			<td style="text-align: center;">
        			    <?php echo $pecah['status_data']; ?>
        			</td>
        			
        			<?php if (isset($_SESSION["tugas"])): ?>
        			<td style="text-align: center;">
        				<a href="hapusdata.php?hapusdata&id=<?php echo $pecah['id_data']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus nama <?php echo $pecah['nama_data']; ?> ?')" class="btn-danger btn">Hapus</a>
        				<a href="ubahdata.php?ubahdata&id=<?php echo $pecah['id_data']; ?>" class="btn btn-warning">Edit</a>
        			</td>
        			<?php
    else: ?>
        			<?php
    endif ?>
        		</tr>
        		
        		<?php $nomor++; ?>
        		<?php
} ?>
        	</tbody>
        </table>
        
        <!-- start koding nomor halaman-->
        <div class="col-md-12" align="center">
            <ul class="pagination">
                <div class="div-1">
                    <?php echo "<p>Total Tamu : <b>$jum</b> Orang</p>"; ?>
                </div>
            <?php if ($page > 1)
{ ?>
                <li>
                    <a href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
}
else
{ ?> <li class="disabled">
                    <a href="?page=<?php echo $page; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                </li> <?php
} ?>
                <?php
for ($x = 1;$x <= $halaman;$x++)
{
    if ($page == $x)
    {
        $ini = "active";
    }
    else
    {
        $ini = "";
    }
?>
                <li class="<?php echo "$ini"; ?>"><a href="?page=<?php echo "$x"; ?>"><?php echo "$x"; ?></a></li>
                <?php
} ?>
                <li>
                    <a href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
        
	</div>
</section>

<?php include 'footer.php' ?>

<div id="myModal" class="modal fade" role="dialog"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Joki WEB? SCAN QR Code!</h4>
            </div>
            <div class="modal-body">
                <p><img src="2174bd.png" width="50%" height="50%" style="display: block; margin: auto;"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    $('#myModal').modal('show');
</script>

</body>
</html>
