
<!---Notification----->
<div class="span16">
 <form action="module/rekap_nilai/rekap_excel.php" method="POST">
 <fieldset>
 <legend></legend>
  <legend>
    <p>
        <?php
        $arh=$syntax->get_one_siswa($_POST['siswa']);
        $ra=$syntax->get_one_kelas($arh['id_kelas']);
       echo"<div align='center'><h3 style='font-family: Footlight MT Light;'>Rekap Nilai</h3>"
               . "<h4 style='font-family: Footlight MT Light;'>$arh[siswa_nama]</h4>"
               . "<h4 style='font-family: Footlight MT Light;'>NISN : $arh[siswa_nisn]</h4>"
               . "<h4 style='font-family: Footlight MT Light;'>Kelas : $ra[nama_kelas]</h4></div>";
        ?>
   </p> 
   </legend>




                    <!----Data table----->

                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Rekap Nilai</small>
                        </button>
                    </div>
                    <input type="hidden" name="siswa" value="<?php echo $arh[siswa_nisn]; ?>" />
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="52%">Standar Kompetensi</th>
                                            <th width="20%">Nama Ujian</th>
                                            <th width="8%">Nilai</th>
                                            <th width="15%">Keterangan</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $siswa  =$_POST['siswa'];
                                        $data   = $syntax->rekap($siswa);
                                        $nomor  = 1;
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[sk_nama]</td>";
                                             $nilai = $syntax->nilai_rekap($siswa,$row['sk_kode']);
                                             $ujian = $syntax->get_one_ujian($nilai['id_ujian']);
                                            echo"<td>$ujian[nama_ujian]</td>";
                                            echo"<td>$nilai[nilai]</td>";                                      
                                            echo"<td>";
                                            
                                            // Melakukan perhitungan kelulusan
                                            $ket=$syntax->get_one_standar_kompetensi($row['sk_kode']);
                                            if($nilai['nilai']==''){
                                                echo "<i style='color: #0000'>Belum ada nilai</i>";
                                            }
                                                elseif($nilai['nilai']< $ket['sk_kkm']){
                                                echo "<i style='color: #fd1515'>Tidak Kompeten</i>";
                                            }else{
                                                echo "<i style='color: #0080FF'>Kompeten</i>";
                                            }
                                            
                                            
                                            echo"</td>";
                                        
                                     $nomor++;
                                            }
                                        
                                        
                                                ?>
                                       
                                        
                                        
                                </tbody>
                                </table>
                                </div>
                                </div>
 </fieldset>
  <div class="box-footer">
      <button id="submit-button"  type="submit" class="btn btn-primary" name="cetak"><i class="icon-print"></i> Cetak Laporan</button>
      <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Cancel</a>
   </div> 
</form>        
</div>           
    
         