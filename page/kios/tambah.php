<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA KIOS 
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST">


                             <label for="">Nama Kios</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_kios" class="form-control" placeholder="Nama Kios" autofocus required />
                                        </div>
                            </div>

                            <label for="">Id Petugas</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <select id="id_petugas" name="id_petugas" onchange="changeValue(this.value)" 
                                    class="form-control show-tick" required>
                                    <?php
                                        echo "<option value=".''.">-- Pilih Petugas --</option>";
                                        $query = $koneksi -> query("SELECT id_petugas, nama FROM tb_petugas WHERE hak_akses = 'Petugas Kios'");
                                        $jsArray = "var dtPtgs = new Array();\n";
                                        while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $row['id_petugas'] . '">' . $row['id_petugas'] . '</option>';    
                                            $jsArray .= "dtPtgs['" . $row['id_petugas'] . "'] = {nama:'" . addslashes($row['nama']) . "'};\n";    
                                        }
                                    ?>
                                   
                                    </select>
                                    	</div>
                            </div>

                             <label for="">Nama Petugas</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Petugas" readonly=""
                                    style="background-color: #e7e3e9;" />
                                </div>
                            </div>

                             <label for="">No Hp</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="hp_kios" class="form-control" placeholder="No Hp" required
                                    onKeyPress="return goodchars(event,'1234567890',this)"/>
                                </div>
                            </div>


                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=datakios'" class="btn-success">
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
    function changeValue(id_petugas){  
        document.getElementById('nama').value = dtPtgs[id_petugas].nama; 
    };  
</script>
<?php
       $sql = $koneksi -> query("SELECT max(id_kios) FROM tb_kios");

$datakode = mysqli_fetch_array($sql);
// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 3);
  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;
  // setiap $kode di tambah 1
  $kode = $kode + 1;

  $id_kios = "K-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
  $id_kios = "K-001";
}
		if (isset($_POST['simpan'])) {
			
			$nama_kios = $_POST['nama_kios'];
			$id_petugas = $_POST['id_petugas'];
            $nama = $_POST['nama'];
            $hp_kios = $_POST['hp_kios'];

  
			$sql2 = $koneksi -> query("insert into tb_kios values('$id_kios','$nama_kios','$id_petugas','$nama','$hp_kios')");

		
			if ($sql2) {
				?>


					<script type="text/javascript">
						alert("Data Berhasil Disimpan");
						window.location.href="?page=datakios";
					</script>
				<?php 
				}
			
		}

?>

