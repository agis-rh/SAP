
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data Guru yang berada di SMKN 1 Lemahsugih dari kelas X sampai kelas XII. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Guru</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="10%">Kode Guru</th>
                                            <th width="20%">NIP</th>
                                            <th width="40%">Nama Guru</th>
                                            <th width="15%">No.Telepon</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan batas paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->paging_guru($posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[guru_kode]</td>
                                            <td>$row[guru_nip]</td>
                                           <td><a href=?module=detail_guru&&kode=$row[guru_kode] rel='tooltip' title='Lihat Profil $row[guru_nama]'>$row[guru_nama]</a></td>
                                            <td>$row[guru_telepon]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_guru&&guru_kode=$row[guru_kode]' class='btn btn-small btn-info' rel='tooltip' title='Edit Profil $row[guru_nama]'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=guru&aksi=hapus&guru_kode=$row[guru_kode]' class='btn btn-small btn-danger' rel='tooltip' title='Hapus $row[guru_nama]' 
                                                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus guru yang bernama $row[guru_nama] ?')\">
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
 $active     = "guru";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_guru();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_guru">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah Guru
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
 
         <?php
          // Proses Hapus                                         }
    if($_GET['aksi']=='hapus') {
    $kode       = $_GET['guru_kode'];
    $data       = $syntax->get_one_guru($kode);
                 if($data['image_guru']!='') {
                     unlink("../photos/$data[image_guru]");
                     
          $syntax->hapus_guru($kode);
          $syntax->hapus_user($kode);
          echo "<script>window.location='?module=guru';</script>";
                                    }
                       else {
          $syntax->hapus_guru($kode);
          $syntax->hapus_guru($kode);
          echo "<script>window.location='?module=guru';</script>";
                                    }
                                }
          ?>