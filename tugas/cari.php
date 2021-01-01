<?php
session_start();

include 'date.php';
include 'koneksi.php';

$cari = $_GET["cari"];
$semuadata = array();

$ambil = $koneksi->query("SELECT * FROM tugas_data 
				WHERE nim_data 
				LIKE '%$cari%' 
				OR nama_data 
				LIKE '%$cari%'");
while ($pecah = $ambil->fetch_assoc())
{
    $semuadata[] = $pecah;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    
    <style>   
    	@media print
    	{
    	.noprint {display:none;}
    }
	</style>
	
</head>
<body>
<body style="background-color:#696969;">

<?php include 'navbar.php'; ?>

<section class="konten">
	<div class="container">
	    
	    <ul class="text-right">
            <div class="noprint">
	            <a href="">
    	            <button onClick="window.print();" class="btn btn-info btn-sm">
    		        Cetak <span class="glyphicon glyphicon-print"></span>
    	            </button>
	            </a>
            </div>
        </ul>
        
        <img src="http://stmik-yadika.ac.id/theme/images/logobesar.png" alt="STMIK YADIKA BANGIL" title="STMIK YADIKA BANGIL" width="30%" height="30%" style="display: block; margin: auto;">
        
		<h3 style="padding-bottom: 10px; color:#FFFFFF;">Hasil Pencarian : <?php echo $cari ?></h3>
		 
		<?php if (empty($semuadata)): ?>
		<div class="alert alert-danger">Data <strong><?php echo $cari ?></strong> tidak ditemukan.</div>
	    <?php
endif ?>
            <table class="table table-bordered" style="background-color:#FFFFFF;">
        	<thead>
        		<tr>
        			<th style="text-align: center;">No</th>
        			<th style="text-align: center;">NIM</th>
        			<th style="text-align: left;">Nama</th>
        			<th style="text-align: left;">Alamat</th>
        			<th style="text-align: center;">TTL</th>
        			<th style="text-align: center;">Status</th>
        		</tr>
        	</thead>
        	
        	<tbody>
        		<?php $nomor = 1; ?>
        		<?php foreach ($semuadata as $key => $value):
    { ?>
        		<tr>
        			<td style="text-align: center;"><?php echo $nomor; ?></td>
        			<td style="text-align: center;"><?php echo $value['nim_data']; ?></td>
        			<td><?php echo $value['nama_data']; ?></td>
        			<td><?php echo $value['alamat_data']; ?></td>
        			<td style="text-align: center;">
        				<?php $source = $value['ttl_data'];
        $date = new DateTime($source);
        echo $date->format('d - m - Y'); ?>
        			</td>
        			<td style="text-align: center;">
        			    <?php echo $value['status_data']; ?>
        			</td>
        			
        		</tr>
        		<?php $nomor++ ?>
        		<?php
    } ?>
        		<?php
endforeach ?>
        		
        	</tbody>
            </table>
	</div>
</section>
</body>
</html>
