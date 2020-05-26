<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Siliwangi Food Market</title>
    <link href="images/foodcourt.png" rel="shortcut icon">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
	<?php
		session_start();
		$koneksi = new mysqli("localhost", "root", "", "sfm");
		$detailorder = $_REQUEST['id_order'];
		$query_detailorder  mysqli_query("SELECT DATE(tgl_pembelian) AS tgl_pembelian, id_order, jumlah, petugas.nama AS petugas FROM tb_petugas join tb_pembelian using (id_pelanggan) 
        WHERE id_order like '%$detailorder%'");
		$row = mysqli_fetch_assoc($query_detailorder);
	?>
  <body  onload="window.print()">

	<h4 align="left">Siliwangi Food Market</h4>
	<h4 align="left">Jln Siliwangi Tasikmalaya</h4>
	<h4 align="left">No TLP : 081224234333 </h4>
	<pre><h4 align="left">No. Order : <?php echo $row['id_order']; ?>			Tanggal : <?php echo $row['tgl_pembelian']; ?></h4></pre>
	<h4 align="left"></h4>
	<hr style="border-bottom:1px dashed #00f;">
	
					    <?php
							$no = 0;
							$query_belanja = $koneksi->query("SELECT nama_makanan, kuantitas, harga, total FROM tb_menumakanan JOIN tb_detail_pembelian USING (id_makanan) WHERE id_order = '$detailorder'");							
							while ($row2 = mysqli_fetch_assoc($query_belanja)) {
								++$no;
							?>
					      
					        
					        <h4><?php echo $row2['nama_makanan']; ?></h4>
					        <pre><h4><?php echo $row2['kuantitas']; ?>		<?php echo "Rp. "; echo number_format($row2['harga'],0,',','.'); ?>		<?php echo "Rp. "; echo number_format($row2['total'],0,',','.'); ?></h4></pre>
					        <h4></h4>				       
					      
					      <?php
					   		}
					       ?>
					  <hr style="border-bottom:1px dashed #00f;">
					  <h4 align="right" style="border: 1px">Jumlah  : <?php echo "Rp. "; echo number_format($row['jumlah'],0,',','.'); ?></h4>
					  <hr style="border-bottom:1px dashed #00f;">
					  <h4 align="left">TERIMAKASIH PELANGGAN SETIA</h4>
					  <h4 align="left">KAMI TUNGGU ANDA UNTUK BELANJA KEMBALI</h4>
	     
  </body>
</html>