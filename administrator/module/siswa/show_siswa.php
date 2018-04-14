
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data siswa yang berada di SMKN 1 Lemahsugih dari kelas X sampai kelas XII. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Siswa</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="10%">NISN</th>
                                            <th width="35%">Nama Siswa</th>
                                            <th width="10%">Kelas</th>
                                            <th width="30%">Kompetensi Keahlian</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menentukan Paging Tabel
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->paging_siswa($posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[siswa_nisn]</td>
                                            <td>
                                            <a href=?module=detail_siswa&&nisn=$row[siswa_nisn] rel='tooltip' title='Lihat Profil $row[siswa_nama]'>$row[siswa_nama]</a></td>
                                            <td>$row[nama_kelas]</td>
                                            <td>$row[kompetensi_nama]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_siswa&&nisn=$row[siswa_nisn]' class='btn btn-small btn-info' rel='tooltip' title='Edit Profil $row[siswa_nama]'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=siswa&aksi=hapus&nisn=$row[siswa_nisn]' class='btn btn-small btn-danger' rel='tooltip' title='Hapus $row[siswa_nama]' 
                                                      onClick=\"return confirm('Apakah Anda benar-benar akan menghapus siswa yang bernama $row[siswa_nama] ?')\">
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
 // Menampilkan Paging Tabel
 $active     = "siswa";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_siswa();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_siswa">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah Siswa
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
         <?php
    // Proses Hapus Siswa                                   
 if($_GET['aksi']=='hapus') {
    $nisn       = $_GET['nisn'];
    $data       = $syntax->get_one_siswa($nisn);
                 if($data['image']!='') {
                     unlink("../photos/$data[image]");
                     
          $syntax->hapus_siswa($nisn);
          $syntax->hapus_user($nisn);
          echo "<script>window.location='?module=siswa';</script>";
                                    }
                       else {
          $syntax->hapus_siswa($nisn);
          $syntax->hapus_user($nisn);
          echo "<script>window.location='?module=siswa';</script>";
                                    }
                                }
          ?>