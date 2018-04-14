<?php
$data=$syntax->get_one_siswa($_SESSION['id_user']);
?>
<!---Notification----->
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">   
    <p>
        <i class="icon-info-sign"></i> Data Nilai <?php echo $data[siswa_nama]; ?> 
    </p>
    
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Nilai</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                          <form action="?module=multi_nilai" method="POST">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="50%">Standar Kompetensi Nama</th>
                                            <th width="20%">Nama Ujian</th>
                                            <th width="10%">Nilai</th>
                                            <th width="15%">Keterangan</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->siswa_nilai($_SESSION['id_user'],$posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[sk_nama]</td>
                                            <td>$row[nama_ujian]</td>
                                             <td>$row[nilai]</td>
                                            <td>";
                                        
                                            // Melakukan perhitungan kelulusan
                                            $ket=$syntax->get_one_standar_kompetensi($row['sk_kode']);
                                            if($row['nilai']< $ket['sk_kkm']){
                                                echo "<i style='color: #fd1515'>Tidak Kompeten</i>";
                                            }else{
                                                echo "<i style='color: #0080FF'>Kompeten</i>";
                                            }
                                            
                                            
                                            echo"</td>
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
 $active     = "siswa_nilai";
 $page       = $_GET['halaman'];
 $jml_data   = $syntax->jumlah_nilai();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>

    
     <!--- button --->
    
								

                        
                             
     </div><br>
                          </form>
                        

                        </div>
                    </div>
                   
                    
    
         
  