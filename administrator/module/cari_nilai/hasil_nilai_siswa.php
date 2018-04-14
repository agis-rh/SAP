<?php
 $a=$_POST['siswa'];
 $b=$_POST['ujian'];
 $c=$_POST['sk'];
 $d=$_SESSION['id_user'];
 $data=$syntax->cari_nilai_siswa($a,$b,$c,$d);
 
 if(empty($data)){
     // Apabila tidak ada data yang ditemukan
     
     $e=$syntax->get_one_standar_kompetensi($_POST['sk']);
     $f=$syntax->get_one_ujian($_POST['ujian']);
    echo "<script>window.location='media.php?module=not_found';</script>";
    
 }else{
?>
<div class="alert alert-block alert-info span12">
                        <p>
                        <i class='icon-ok icon-large'></i>    Hasil Pencarian Untuk Nilai  <?php echo $data['nama_ujian']; ?> <b><?php echo $data['sk_nama']; ?></b>
                        </p>
                    </div>
                    <div class="row">
                        <div id="acct-password-row" class="span7">
                           
                                <legend><span style="font-family: Footlight MT Light;">Informasi Siswa</span></legend><br>
                                
                                
                                <p><small style="color: #0080FF"><em>NISN :</em></small><br> 
                                <?php echo $data['siswa_nisn']; ?>
                                </p><br>
                                
                                <p><small style="color: #0080FF"><em>Nama Siswa :</em></small><br> 
                                <?php echo $data['siswa_nama']; ?>
                                </p><br>
                                
                                <p><small style="color: #0080FF"><em>Standar Kompetensi :</em></small><br> 
                                <?php echo $data['sk_nama']; ?>
                                </p><br>
                                
                                <p><small style="color: #0080FF"><em>Nama Ujian :</em></small><br> 
                                <?php echo $data['nama_ujian']; ?>
                                </p><br>
                                
                                
                           
                        </div>
                        
                        <div id="acct-verify-row" class="span7">
                                <legend>
                                <span style="font-family: Footlight MT Light;">Informasi Nilai</span> 
                                </legend><br>
                                    
                                <?php
                               
                              
                                echo"<p><small style='color: #0080FF'><em>Nilai :</em></small><br> 
                                $data[nilai]
                                </p><br>";
                                
                                echo"<p><small style='color: #0080FF'><em>Nilai Huruf :</em></small><br> 
                                $data[nilai_huruf]
                                </p><br>";
                              
                                $stk=$syntax->get_one_standar_kompetensi($_POST['sk_kode']);
                                if($data[nilai]< $stk[sk_kkm]){
                                   echo"<p><small style='color: #0080FF'><em>Keterangan :</em></small><br> 
                                <div style='color:red;'>Tidak Kompeten</div>
                                </p><br>"; 
                                }else{
                                   echo"<p><small style='color: #0080FF'><em>Keterangan :</em></small><br> 
                                Kompeten
                                </p><br>";  
                                }
                                
                                ?> 
                                <p><small style="color: #0080FF"><em>Nama Guru :</em></small><br> 
                                <?php echo $data['guru_nama']; ?>
                                </p><br>
                                
                                </div>
                                </div>
 <?php
 
                                }