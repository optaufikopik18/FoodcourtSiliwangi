<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PETUGAS 
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST">


                            <label for="">Nama</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input autofocus type="text" name="nama" class="form-control" placeholder="Nama" 
                                            onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" 
                                            required />
                                        </div>
                            </div>

                             <label for="">No Hp</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nohp" class="form-control" placeholder="No HP" 
                                            onKeyPress="return goodchars(event,'1234567890',this)" required />

                                        </div>
                            </div>

                            <label for="">Hak Akses</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="hak_akses" class="form-control show-tick" required>
                                        <option value="" >-- Pilih --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Petugas Kios">Petugas Kios</option>
                                    </select>
                                    	</div>
                            </div>

                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=datapetugas'" class="btn-success">
                            
                             </form>

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
        $sql = $koneksi -> query("SELECT max(id_petugas) FROM tb_petugas");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 3);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_petugas = "PT-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $id_petugas = "PT-001";
}

		if (isset($_POST['simpan'])) {
			
			$nama = $_POST['nama'];
			$nohp = $_POST['nohp'];
			$hak_akses = $_POST['hak_akses'];


			
      $sql3 = $koneksi->query("select nohp from tb_petugas where nohp='$nohp'");
			
      if($sql3->num_rows > 0) {
        ?>
          <script type="text/javascript">
            alert("Simpan Gagal !! No Hp sudah ada yang pakai, silahkan coba lagi !!");
            window.location.href="?page=datapetugas&aksi=tambah";
          </script>
        <?php 
        }else {
          ?>
          <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href="?page=datapetugas";
          </script>
        <?php 
        $sql2 = $koneksi -> query("insert into tb_petugas values('$id_petugas','$nama','$nohp','$hak_akses')");
        }
			
		}

?>

