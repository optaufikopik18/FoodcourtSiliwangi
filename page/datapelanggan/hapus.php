<?php
	
	$kode = $_GET['id'];
	$sql = $koneksi -> query("delete from tb_pelanggan where id_pelanggan ='$kode'");
 

    if (sql) {
    	# code...
    

    ?>

    <script type="text/javascript">
						alert("Data Berhasil Dihapus");
						window.location.href="?page=datapelanggan";
					</script>

    <?php

 }