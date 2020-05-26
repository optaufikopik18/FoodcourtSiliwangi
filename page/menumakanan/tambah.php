<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH MENU MAKANAN 
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST" enctype="multipart/form-data">

                           <label for="">Id Kios</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <select id="id_kios" name="id_kios" onchange="changeValue(this.value)" 
                                    class="form-control show-tick" required>
                                    <?php
                                        echo "<option value=".''.">-- Pilih Kios --</option>";
                                        $query = $koneksi -> query("SELECT id_kios, nama_kios FROM tb_kios");
                                        $jsArray = "var dtkios = new Array();\n";
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $row['id_kios'] . '">' . $row['id_kios'] . '</option>';    
                                            $jsArray .= "dtkios['" . $row['id_kios'] . "'] = {nama_kios:'" . addslashes($row['nama_kios']) . "'};\n";    
                                        }
                                    ?>
                                   
                                    </select>
                                        </div>
                            </div>

                             <label for="">Nama Kios</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama_kios" id="nama_kios" class="form-control" placeholder="Nama Kios" 
                                    readonly="" style="background-color: #e7e3e9;" />
                                </div>
                            </div>



                            <label for="">Foto</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control" required/>
                                        </div>
                            </div>

                           
                             <label for="">Nama Makanan</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_makanan" class="form-control" placeholder="Nama Makanan" 
                                            onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)"
                                            required/>
                                        </div>
                            </div>

                            <label for="">Kategori</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="kategori" class="form-control show-tick" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Makanan">Makanan</option>
                                        <option value="Minuman">Minuman</option>
                                    </select>
                                    	</div>
                            </div>


                             <label for="">Harga</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="harga" class="form-control" placeholder="Harga" 
                                            onKeyPress="return goodchars(event,'1234567890',this)" required />
                                        </div>
                            </div>

                            <label for="">Status</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="status" class="form-control show-tick" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Habis">Habis</option>
                                    </select>
                                        </div>
                            </div>

                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=menumakanan'" class="btn-success">
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

<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(id_kios){  
        document.getElementById('nama_kios').value = dtkios[id_kios].nama_kios; 
    };  
</script>
<?php
      $sql = $koneksi -> query("SELECT max(id_makanan) FROM tb_menumakanan");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 3);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_makanan = "M-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $id_makanan = "M-001";
}
		if (isset($_POST['simpan'])) {
			
			$id_kios = $_POST['id_kios'];
            $nama_kios = $_POST['nama_kios'];
            $foto = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            $upload = move_uploaded_file($lokasi, "images/". $foto);
			$nama_makanan = $_POST['nama_makanan'];
			$kategori = $_POST['kategori'];
            $harga = $_POST['harga'];
			$status = $_POST['status'];

            if ($upload) {
                # code...
           

			$sql = $koneksi -> query("insert into tb_menumakanan (id_makanan, id_kios, nama_kios, foto, nama_makanan, kategori, harga, status) 
                values('$id_makanan','$id_kios','$nama_kios','$foto','$nama_makanan','$kategori','$harga','$status')");

			

			if ($sql) {
				?>


					<script type="text/javascript">
						alert("Data Berhasil Disimpan");
						window.location.href="?page=menumakanan";
					</script>
				<?php 
				}
             }

			
		}

?>

