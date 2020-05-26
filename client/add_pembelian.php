<?php

if(empty($_POST['nama'])){
    header('location:http://localhost/skripsi/index.php?page=pembelian&nama=kosong');
}else if(  $_POST['saldoku']<$_POST['hargabayar']  ){
     header('location:http://localhost/skripsi/index.php?page=pembelian&saldo=kosong');
}else{

    $koneksi = new mysqli("localhost", "root", "", "sfm");

    $conn = new mysqli("localhost", "root", "", "sms");

    $id = mysqli_query($koneksi,"select id_order as id from tb_detail_pembelian where id_order not in ( select id_order from tb_pembelian ) group by id_order");
    $tmp = mysqli_fetch_assoc($id);
    $id_new = $tmp['id'];

 //   echo $id_new;
    $n = $_POST['no'];
    $st = 2;
    $jml=0;

    while($st<=$n){

            $id_makanan = $_POST['id'.$st];
            $kuantitas = $_POST['kuantitas'.$st];
            $total = $_POST['total'.$st];

            echo $id_new;
            echo $id_makanan."<br>";
            echo $kuantitas."<br>";
            echo $total."<br><br>";
            $jml = $jml+$total;
            echo $jml;

            mysqli_query($koneksi,"update tb_detail_pembelian set kuantitas='$kuantitas',total='$total' where id_makanan='$id_makanan' and id_order='$id_new' ");

            $st++;
    }
    

    $sql3 = $koneksi -> query("SELECT MAX(id_transaksi)FROM tb_transaksi WHERE SUBSTRING(id_transaksi, 1, 4) = 'TR02'");

        $datakode = mysqli_fetch_array($sql3);

        if ($datakode) {
        $nilaikode = substr($datakode[0], 5);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $id_transaksi = "TR02-".str_pad($kode, 4, "0", STR_PAD_LEFT);
        } else {
        $id_transaksi = "TR02-0001";
        }

    $id_pelanggan = $_POST['id_pelanggan'];

//    mysqli_query($koneksi,"insert into tb_transaksi 
//    values((select coalesce(count(*),0)+1 from tb_transaksi),now(),(select id_pelanggan from tb_pelanggan where uid='".$_POST['id_pelanggan']."'),'".$_POST['nama']."','".$_POST['hargabayar']."','".$_POST['saldoku']."','Belanja','PT-001') ");

    mysqli_query($koneksi,"insert into tb_transaksi 
    values('$id_transaksi',now(),'".$_POST['id_pelanggan']."','".$_POST['nama']."','".$_POST['sisa_saldo']."','".$_POST['hargabayar']."','Belanja','PT-001') ");


    mysqli_query($koneksi,"insert into tb_pembelian values('$id_new','$id_pelanggan',now(),'$jml') ");

    header('location:http://localhost/skripsi/index.php?page=cetak');
}    
?>