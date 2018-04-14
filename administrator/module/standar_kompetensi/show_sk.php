
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data Standar Kompetensi yang berada di SMKN 1 Lemahsugih dari kelas X sampai kelas XII. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Standar Kompetensi</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="10%">SK Kode</th>
                                            <th width="32%">Nama Standar Kompetensi</th>
                                            <th width="25%">Kompetensi Keahlian</th>
                                            <th width="7%">Kelas</th>
                                            <th width="8%">Semester</th>
                                            <th width="5%">KKM</th>
                                            <th width="8%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                        // Menetukan batas paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->paging_standar_kompetensi($posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[sk_kode]</td>
                                            <td>$row[sk_nama]</td>
                                            <td>$row[kompetensi_nama]</td>
                                            <td>$row[sk_kelas]</td>
                                            <td>$row[sk_semester]</td>
                                            <td>$row[sk_kkm]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_sk&&sk_kode=$row[sk_kode]' class='btn btn-small btn-info'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=sk&aksi=hapus&sk_kode=$row[sk_kode]' class='btn btn-small btn-danger'
                                                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus data yang bernama $row[sk_nama] ?')\">
                                                <i class='btn-icon-only icon-trash'></i>
                                                 </a>
                                            </td>
                                        </tr>";
                                        
                                        $nomor++;
                                        }
                                        
                                                ?>
                                        
                                        
                                    </tbody>
                                </table>
                        
                             <!---paging---->
    <div class="box-footer well well-small well-shadow">
     <div class="pagination">
 <?php
 // Menampilkan paging halaman
 $active     = "sk";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_standar_kompetensi();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_sk">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah Standar Kompetensi
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
      
          <?php
           // Proses Hapus                     
          if($_GET['aksi']=='hapus') {
          $sk_kode  = $_GET['sk_kode'];
          $syntax->hapus_standar_kompetensi($sk_kode);
          echo "<script>window.location='?module=sk';</script>";
                                }
             ?>