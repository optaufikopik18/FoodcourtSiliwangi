<?php 

  $query1 = $koneksi -> query("SELECT id_kios FROM tb_kios");
  $jumlahkios = mysqli_num_rows($query1);

  $query2 = $koneksi -> query("SELECT id_makanan FROM tb_menumakanan");
  $jumlahmakanan = mysqli_num_rows($query2); 

  $query3 = $koneksi -> query("SELECT id_transaksi FROM tb_transaksi");
  $jumlahtransaksi = mysqli_num_rows($query3); 

  $query4 = $koneksi -> query("SELECT id_petugas FROM tb_petugas");
  $jumlahpetugas = mysqli_num_rows($query4); 
?>
<h3><i class="glyphicon glyphicon-home"></i> Dashboard</h3>
<hr>
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_cafe</i>
                        </div>
                        <div class="content">
                            <div class="text">Jumlah Kios</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jumlahkios; ?>" data-speed="15" 
                            data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">restaurant_menu</i>
                        </div>
                        <div class="content">
                            <div class="text">Menu Makanan</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jumlahmakanan; ?>" data-speed="15" 
                            data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">Pengunjung</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jumlahtransaksi; ?>" data-speed="15" 
                            data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Petugas</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $jumlahpetugas; ?>" data-speed="15" 
                            data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

        </div><!-- /row mt -->
      </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->

    <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CPU USAGE (%)</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <div class="switch panel-switch-btn">
                                        <span class="m-r-10 font-12">REAL TIME</span>
                                        <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                    </div>
                                </div>
                            </div>
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
                            <div id="real_time_chart" class="dashboard-flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
  