 <?php

    $kode = $_GET['id'];

    $sql = $koneksi -> query("select * from tb_kios where id_kios ='$kode'");
    $tampil = $sql -> fetch_assoc();

 ?>




 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA KIOS
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST">

                            <label for="">Nama Kios</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_kios" value= "<?php echo $tampil['nama_kios']; ?>
                                            " class="form-control" placeholder="Nama Kios" required /> 
                                        </div>
                            </div>

                            
                            <label for="">Id Petugas</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <select id="id_petugas" name="id_petugas" onchange="changeValue(this.value)" 
                                    class="form-control show-tick" required>
                                    <?php
                                        $query = $koneksi -> query("SELECT id_petugas, nama FROM tb_petugas WHERE hak_akses = 'Petugas Kios'");
                                        echo '<option value="' . $tampil['id_petugas'] . '">' . $tampil['id_petugas'] . '</option>';  
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
                                            <input type="text" name="nama" id="nama" value= "<?php echo $tampil['nama']; ?>
                                            " class="form-control" placeholder="Nama Petugas" style="background-color: #e7e3e9;" /> 
                                        </div>
                            </div>

                             <label for="">No Hp Kios</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="hp_kios" value="<?php echo $tampil['hp_kios']; ?>" 
                                    class="form-control" placeholder="No Hp Kios" required
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
		if (isset($_POST['simpan'])) {
			
			$id_kios = $_POST['id_kios'];
			$nama_kios = $_POST['nama_kios'];
			$id_petugas = $_POST['id_petugas'];
	       $hp_kios = $_POST['hp_kios'];
           $nama = $_POST['nama'];
			$sql2 = $koneksi -> query("update tb_kios set nama_kios='$nama_kios', id_petugas='$id_petugas', nama='$nama', 
                                        hp_kios='$hp_kios' where id_kios='$kode'");

			if ($sql2) {
				?>


					<script type="text/javascript">
						alert("Data Berhasil Diubah");
						window.location.href="?page=datakios";
					</script>
				<?php 
			}
		}

?>

