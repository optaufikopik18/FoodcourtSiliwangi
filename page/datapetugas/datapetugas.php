<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PETUGAS <a href="?page=datapetugas&aksi=tambah" class="btn btn-primary">Tambah</a>
                            </h2>
                            
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Nama</th>
                                            <th>No. HP</th>
                                            <th>Hak Akses</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    		<?php

                                    			$no= 1;

                                    			$sql = $koneksi->query("select * from tb_petugas");

                                    			while ($data = $sql->fetch_assoc()) {
                                    				# code...
                                    			

                                    		?>



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['nohp'] ?></td>
                                            <td><?php echo $data['hak_akses'] ?></td>
                                            <td>

                                            	<a href="?page=datapetugas&aksi=ubah&id=<?php echo $data['id_petugas'] ?>" class="btn 
                                                btn-success">Ubah</a>
                                            	<a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini .... ?')" 
                                                href="?page=datapetugas&aksi=hapus&id=<?php echo $data['id_petugas'] ?>" class="btn 
                                                btn-danger">Hapus</a>
                                            </td>    

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                                
                                </div>