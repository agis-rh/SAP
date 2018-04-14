
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Data user yang berada di SMKN 1 Lemahsugih. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>User</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="40%">Nama</th>
                                            <th width="25%">Profesi</th>
                                            <th width="20%">Email</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->paging_user($posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>
                                            <a href=?module=detail_user&&id_user=$row[id_user] rel='tooltip' title='Lihat Profil $row[nama_user]'>$row[nama_user]</td></a>
                                            <td>$row[nama_profesi]</td>
                                            <td>$row[email]</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_user&&id_user=$row[id_user]' class='btn btn-small btn-info' rel='tooltip' title='Edit Profil $row[nama_user]'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=user&aksi=hapus&id_user=$row[id_user]' class='btn btn-small btn-danger' rel='tooltip' title='Hapus $row[nama_user]' 
                                                     onClick=\"return confirm('Apakah Anda benar-benar yakin akan menghapus user yang bernama $row[nama_user] ?')\">
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
 $active     = "user";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_user();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
     <!--- button --->
    <a href="?module=tambah_user">
        <button type="submit" class="btn btn-primary pull-left">
        <i class="icon-plus"></i> Tambah User
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
         <?php
          // Hapus kompetensi keahlian                      
          if($_GET['aksi']=='hapus') {
            $id_user    = $_GET['id_user'];
            $data       = $syntax->get_one_user($id_user);
            
         if($data['image_user']!='') {
            unlink("../photos/$data[image_user]");
            $syntax->hapus_user($id_user);
            echo "<script>window.location='?module=user';</script>";
                                    }
                                    else {
          $id_user  = $_GET['id_user'];
          $syntax->hapus_user($id_user);
          echo "<script>window.location='?module=user';</script>";
                                }
          }
             ?>