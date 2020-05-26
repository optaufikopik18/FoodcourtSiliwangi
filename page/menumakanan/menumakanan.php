<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MENU MAKANAN <a href="?page=menumakanan&aksi=tambah" class="btn btn-primary">Tambah</a>
                            </h2>
                            
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                        	<th>Nama Kios</th>
                                            <th>Foto</th>
                                            <th>Nama Makanan</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    		<?php

                                    			$no= 1;

                                    			$sql = $koneksi->query("select * from tb_menumakanan");

                                    			while ($data = $sql->fetch_assoc()) {
                                    				# code...
                                    			

                                    		?>



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_kios'] ?></td>
                                            <td><img src="images/<?php echo $data['foto'] ?>" width="50" heigth="50" alt=""></td>
                                            <td><?php echo $data['nama_makanan'] ?></td>
                                            <td><?php echo $data['kategori'] ?></td>
                                            <td>Rp. <?php echo number_format($data['harga']) ?></td>
                                            <td><?php echo $data['status'] ?></td>
                                            <td>

                                            	<a href="?page=menumakanan&aksi=ubah&id=<?php echo $data['id_makanan'] ?>" class="btn 
                                                btn-success">Ubah</a>
                                            	<a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini .... ?')" 
                                                href="?page=menumakanan&aksi=hapus&id=<?php echo $data['id_makanan'] ?>" class="btn 
                                                btn-danger">Hapus</a>
                                            </td>    

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                                
                                </div>