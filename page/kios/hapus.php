<?php
	
	$kode = $_GET['id'];
	$sql = $koneksi -> query("delete from tb_kios where id_kios ='$kode'");
 

    if (sql) {
    	# code...
    

    ?>

    <script type="text/javascript">
						alert("Data Berhasil Dihapus");
						window.location.href="?page=datakios";
					</script>

    <?php

 }
?>