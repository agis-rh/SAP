
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data wali murid yang berada di SMKN 1 Lemahsugih dari kelas X sampai kelas XII. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>wali murid</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="15%">Nama Ayah</th>
                                            <th width="15%">Nama Ibu</th>
                                            <th width="30%">Wali dari</th>
                                            <th width="17%">Alamat</th>
                                            <th width="10%">Telepon</th>
                                            <th width="8%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan Paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->paging_wali($posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[wali_nama_ayah]</td>
                                            <td>$row[wali_nama_ibu]</td>
                                            <td><a href=?module=detail_siswa&&nisn=$row[siswa_nisn] rel='tooltip' title='Lihat Profil $row[siswa_nama]'>$row[siswa_nama]</a></td>
                                            <td>$row[wali_alamat]</td>
                                            <td>$row[wali_telepon]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_wali&&wali_id=$row[wali_id]' class='btn btn-small btn-info'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=wali&aksi=hapus&wali_id=$row[wali_id]' class='btn btn-small btn-danger'
                                                      onClick=\"return confirm('Apakah Anda benar-benar yakin akan menghapus wali dari $row[siswa_nama] ?')\">
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
 // Menampilkan Pagimg
 $active     = "wali";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_wali();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_wali">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah Wali Murid
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
            </div>
                   
                    
    
         
         

         <?php
           // Query Hapus                     
          if($_GET['aksi']=='hapus') {
          $id_wali  = $_GET['wali_id'];
          $syntax->hapus_wali($id_wali);
          echo "<script>window.location='?module=wali';</script>";
                                }
             ?>