
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data kelas semua jurusan yang berada di SMKN 1 Lemahsugih dari kelas X sampai kelas XII. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Data kelas</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                     <form action="?module=multi_aksi" method="POST">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5"><i class="icon-ok"></i></th>
                                            <th width="8%">No.</th>
                                            <th width="77%">Nama Kelas</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan batas paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data = $syntax->paging_kelas($posisi,$batas);
                                        $no   = 1;
                                        
                                        foreach ($data as $row){
                                        echo"<tr>
                                            <td><input type='checkbox' name='cek[]' id='id-$no' value='$row[id_kelas]'></td>
                                            <td>$no</td>
                                            <td>$row[nama_kelas]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_kelas&&id_kelas=$row[id_kelas]' class='btn btn-small btn-info'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=kelas&aksi=hapus&id_kelas=$row[id_kelas]' class='btn btn-small btn-danger'
                                                      onClick=\"return confirm('Apakah Anda benar-benar yakin akan menghapus kelas $row[nama_kelas] ?')\">
                                                <i class='btn-icon-only icon-trash'></i>
                                                 </a>
                                            </td>
                                        </tr>";
                                        
                                        $no++;
                                        }
                                        
                                                ?>
                                        
                                        
                                    </tbody>
                                </table>
                        
                             <!---paging---->
    <div class="box-footer well well-small well-shadow">   
     <div class="pagination">
 <?php
 // Menampilkan paging
 $active     = "kelas";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_kelas();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
     
     
    <div class="pull-left">
    <label class="alt-label">
    <input name="pilih" type="radio"
    onclick="for(i=1;i<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=true;}"/>
    Tandai semua
    </label>
    <label class="alt-label">
    <input name="pilih" type="radio"
    onclick="for(i=1;i<=<?php echo $no;?>;i++){document.getElementById('id-'+i).checked=false;}"/>
    Hapus semua tanda
    </label>
    </div><br><br>
    
     <!--- button --->
    
								
<td colspan="4" class="table-footer">
<input type="submit" name="delete_cek" class="btn btn-danger btn-small" onclick="window.confirm('Hapus data kelas yang ditandai ?')" value="Hapus data yang ditandai">	
<input type="submit" name="edit_cek" class="btn btn-success btn-small" value="Edit data yang ditandai">	
<input type="submit" name="add_rows" class="btn btn-primary btn-small pull-right" value="Tambah sebanyak :"><br>
<input type="number" size="1" class="span2 pull-right" name="add" value="1">
</td><br>
									
								
    
    
    </div>
    </form> 
           </div>
           </div>
           </div>
                   
                    
    
         
         
      
          <?php
          // Proses hapus kelas                      
          if($_GET['aksi']=='hapus') {
          $id_kelas  = $_GET['id_kelas'];
          $syntax->hapus_kelas($id_kelas);
          echo "<script>window.location='?module=kelas';</script>";
                                }