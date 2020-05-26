<?php
	
	$kode = $_GET['id'];
	$sql = $koneksi -> query("delete from tb_menumakanan where id_makanan ='$kode'");
 

    if (sql) {
    	# code...
    

    ?>

    <script type="text/javascript">
						alert("Data Berhasil Dihapus");
						window.location.href="?page=menumakanan";
					</script>

    <?php

 }
?>