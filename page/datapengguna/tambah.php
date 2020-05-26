<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PENGGUNA 
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST" enctype="multipart/form-data">
                            <label for="">Id Petugas</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <select id="id_petugas" name="id_petugas" onchange="changeValue(this.value)" class="form-control show-tick">
                                    <?php
                                        echo "<option value=0>-- Pilih Petugas --</option>";
                                        $query = $koneksi -> query("SELECT id_petugas, nama FROM tb_petugas WHERE hak_akses = 'Admin'");
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
                                    style="background-color: #e7e3e9;"  />
                                </div>
                            </div>

                            <label for="">Username</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control" placeholder="Username" required />
                                        </div>
                            </div>

                            <label for="">Password</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" placeholder="Password" required />
                                        </div>
                            </div>

                            <label for="">Hak Akses</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="hak_akses" class="form-control show-tick" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Server">Server</option>
                                        <option value="Client">Client</option>
                                    </select>
                                    	</div>
                            </div>


                            <label for="">Foto</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control" required/>
                                        </div>
                            </div>

                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=datapengguna'" class="btn-success">
                             </form>



<script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(id_petugas){  
        document.getElementById('nama').value = dtPtgs[id_petugas].nama; 
    };  
</script>
<?php

		if (isset($_POST['simpan'])) {
			
            $id_petugas = $_POST['id_petugas'];
            $nama = $_POST['nama'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$hak_akses = $_POST['hak_akses'];
			$foto = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            $upload = move_uploaded_file($lokasi, "images/". $foto);

            if ($upload) {
                # code...
           

			$sql = $koneksi -> query("insert into tb_pengguna (id_petugas, nama, username, password, hak_akses, foto) 
                values('$id_petugas','$nama', '$username','$password','$hak_akses','$foto')");

			

			if ($sql) {
				?>


					<script type="text/javascript">
						alert("Data Berhasil Disimpan");
						window.location.href="?page=datapengguna";
					</script>
				<?php 
				}
             }

			
		}

?>

