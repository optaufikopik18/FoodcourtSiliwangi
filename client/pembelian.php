<?php
    $kode = $_GET['id_order'];
    
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Pembayaran
                            </h2>
                            
                        </div>
                        <div class="body">
                        <form action="client/add_pembelian.php" name="pemb" id="pemb" method="post" >

 <div class="row clearfix">
        <div class="body">
                    <div class="col-md-2">
                        <input id="uid" name="uid" placeholder="Tap Kartu"
                        class="form-control uid" onkeyup="isi_otomatis()" readonly  />
                        <input type="hidden" name="id_pelanggan" id="id_pelanggan" class="form-control" 
                        placeholder="Id Pelanggan" />
                    </div>

                    
                    <div class="col-md-2">
                        <input type="text" name="nama" id="nama"  class="form-control" 
                        placeholder="Nama Pelanggan" readonly/>
                        <input type="hidden" name="jenis" value="Belanja" class="form-control" 
                         readonly/>
                    </div>

                    <div class="col-md-1">
                        SALDO : 
                    </div>

                    <div class="col-md-2">
                        <input type="text" id="saldo" value=" <?=number_format($saldo) ?>" name="saldo" class="form-control" 
                        placeholder="Nama" required readonly/>
                        <input type="hidden" name="nohp" id="nohp"  class="form-control" 
                        placeholder="No Hp" readonly/>
                    </div>
        </div>
                
</div>
                               <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Makanan</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Kuantitas</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            <?php

                                                $no= 1;
                                                $jml = 0;

                                                $sql = $koneksi->query("select * from tb_detail_pembelian p
                                                    inner join tb_menumakanan m on p.id_makanan=m.id_makanan
                                                    where p.id_order not in (select id_order from tb_pembelian)   ");

                                                while ($data = $sql->fetch_assoc()) { $jml = $jml + $data['total'];
                                                    # code...
                                                

                                            ?>



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="images/<?php echo $data['foto'] ?>" width="50" heigth="50" alt=""></td>
                                            <td><?php echo $data['nama_makanan'] ?></td>
                                            <td><?php echo $data['kategori'] ?></td>
                                            <td><?php echo number_format($data['harga']) ?> 
                                            <input type="hidden" name="id<?php echo $no; ?>" value="<?=$data['id_makanan']?>"  >   
                                            <input type="hidden" name="hrg" value="<?=$data['harga']?>" id="hrg<?php echo $no; ?>" >
                                             </td>
                                            <td style="padding-left:20px;">
                                                  <div class="form-group">
                                                  <input type="text" name="kuantitas<?php echo $no; ?>" id="kuantitas<?php echo $no; ?>" onkeyup="sum('<?php echo $no; ?>')" 
                                                  autocomplete="off" class="form-control" value="<?=$data['kuantitas']?>" autofocus required/>
                                                  
                                                  </div>
                                            </td>

                                            <td style="padding-left:20px;">                 
                                                  <input type="text" name="total<?php echo $no; ?>" value="<?=$data['total']?>" id="total<?php echo $no; ?>" autocomplete="off" 
                                                  class="form-control" style="background-color: #e7e3e9;" readonly />
                                                          
                                            </td>
                                            <td>

                                                <a href="client/del_chart.php?id=<?=$data['id_order']?>&idm=<?=$data['id_makanan']?>" 
                                                onclick="return confirm('Apakah Anda Yakin Membatalkan Pesanan Ini .... ?')">
                                                <input type="button" name="simpan" value="Batalkan" class="btn-danger"></a>
                                            </td>    
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>  

                                            <input type="hidden" name="no" value="<?=$no?>"  > 
                                            <h2> <font color="red">Total Bayar : Rp. <?=number_format($jml)?> ,-</font></h2> 
                                            <input class="form-control" style="width:20%;" type="hidden" id="saldoku" name="saldoku" value="" > <br>
                                            <input class="form-control" style="width:20%;" type="hidden" id="hargabayar" name="hargabayar" value="<?=($jml)?>" > 
                                            SISA SALDO :  <br>
                                            <input class="form-control" style="width:20%;" type="text" id="sisa_saldo" name="sisa_saldo" required readonly value="" >

                                            <br><br>
                                            <?php if($no>0){ ?>
                                            <input type="submit" name="bayar" value="Bayar" class="btn btn-primary" style="width:20%;">
                                            <?php } ?>
                                </form>
                                </div>

                                <script type="text/javascript"> 
                                function sum(xy){
                                     var qty,jml,tot ;
                                     var tmp;
                                     tmp = xy
                                     qty = document.getElementById('kuantitas'+tmp).value;
                                     jml = document.getElementById('hrg'+tmp).value;
                                     tot = parseInt(qty)*parseInt(jml);
                                     document.getElementById('total'+tmp).value = tot.toString();
                                }
                                </script>
                                <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
                                  <script>
                                    var socket = io.connect('http://localhost:8888');

                                        socket.on('data', function(uid) {
                                          $(".uid").val(uid.data);
                                          isi_otomatis();
                                        });
        
                                </script>
                                <script type="text/javascript">
                                    function isi_otomatis(){
                                        var uid= $("#uid").val();
                                        var nominal;
                                        var sisa;
                                        //     nominal = document.getElementById('nominal').value;
                                            nominal = document.getElementById('hargabayar').value;
                                            // alert(nominal);

                                        $.ajax({
                                            url: "page/transaksi/uidtransaksi.php",
                                            data:"uid="+uid ,
                                        }).success(function (data) {
                                            var json = data,
                                            obj = JSON.parse(json);
                                            $("#id_pelanggan").val(obj.id_pelanggan);
                                            $("#nama").val(obj.nama);
                                            $("#saldo").val(obj.saldo);
                                            $("#saldoku").val(obj.nominal);
                                            $("#nohp").val(obj.nohp);

                                            if(parseInt(obj.nominal) < parseInt(nominal)){
                                                alert('Saldo kurang !!');
                                                $("#sisa_saldo").val('');
                                            }else{
                                                sisa = parseInt(obj.nominal)-parseInt(nominal);
                                                $("#sisa_saldo").val(sisa.toString());
                                            }

                                        });
                                    }
                                </script>
                                <?php
                                if (!empty($_GET['nama'])) {
                                    $nama = $_GET['nama'];
                                if ($nama == 'kosong') {
                                ?>
                                    <script type="text/javascript">
                                        alert("Pembayaran Gagal !! Tap kartu terlebih dahulu !!");
                                        window.location.href="?page=pembelian";
                                    </script> 
                                <?php 
                                if ($saldo < $sisa_saldo) {
                                    ?>
                                    <script type="text/javascript">
                                                alert("Maaf, Saldo tidak mencukupi");
                                                window.location.href="?page=transaksi&aksi=tambah";
                                            </script>
                                    <?php 
                                    }
                                }
                            }


                            if (!empty($_GET['saldo'])) {
                                    $nama = $_GET['saldo'];
                                if ($nama == 'kosong') {
                                ?>
                                    <script type="text/javascript">
                                        alert("Pembayaran Gagal !! Saldo kurang !!");
                                        window.location.href="?page=pembelian";
                                    </script> 
                                <?php 
                                }
                            }
                        ?>