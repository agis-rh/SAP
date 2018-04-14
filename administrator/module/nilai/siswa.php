<?php
require_once("../../../system/functions.php"); // masukan file functions.php
$syntax  = new Functions();
$db = new koneksi();
$arh=$syntax->get_one_kelas($_POST['kelas']);
?>
<head>



                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-user"></i>  <small><?php echo $arh['nama_kelas']; ?></small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                   <thead>
                                        <tr>
                                 
                                            <th width="5%">No.</th>
                                            <th width="20%">NISN</th>
                                            <th width="60%">Nama Siswa</th>
                                            <th width="15%">Nilai</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $data = $syntax->siswa($_POST['kelas']);
                                        $no   = 1;
                                        
                                        foreach ($data as $row){
                                        echo"<tr>
                                            <td>$no</td>
                                            <td>$row[siswa_nisn]</td>
                                            <td>$row[siswa_nama]</td>
                                             <td><input name='nilai[]' type='number'></td>
                                             <td><input type='hidden' name='nisn[]' value='$row[siswa_nisn]'></td>
                                        </tr>";
                                        
                                        $no++;
                                        }
                                       $f=$syntax->hitung_siswa($_POST['kelas']);
                                       echo "<td><input type='hidden' name='jumlah' value='$f'></td>";
                                        
                                        ?>
                                        
                                        
                                    </tbody>
                                </table>
    
    <div class="box-footer well well-small well-shadow"> 
        <input type='submit'class='btn btn-primary' name='kirim' value='Simpan'>
    </div>
    </div>
    </div>
    </div>
                   
 
    
         
         
      