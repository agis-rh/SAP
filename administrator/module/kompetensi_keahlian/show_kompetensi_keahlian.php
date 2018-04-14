
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data kompetensi keahlian yang berada di SMKN 1 Lemahsugih dari kelas X sampai kelas XII. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Kompetensi Keahlian</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="20%">Kode Kompetensi</th>
                                            <th width="45%">Nama Kompetensi</th>
                                            <th width="20%">Bidang Studi</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->paging_kompetensi_keahlian($posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[kompetensi_kode]</td>
                                            <td>$row[kompetensi_nama]</td>
                                            <td>$row[bidang_nama]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_kompetensi_keahlian&&kompetensi_kode=$row[kompetensi_kode]' class='btn btn-small btn-info'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=kompetensi_keahlian&aksi=hapus&kompetensi_kode=$row[kompetensi_kode]' class='btn btn-small btn-danger'
                                                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus data yang bernama $row[kompetensi_nama] ?')\">
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
 // Menampilkan paging
 $active     = "kompetensi_keahlian";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_kompetensi_keahlian();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_kompetensi_keahlian">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah Kompetensi Keahlian
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
         <?php
          // Hapus kompetensi keahlian                      
          if($_GET['aksi']=='hapus') {
          $kode  = $_GET['kompetensi_kode'];
          $syntax->hapus_kompetensi_keahlian($kode);
          echo "<script>window.location='?module=kompetensi_keahlian';</script>";
                                }
             ?>