<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA TRANSAKSI <a href="?page=transaksi&aksi=tambah" class="btn btn-primary">Tambah</a>
                            </h2>
                            
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nominal</th>
                                            <th>Saldo</th>
                                            <th>Jenis Transaksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    		<?php

                                    			$no= 1;

                                    			$sql = $koneksi->query("select * from tb_transaksi");

                                    			while ($data = $sql->fetch_assoc()) {
                                    				# code...
                                    			

                                    		?>



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['tgl_transaksi'] ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo number_format($data['nominal']) ?></td>
                                            <td><?php echo number_format($data['saldo']) ?></td>
                                            <td><?php echo $data['jenis'] ?></td> 
                                            
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                                
                                </div>