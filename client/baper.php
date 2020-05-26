<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Baper
                            </h2>
                            
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Makanan</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Kuantitas</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    		<?php

                                    			$no= 1;

                                    			$sql = $koneksi->query("select * from tb_menumakanan where nama_kios = 'Baper' and status = 'Ada'");

                                    			while ($data = $sql->fetch_assoc()) {
                                    				# code...
                                    			

                                    		?>



                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="images/<?php echo $data['foto'] ?>" width="50" heigth="50" alt=""></td>
                                            <td><?php echo $data['nama_makanan'] ?></td>
                                            <td><?php echo $data['kategori'] ?></td>
                                            <form action="client/add_chart.php" method="post" >
                                            <td><?php echo number_format($data['harga']) ?> 
                                            <input type="hidden" name="id" value="<?=$data['id_makanan']?>"  >    
                                            <input type="hidden" name="hrg" value="<?=$data['harga']?>" id="hrg<?php echo $no; ?>" > </td>
                                            <td style="padding-left:20px;">
                                                  <div class="form-group">
                                                  <input type="text" name="kuantitas" id="kuantitas<?php echo $no; ?>" onkeyup="sum('<?php echo $no; ?>')" 
                                                  autocomplete="off" onKeyPress="return goodchars(event,'1234567890',this)" 
                                                  class="form-control" value="" autofocus required/>
                                                  
                                                  </div>
                                            </td>

                                            <td style="padding-left:20px;">                 
                                                  <input type="text" name="total" id="total<?php echo $no; ?>" autocomplete="off" 
                                                  class="form-control" style="background-color: #e7e3e9;" readonly />
                                                          
                                            </td>
                                            <td>

                                            	<input type="submit" name="simpan" value="Pesan" class="btn-primary">
                                            </td>    
                                               </form> 
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> 
                                
                                </div>
                                <script type="text/javascript"> 
                                function sum(xy){
                                     var qty,jml,tot ;
                                     var tmp;
                                     tmp = xy
                                     qty = document.getElementById('kuantitas'+tmp).value;
                                     jml = document.getElementById('hrg'+tmp).value;
                                     tot = parseInt(qty)*parseInt(jml);
                                     document.getElementById('total'+tmp).value = tot.toString();
                                }
                                </script>

<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>