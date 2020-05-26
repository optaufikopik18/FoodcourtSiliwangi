<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PELANGGAN <a href="?page=datapelanggan&aksi=tambah" class="btn btn-primary">Tambah</a>
                            </h2>
                            
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Uid</th>
                                            <th>Nama</th>
                                            <th>No. HP</th>
                                            <th>Status</th>
                                            <th>Tanggal Pembuatan</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    		<?php

                                    			$no= 1;

                                    			$sql = $koneksi->query("select * from tb_pelanggan");
                                         

                                    			while ($data = $sql->fetch_assoc())
                                                  {
                                    				# code...
                                    			
                                                    # code...
                                                

                                    		?>
                                           



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['uid'] ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['nohp'] ?></td>
                                            <td><?php echo $data['status'] ?></td>
                                            <td><?php echo $data['tgl_pembuatan'] ?></td>
                                            
                                            <td>

                                            	<a href="?page=datapelanggan&aksi=ubah&id=<?php echo $data['id_pelanggan'] ?>" class="btn 
                                                btn-success">Ubah</a>
                                            	<a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini .... ?')" 
                                                href="?page=datapelanggan&aksi=hapus&id=<?php echo $data['id_pelanggan'] ?>" class="btn 
                                                btn-danger">Hapus</a>
                                            </td>    

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                           
                                </div>