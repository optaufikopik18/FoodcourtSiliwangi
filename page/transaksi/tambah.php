<?php
    $sql = $koneksi->query("select * from tb_pengguna where id='$user' ");

    $data2 = $sql->fetch_assoc();


?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA TRANSAKSI
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST">

                            <label for="">Uid</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <input id="uid" name="uid" placeholder="Tap Kartu"
                                    style="background-color: #e7e3e9;" class="form-control uid" onkeyup="isi_otomatis()" readonly  />
                                </div>
                            </div>


                            <label for="">Id Pelanggan</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" 
                                             placeholder="Id Pelanggan" readonly style="background-color: #e7e3e9;" required/>
                                        </div>
                            </div>

                              <label for="">Nama</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" id="nama"  class="form-control" 
                                             placeholder="Nama Pelanggan" readonly style="background-color: #e7e3e9;" />
                                        </div>
                            </div>

                             <label for="">Saldo</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="saldo" id="saldo" class="form-control" 
                                            placeholder="Saldo" readonly style="background-color: #e7e3e9;"  />
                                            <input type="hidden" name="nohp" id="nohp" class="form-control" 
                                            placeholder="nohp" readonly style="background-color: #e7e3e9;"  />
                                        </div>
                            </div>

                            

                            <label for="">Jenis Transaksi</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="jenis" class="form-control show-tick" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Tarik">Tarik</option>
                                        <option value="Tambah">Tambah</option>
                                    </select>
                                    	</div>
                            </div>

                            <label for="">Nominal</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="nominal" class="form-control" placeholder="Nominal" 
                                            onKeyPress="return goodchars(event,'1234567890',this)" required  />
                                        </div>
                            </div>

                             <label for="">Id Petugas</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" name="id_petugas" class="form-control" value= "<?php echo $data2['id_petugas'];?>"
                                            readonly style="background-color: #e7e3e9;" />
                                        </div>
                            </div>

                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=transaksi'" class="btn-success">
                             </form>
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
                $.ajax({
                    url: "page/transaksi/uidtransaksi.php",
                    data:"uid="+uid ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $("#id_pelanggan").val(obj.id_pelanggan);
                    $("#nama").val(obj.nama);
                    $("#saldo").val(obj.saldo);
                    $("#nohp").val(obj.nohp);
                });
            }
        </script>

 <script language="javascript">

function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
<?php
//$conn = new mysqli("localhost", "root", "", "sms");
        if (isset($_POST['simpan'])) {

            $result = array('success' => false, 'messages' => array());
            
            $id_pelanggan = $_POST['id_pelanggan'];
            $nama = $_POST['nama'];
            $nominal = $_POST['nominal'];
            $jenis = $_POST['jenis'];
            $nohp = $_POST['nohp'];
            $id_petugas = $_POST['id_petugas'];

            if ($nama == NULL) {
                ?>
                    <script type="text/javascript">
                        alert("Simpan Gagal !! UID belum terdaftar !!");
                        window.location.href="?page=transaksi&aksi=tambah";
                    </script>
                <?php 
                }
            $saldo_awal = $koneksi -> query("SELECT saldo FROM tb_transaksi JOIN tb_pelanggan USING (id_pelanggan) 
                                        WHERE id_pelanggan = '$id_pelanggan' ORDER BY tgl_transaksi DESC LIMIT 1");
            $row = mysqli_fetch_assoc($saldo_awal);

            if ($jenis == 'Tambah') {      
      
      $sql2 = $koneksi -> query("SELECT MAX(id_transaksi)FROM tb_transaksi WHERE SUBSTRING(id_transaksi, 1, 4) = 'TR01'");

      $datakode = mysqli_fetch_array($sql2);

      if ($datakode) {
        $nilaikode = substr($datakode[0], 5);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $id_transaksi = "TR01-".str_pad($kode, 4, "0", STR_PAD_LEFT);
      } else {
        $id_transaksi = "TR01-0001";
      }

        $saldo = empty($row['saldo']) ? $nominal : $row['saldo'] + $nominal;

        $query = $koneksi -> query("INSERT INTO tb_transaksi VALUES ('$id_transaksi', now(), '$id_pelanggan','$nama','$saldo', '$nominal', '$jenis', '$id_petugas')");
        
            if ($query) {
                ?>


                    <script type="text/javascript">
                        alert("Data Berhasil Disimpan");
                        window.location.href="?page=transaksi";
                    </script>
                <?php 
                }
        $conn -> query("INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$nohp', 'Terimakasih, Anda sudah melakukan 
            transaksi penambahan saldo sebesar Rp. ".number_format($nominal,0,',','.')." ,berhasil.', 'Gammu')");


        $result['success'] = true;
        $result['messages'] = "Transaksi pengisian saldo berhasil dilakukan.";

    } elseif ($jenis == 'Tarik') {

        if ($row['saldo'] < $nominal) {
            ?>
            <script type="text/javascript">
                        alert("Maaf, Saldo tidak mencukupi");
                        window.location.href="?page=transaksi&aksi=tambah";
                    </script>
            <?php 
        } else {

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

        $saldo = $row['saldo'] - $nominal;
            

            $query2 = $koneksi -> query("INSERT INTO tb_transaksi VALUES ('$id_transaksi', now(), '$id_pelanggan', '$nama', '$saldo', '$nominal', '$jenis', '$id_petugas')");
             if ($query2) {
                ?>


                    <script type="text/javascript">
                        alert("Data Berhasil Disimpan");
                        window.location.href="?page=transaksi";
                    </script>
                <?php 
                }
            $conn -> query("INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('$nohp', 'Terimakasih, Anda telah melakukan
                transaksi penarikan saldo sebesar Rp. ".number_format($nominal,0,',','.')." ,berhasil.', 'Gammu')");

        }

        }

    }

        
?>




