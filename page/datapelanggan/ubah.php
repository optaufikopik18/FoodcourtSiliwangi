<?php

    $kode = $_GET['id'];

    $sql = $koneksi -> query("select * from tb_pelanggan where id_pelanggan ='$kode'");
    $tampil = $sql -> fetch_assoc();

    $status_pelanggan = $tampil['status_pelanggan'];

 ?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DATA PELANGGAN
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST">

                             <label for="">Nama</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)"
                                            value= "<?php echo $tampil['nama']; ?>
                                            "class="form-control" placeholder="Nama" required />
                                        </div>
                            </div>

                            <label for="">No Hp</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nohp" onKeyPress="return goodchars(event,'1234567890',this)"
                                            value= "<?php echo $tampil['nohp']; ?>" class="form-control" placeholder="No HP" required />
                                        </div>
                            </div>

                            <label for="">Status Pelanggan</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="status" class="form-control show-tick">
                                        <option value="Aktif" <?php if ($status=='Aktif') {echo "selected"; } ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?php if ($status=='Tidak Aktif') {echo "selected"; } ?>>Tidak Aktif</option>
                                    </select>
                                    	</div>
                            </div>

                            

                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=datapelanggan'" class="btn-success">
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
			
			$id_pelanggan = $_POST['id_pelanggan'];
			$nama = $_POST['nama'];
			$nohp = $_POST['nohp'];
			$status = $_POST['status'];
          

			$sql2 = $koneksi -> query("update tb_pelanggan set nama='$nama', nohp='$nohp', status='$status'
                    where id_pelanggan='$kode'");

			

			if ($sql2) {
				?>


					<script type="text/javascript">
						alert("Data Berhasil Diubah");
						window.location.href="?page=datapelanggan";
					</script>
				<?php 
				}
			
		}

?>

