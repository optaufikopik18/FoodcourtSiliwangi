 <?php

    $kode = $_GET['id'];

    $sql = $koneksi -> query("select * from tb_petugas where id_petugas ='$kode'");
    $tampil = $sql -> fetch_assoc();

    $hak_akses = $tampil['hak_akses'];

 ?>




 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PETUGAS 
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST">

                            <label for="">Nama</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" value= "<?php echo $tampil['nama']; ?>
                                            " class="form-control" placeholder="Nama" 
                                            onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)"
                                            required /> 
                                        </div>
                            </div>

                             <label for="">Alamat</label>

                             <label for="">No Hp</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nohp" placeholder="No HP"  value= "<?php echo $tampil['nohp']; ?>
                                            " class="form-control" placeholder="No Hp" 
                                            onKeyPress="return goodchars(event,'1234567890',this)" required />
                                        </div>
                            </div>

                            <label for="">Hak Akses</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="hak_akses" class="form-control show-tick" required>
                                        <option value="Admin" <?php if ($hak_akses=='Admin') {echo "selected"; } ?>>Admin</option>
                                        <option value="Petugas Kios" <?php if ($hak_akses=='Petugas Kios') {echo "selected"; } ?>>Petugas Kios</option>
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
		if (isset($_POST['simpan'])) {
			
			$id_petugas = $_POST['id_petugas'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$nohp = $_POST['nohp'];
			$hak_akses = $_POST['hak_akses'];

          
			


			$sql3 = $koneksi->query("select nohp from tb_petugas where nohp='$nohp'");
            
      if($sql3->num_rows > 0) {
        ?>
          <script type="text/javascript">
            alert("Ubah Gagal !! No Hp sudah ada yang pakai, silahkan coba lagi !!");
            window.location.href="?page=datapetugas&aksi=ubah";
          </script>
        <?php 
        }else {
          ?>
          <script type="text/javascript">
            alert("Data Berhasil Diubah");
            window.location.href="?page=datapetugas";
          </script>
				<?php 
                $sql2 = $koneksi -> query("update tb_petugas set nama='$nama',
                nohp='$nohp', hak_akses='$hak_akses' where id_petugas='$kode'");
			}
		}

?>

