
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PELANGGAN
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST">


                            <label for="">UID</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="uid" id="uid" class="form-control" placeholder="Tap Kartu" 
                                            style="background-color: #e7e3e9;" readonly required/>
                                        </div>
                            </div>


                             <label for="">Nama</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama" 
                                            onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)"
                                            required autofocus/>
                                        </div>
                            </div>

                             <label for="">No Hp</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nohp" class="form-control" placeholder="No HP" 
                                            onKeyPress="return goodchars(event,'1234567890',this)" required/>
                                        </div>
                            </div>

                            <label for="">Status Pelanggan</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="status" class="form-control show-tick" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                    	</div>
                            </div>
                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=datapelanggan'" class="btn-success">
                             </form>

<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
  <script>
    var socket = io.connect('http://localhost:8888');

    socket.on('data', function(uid) {
      $("#uid").val(uid.data);
    });
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
    $sql = $koneksi -> query("SELECT max(id_pelanggan) FROM tb_pelanggan");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 8);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_pelanggan = "PL-".date("y-").str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
  $id_pelanggan = "PL-".date("y-");"0001";
}
		


    if (isset($_POST['simpan'])) {
			
			$uid = $_POST['uid'];
			$nama = $_POST['nama'];
			$nohp = $_POST['nohp'];
			$status = $_POST['status'];
      $tgl_pembuatan = $_POST['tgl_pembuatan'];

      $sql2 = $koneksi->query("select uid from tb_pelanggan where uid='$uid'");
      $sql3 = $koneksi->query("select nohp from tb_pelanggan where nohp='$nohp'");

           if ($uid == NULL) {
            ?>
          <script type="text/javascript">
            alert("Simpan Gagal !! Masukan UID terlebih dahulu !!");
            window.location.href="?page=datapelanggan&aksi=tambah";
          </script>
        <?php 
        }

      else if ($sql2->num_rows > 0) {
        ?>
          <script type="text/javascript">
            alert("Simpan Gagal !! UID sudah ada yang pakai, silahkan coba lagi !!");
            window.location.href="?page=datapelanggan&aksi=tambah";
          </script>
        <?php 
        } 
         else if ($sql3->num_rows > 0) {
        ?>
          <script type="text/javascript">
            alert("Simpan Gagal !! No Hp sudah ada yang pakai, silahkan coba lagi !!");
            window.location.href="?page=datapelanggan&aksi=tambah";
          </script>
        <?php 
        }else {
          ?>
          <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href="?page=datapelanggan";
          </script>
        <?php 
        $sql4 = $koneksi -> query("insert into tb_pelanggan values('$id_pelanggan','$uid','$nama','$nohp','$status',NOW())");
        }

      
    }	

?>

