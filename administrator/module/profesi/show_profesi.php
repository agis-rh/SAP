
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data profesi di SMKN 1 Lemahsugih. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                            <i class="icon-tasks"></i>  <small>Data Profesi</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="8%">No.</th>
                                            <th width="32%">Nama Profesi</th>
                                            <th width="40%">Keterangan</th>
                                            <th width="10%">Aktif</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan batas paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data = $syntax->paging_profesi($posisi,$batas);
                                        $no   = 1;
                                        
                                        foreach ($data as $row){
                                        echo"<tr>
                                            <td>$no</td>
                                            <td>$row[nama_profesi]</td>
                                            <td>$row[keterangan_profesi]</td>
                                            <td>$row[profesi_aktif]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_profesi&&id_profesi=$row[id_profesi]' class='btn btn-small btn-info'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=profesi&aksi=hapus&id_profesi=$row[id_profesi]' class='btn btn-small btn-danger'
                                                     onClick=\"return confirm('Apakah Anda benar-benar yakin akan menghapus profesi sebagai $row[nama_profesi] ?')\">
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
 // Menampilkan Paging
 $active     = "profesi";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_profesi();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_profesi">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah Profesi
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
 
          <?php
          // Proses Hapus                      
          if($_GET['aksi']=='hapus') {
          $id_profesi  = $_GET['id_profesi'];
          $syntax->hapus_profesi($id_profesi);
          echo "<script>window.location='?module=profesi';</script>";
                }
