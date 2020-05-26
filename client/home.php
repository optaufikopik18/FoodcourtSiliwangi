            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2 align="center">MENU MAKANAN YANG HABIS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kios</th>
                                            <th>Foto</th>
                                            <th>Menu</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                                $no= 1;

                                                $sql = $koneksi->query("select * from tb_menumakanan where status = 'Habis'");

                                                while ($data = $sql->fetch_assoc()) {
                                                    # code...
                                                

                                            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_kios'] ?></td>
                                            <td><img src="images/<?php echo $data['foto'] ?>" width="50" heigth="50" alt=""></td>
                                            <td><?php echo $data['nama_makanan'] ?></span></td>
                                            <td><?php echo $data['kategori'] ?></td>
                                            <td>Rp. <?php echo number_format($data['harga']) ?></td>
                                            <td><span class="label bg-red"><?php echo $data['status'] ?></span></td>
                                        </tr>
                                        
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>