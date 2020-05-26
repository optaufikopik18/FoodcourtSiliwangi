<?php

    $id = $_GET['id'];

    $sql2 = $koneksi->query("select * from tb_pengguna where id='$id'");
    $tampil = $sql2->fetch_assoc();

    $hak_akses = $tampil['hak_akses'];



?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT DATA PENGGUNA 
                               
                            </h2>
                        </div>
                            <div class="body">
                            <form method="POST" enctype="multipart/form-data">

                            <label for="">Username</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" value="<?php echo $tampil['username']; ?>
                                            " class="form-control" placeholder="Username" />
                                        </div>
                            </div>

                            <label for="">Password</label>

                            <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password" value="<?php echo $tampil['password']; ?>
                                            "class="form-control" placeholder="Password" />
                                        </div>
                            </div>

                            <label for="">Hak Akses</label>

                            <div class="form-group">
                                        <div class="form-line">
                                    <select name="hak_akses" class="form-control show-tick">
                                    
                                        <option value="Server" <?php if ($hak_akses=='Server') {echo "selected"; } ?>>Server</option>
                                        <option value="Client" <?php if ($hak_akses=='Client') {echo "selected"; } ?>>Client</option>
                                    </select>
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

                            <input type="submit" name="simpan" value="Simpan" class="btn-primary">
                            <input type="button" value="Batal" onclick="location.href='?page=datapengguna'" class="btn-success">
                             </form>


<?php
		if (isset($_POST['simpan'])) {
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$hak_akses = $_POST['hak_akses'];
			$foto = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
           

            if (!empty($lokasi)) {
                
            $upload = move_uploaded_file($lokasi, "images/". $foto);
           

			$sql = $koneksi -> query("update tb_pengguna set username='$username', password='$password', hak_akses='$hak_akses', foto='$foto' 
                where id='$id'");

			

			if ($sql) {
				?>


					<script type="text/javascript">
						alert("Data Berhasil Diubah");
						window.location.href="?page=datapengguna";
					</script>
				<?php 
				}
              

			
		}else{

                
           
           

            $sql = $koneksi -> query("update tb_pengguna set username='$username', password='$password', hak_akses='$hak_akses' where id='$id'");

            

            if ($sql) {
                ?>


                    <script type="text/javascript">
                        alert("Data Berhasil Diubah");
                        window.location.href="?page=datapengguna";
                    </script>
                <?php 
                }

        }

    }

?>

