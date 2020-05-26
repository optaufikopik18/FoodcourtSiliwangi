<?php
include '../../koneksi.php';

$uid = $_GET['uid'];

$sql = $koneksi->query("SELECT id_pelanggan, uid, nama, saldo, nohp, tgl_transaksi
                                      FROM tb_transaksi RIGHt JOIN tb_pelanggan USING (id_pelanggan, nama) 
                                      WHERE uid = '$uid' AND status = 'Aktif' ORDER BY tgl_transaksi DESC LIMIT 1");

$row = $sql->fetch_array();

      if ($row['saldo'] == NULL) {
            $row['saldo'] = 0;
        }
        $nominal = $row['saldo'];
        $row['saldo'] = 'Rp. '.number_format($row['saldo'],0,',','.');

$data = array(
            'id_pelanggan' => $row['id_pelanggan'],
            'nama' => $row['nama'],
            'saldo' => $row['saldo'],
            'nominal' => $nominal,
            'nohp' => $row['nohp'],);
 echo json_encode($data);
?>