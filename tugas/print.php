<?php
session_start();

include 'date.php';
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Print</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <style>   
    	@media print
    	{
    	.noprint {display:none;}
    }
	</style>
    
</head>
<body style="background-color:#696969;">
    
<?php include 'navbar.php'; ?>
    
<section class="konten" style="padding-bottom:20px;">
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
            
		<h3 style="color:#FFFFFF; padding-bottom: 10px;">Buku Tamu</h3>
		
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
                <?php $ambil = $koneksi->query("SELECT * FROM tugas_data"); ?>
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
        			
        		</tr>
        		
        		<?php $nomor++; ?>
        		<?php
} ?>
        	</tbody>
        </table>
	</div>
</section>
</body>
</html>
