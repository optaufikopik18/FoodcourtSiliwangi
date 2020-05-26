<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PENGGUNA <a href="?page=datapengguna&aksi=tambah" class="btn btn-primary">Tambah</a>
                            </h2>
                            
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Nama Petugas</th>
                                            <th>Username</th>
                                            <th>Hak Akses</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    		<?php

                                    			$no= 1;

                                    			$sql = $koneksi->query("select * from tb_pengguna");

                                    			while ($data = $sql->fetch_assoc()) {
                                    				# code...
                                    			

                                    		?>



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['username'] ?></td>
                                            <td><?php echo $data['hak_akses'] ?></td>
                                            <td><img src="images/<?php echo $data['foto'] ?>" width="50" heigth="50" alt=""></td>
                                            <td>

                                            	<a href="?page=datapengguna&aksi=ubah&id=<?php echo $data['id'] ?>" class="btn 
                                                btn-success">Ubah</a>
                                            	<a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini .... ?')" 
                                                href="?page=datapengguna&aksi=hapus&id=<?php echo $data['id'] ?>" class="btn 
                                                btn-danger">Hapus</a>
                                            </td>    

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                               
                                </div>