<?php
    $koneksi = new mysqli("localhost", "root", "", "sfm");

    $conn = new mysqli("localhost", "root", "", "sms");

    $id = mysqli_query($koneksi,"select coalesce(max(id_order),0)+1 as id from tb_pembelian");
    $tmp = mysqli_fetch_assoc($id);
    $id_new = $tmp['id'];

 //   echo $id_new;

    $id_order = $id_new;
    $id_makanan = $_POST['id'];
    $harga = $_POST['hrg'];
    $kuantitas = $_POST['kuantitas'];
    $total = $_POST['total'];

    echo $id_makanan."<br>";
    echo $harga."<br>";
    echo $kuantitas."<br>";
    echo $total."<br>";

    $cari = mysqli_query($koneksi,"select * from tb_detail_pembelian where id_makanan='$id_makanan' and id_order='$id_order'");
    if(mysqli_num_rows($cari)>0){
        mysqli_query($koneksi,"update tb_detail_pembelian set kuantitas=kuantitas+$kuantitas, total=total+$total where id_makanan='$id_makanan' and id_order='$id_order' ");
    }else{
        mysqli_query($koneksi,"insert into tb_detail_pembelian values('$id_order','$id_makanan','$harga','$kuantitas','$total') ");
    }

     header('location:http://localhost/skripsi/index.php?page=pembelian');
?>