<?php
$sk     = $syntax->get_one_standar_kompetensi($_POST['sk']);
$ujian  = $syntax->get_one_ujian($_POST['ujian']);
$kelas  = $syntax->get_one_kelas($_POST['kelas']);
?>
<!---Notification----->
<div class="span16">
 <fieldset>
 <legend></legend>
  <legend>
    <p>
        <?php
       echo"<div align='center'><h4>$sk[sk_nama]</h4>"
               . "<h5>$ujian[nama_ujian]</h5>"
               . "<h5>$kelas[nama_kelas]</h5></div>";
        ?>
   </p> 
   </legend>




                    <!----Data table----->

                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Daftar Nilai</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                          <form action="module/laporan/lap_excel.php" method="POST">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th width="12%">NISN</th>
                                            <th width="60%">Nama Siswa</th>
                                            <th width="8%">Nilai</th>
                                            <th width="15%">Keterangan</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $kelas  =$_POST['kelas'];
                                        $ujian  =$_POST['ujian'];
                                        $sk     =$_POST['sk'];
                                        $data   = $syntax->laporan($kelas,$ujian,$sk);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[siswa_nisn]</td>
                                            <td>$row[siswa_nama]</td>
                                            <td>$row[nilai]</td>
                                            <td>";
                                        
                                            // Melakukan perhitungan kelulusan
                                            $ket=$syntax->get_one_standar_kompetensi($row['sk_kode']);
                                            if($row['nilai']< $ket['sk_kkm']){
                                                echo "<i style='color: #fd1515'>Tidak Kompeten</i>";
                                            }else{
                                                echo "<i style='color: #0080FF'>Kompeten</i>";
                                            }
                                            
                                            
                                            echo"</td>";
                                        
                                        $nomor++;
                                        }
                                        
                                                ?>
                                        <input type="hidden" name="sk" value="<?php echo $row[sk_kode]; ?>" />
                                        <input type="hidden" name="ujian" value="<?php echo $ujian[id_ujian]; ?>" />
                                        <input type="hidden" name="kelas" value="<?php echo $kelas[id_kelas]; ?>" />
                                        
                                        
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
                    
    
         