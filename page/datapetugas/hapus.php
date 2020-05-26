<?php
	
	$kode = $_GET['id'];
	$sql = $koneksi -> query("delete from tb_petugas where id_petugas ='$kode'");
 

    if (sql) {
    	# code...
    

    ?>

    <script type="text/javascript">
						alert("Data Berhasil Dihapus");
						window.location.href="?page=datapetugas";
					</script>

    <?php

 }
?>