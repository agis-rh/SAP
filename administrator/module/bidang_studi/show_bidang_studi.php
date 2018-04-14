
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data Bidang Studi yang berada di SMKN 1 Lemahsugih dari kelas X sampai kelas XII. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Bidang studi</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="8%">No.</th>
                                            <th width="32%">Kode Bidang</th>
                                            <th width="50%">Nama Bidang</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan Paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data = $syntax->paging_bidang_studi($posisi,$batas);
                                        $no   = 1;
                                        
                                        foreach ($data as $row){
                                        echo"<tr>
                                            <td>$no</td>
                                            <td>$row[bidang_kode]</td>
                                            <td>$row[bidang_nama]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_bidang_studi&&bidang_kode=$row[bidang_kode]' class='btn btn-small btn-info'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=bidang_studi&aksi=hapus&bidang_kode=$row[bidang_kode]' class='btn btn-small btn-danger'
                                                     onClick=\"return confirm('Apakah Anda benar-benar akan menghapus data yang bernama $row[bidang_nama] ?')\">
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
 $active     = "bidang_studi";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_bidang_studi();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_bidang_studi">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah Bidang Studi
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
     
          <?php
          // Query Hapus                      
          if($_GET['aksi']=='hapus') {
          $bidang_kode  = $_GET['bidang_kode'];
          $syntax->hapus_bidang_studi($bidang_kode);
          echo "<script>window.location='?module=bidang_studi';</script>";
                                }