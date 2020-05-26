<?php
    $koneksi = new mysqli("localhost", "root", "", "sfm");

    $conn = new mysqli("localhost", "root", "", "sms");

    $id = $_GET['id'];
    $id_makanan = $_GET['idm'];

    mysqli_query($koneksi,"delete from tb_detail_pembelian where id_makanan='$id_makanan' and id_order='$id' ");

     header('location:http://localhost/skripsi/index.php?page=pembelian');
?>