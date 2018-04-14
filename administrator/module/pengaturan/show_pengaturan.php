
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Profil SMKN 1 Lemahsugih. 
    </p>
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-cogs" style="color: #0080FF"></i>
                        <h5 style="color: #0080FF"><em>pengaturan</em></h5>
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                            <i class="icon-reorder"></i>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover  tablesorter">
                                    
                                    <tbody>
                                        
                                        <?php
                                        // Menampilkan data pengaturan
                                        $data = $syntax->show_pengaturan();
                                        
                                        foreach ($data as $row);
                                        echo"<tr>
                                            <td><b>Nama Sekolah</b></td><td><b>:</b></td><td>$row[nama_sekolah]</td>
                                             </tr>
                                             <tr>
                                            <td><b>Alamat Sekolah</b></td><td><b>:</b></td><td>$row[alamat_sekolah]</td>
                                             </tr>
                                             <tr>
                                            <td><b>Judul Aplikasi</b></td><td><b>:</b></td><td>$row[title]</td>
                                             </tr>
                                             <tr>
                                            <td><b>Keterangan Aplikasi</b></td><td><b>:</b></td><td>$row[keterangan_aplikasi]</td>
                                             </tr>
                                             <tr>
                                            <td><b>Halaman Paging</b></td><td><b>:</b></td><td>$row[paging]</td>
                                             </tr>";
                                        
                                       
                                        
                                                ?>
                                        
                                        
                                    </tbody>
                                </table>
                        
                             
    
    
     <!--- button --->
     <div class="box-footer well well-small well-shadow">
    <a href="?module=edit_pengaturan&&id_pengaturan=<?php echo $row[id_pengaturan]; ?>">
        <br><button type="submit" class="btn btn-success pull-left">
        Edit pengaturan  <i class="icon-signout"></i>
        </button>
    </a><br>
    </div>
                        
                             
                            </div>
                        </div>
                    </div>
                   
                    
    
         
         
          <?php
           // Query Hapus                     
          if($_GET['aksi']=='hapus') {     
          $id_ujian  = $_GET['id_ujian'];
          $syntax->hapus_ujian($id_ujian);
          echo "<script>window.location='?module=ujian';</script>";
            }
