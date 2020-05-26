 <?php

    $kode = $_GET['id'];

    $sql = $koneksi -> query("select * from tb_menumakanan where id_makanan='$kode'");
    $tampil = $sql -> fetch_assoc();

    $kategori = $tampil['kategori'];
    $status = $tampil['status'];

 ?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH MENU MAKANAN 
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST" enctype="multipart/form-data">

                           <label for="">Id Kios</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <select id="id_kios" name="id_kios" onchange="changeValue(this.value)" 
                                    required class="form-control show-tick" >
                                    <?php
                                        $query = $koneksi -> query("SELECT id_kios, nama_kios FROM tb_kios");
                                        echo '<option value="' . $tampil['id_kios'] . '">' . $tampil['id_kios'] . '</option>';  
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
                                    <input type="text" name="nama_kios" id="nama_kios" value= "<?php echo $tampil['nama_kios']; ?>" 
                                    class="form-control" placeholder="Nama Kios" 
                                    readonly="" style="background-color: #e7e3e9;" />
                                </div>
                            </div>



                             <label for="">Foto</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <img src="images/<?php echo $tampil['foto'] ?>" width="100" height="100" alt="">
                                        </div>
                            </div>

                            <label for="">Ganti Foto</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control" />
                                        </div>
                            </div>

                           
                             <label for="">Nama Makanan</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_makanan" class="form-control" placeholder="Nama Makanan"
                                            onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)"
                                            value= "<?php echo $tampil['nama_makanan']; ?>" required/>
                                        </div>
                            </div>

                            <label for="">Kategori</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="kategori" class="form-control show-tick">
                                        
                                        <option value="Makanan" <?php if ($kategori=='Makanan') {echo "selected"; } ?>>Makanan</option>
                                        <option value="Minuman" <?php if ($kategori=='Minuman') {echo "selected"; } ?>>Minuman</option>
                                    </select>
                                        </div>
                            </div>


                             <label for="">Harga</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="harga" value= "<?php echo $tampil['harga']; ?>"
                                            onKeyPress="return goodchars(event,'1234567890',this)"
                                            class="form-control" placeholder="Harga" required />
                                        </div>
                            </div>

                            <label for="">Status</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="status" class="form-control show-tick">
                                       
                                        <option value="Ada" <?php if ($status=='Ada') {echo "selected"; } ?>>Ada</option>
                                        <option value="Habis" <?php if ($status=='Habis') {echo "selected"; } ?>>Habis</option>
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
     
        if (isset($_POST['simpan'])) {
            $id_makanan = $_POST['id_makanan'];
            $id_kios = $_POST['id_kios'];
            $nama_kios = $_POST['nama_kios'];
            $foto = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            $nama_makanan = $_POST['nama_makanan'];
            $kategori = $_POST['kategori'];
            $harga = $_POST['harga'];
            $status = $_POST['status'];

            if (!empty($lokasi)) {
                
            $upload = move_uploaded_file($lokasi, "images/". $foto);
           

            $sql2 = $koneksi -> query("update tb_menumakanan set id_kios='$id_kios', nama_kios='$nama_kios', foto='$foto', nama_makanan='$nama_makanan',
                                        kategori='$kategori', harga='$harga', status='$status' where id_makanan='$kode'");

            

            if ($sql2) {
                ?>


                    <script type="text/javascript">
                        alert("Data Berhasil Diubah");
                        window.location.href="?page=menumakanan";
                    </script>
                <?php 
                }

                }else{

                
           
           

            $sql2 = $koneksi -> query("update tb_menumakanan set id_kios='$id_kios', nama_kios='$nama_kios', nama_makanan='$nama_makanan',
                                        kategori='$kategori', harga='$harga', status='$status' where id_makanan='$kode'");

            

            if ($sql2) {
                ?>


                    <script type="text/javascript">
                        alert("Data Berhasil Diubah");
                        window.location.href="?page=menumakanan";
                    </script>
                <?php 
                }

        }

             

    }

?>
