<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KIOS <a href="?page=datakios&aksi=tambah" class="btn btn-primary">Tambah</a>
                            </h2>
                            
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kios</th>
                                            <th>Id Petugas</th>
                                            <th>Nama Petugas</th>
                                            <th>No Hp Kios</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            <?php

                                                $no= 1;

                                                $sql = $koneksi->query("select * from tb_kios");

                                                while ($data = $sql->fetch_assoc()) {
                                                    # code...
                                                

                                            ?>



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_kios'] ?></td>
                                            <td><?php echo $data['id_petugas'] ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['hp_kios'] ?></td>
                                            
                                            <td>

                                                <a href="?page=datakios&aksi=ubah&id=<?php echo $data['id_kios'] ?>" class="btn 
                                                btn-success">Ubah</a>
                                                <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini .... ?')" 
                                                href="?page=datakios&aksi=hapus&id=<?php echo $data['id_kios'] ?>" class="btn 
                                                btn-danger">Hapus</a>
                                            </td>    

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                                
                                </div>