<?php
// Mengambil NISN siswa yang akan ditampilkan
$data   = $syntax->detail_siswa($_GET['nisn']);
// Format tanggal Indonesia
$tgl = tgl_lahir($data['siswa_tgl_lahir']);
?>

<div class="span16">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-user"></i>
                        <h5>Profil <?php echo $data['siswa_nama']; ?></h5>
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                            <i class="icon-reorder"></i>
                        </button>
                    </div>
                    <div class="box-hide-me box-content out">
                        <div class="row">
                            
                         <!--informasi siswa--->
                        <div id="acct-password-row" class="span8">
                        <legend class="lead">
                            Informasi Siswa 
                        </legend>
                        <p><small style="color: #0080FF"><em>NISN :</em></small><br> 
			<?php echo $data['siswa_nisn']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Nama lengkap :</em></small><br> 
			<?php echo $data['siswa_nama']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Jenis Kelamin :</em></small><br> 
			<?php
                        if($data['siswa_jk']==L){
                            echo 'Laki-Laki';
                        }else{
                            echo 'Perempuan';
                        }
                        ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Kelas :</em></small><br> 
			<?php echo $data['nama_kelas']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Kompetensi Keahlian :</em></small><br> 
			<?php echo $data['kompetensi_nama']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Tempat Tgl Lahir :</em></small><br> 
			<?php echo $data['siswa_tmpt_lahir']. " ,$tgl"; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Alamat :</em></small><br> 
			<?php echo $data['siswa_alamat']; ?>
                        </p><br>
                        
                        <?php 
                        if($data[image]==''){
                           echo"<p><small style='color: #0080FF'><em>Foto :</em></small><br> </p>
                            <img src='../assets/images/upload.png'  width='180' height='180'>
                        <br>"; 
                        }else{
                        echo"<p><small style='color: #0080FF'><em>Foto :</em></small><br> </p>
                            <img src='../photos/$data[image]'  width='180' height='180'>
                        <br>";
                        }
                        ?>
                        
                        </div>
                         
                         
                         
                         <?php
                         // Mengambil NISN siswa yang akan ditampilkan
                          $wali   = $syntax->info_wali($_GET['nisn']);
                         ?>
                        <!---informasi wali siswa--->
                        <div id="acct-verify-row" class="span7">
                         <legend class="lead">
                            Informasi Wali Siswa 
                        </legend>
                        <p><small style="color: #0080FF"><em>Ayah :</em></small><br> 
			<?php echo $wali['wali_nama_ayah']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Pekerjaan Ayah :</em></small><br> 
			<?php echo $wali['wali_pekerjaan_ayah']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Ibu :</em></small><br> 
			<?php echo $wali['wali_nama_ibu']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Pekerjaan Ibu :</em></small><br> 
			<?php echo $wali['wali_pekerjaan_ibu']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Alamat Wali :</em></small><br> 
			<?php echo $wali['wali_alamat']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Telepon :</em></small><br> 
			<?php echo $wali['wali_telepon']; ?>
                        </p><br>
                        
                        </div>
                        
                        
                         <!---informasi kontak siswa--->
                         <div id="acct-verify-row" class="span7"><br><br><br>
                         <legend class="lead">
                            Informasi Kontak Siswa 
                        </legend>
                        <p><small style="color: #0080FF"><em>Nomor Telepon :</em></small><br> 
			<?php echo $data['kontak_siswa']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Email :</em></small><br> 
			<?php echo $data['email_siswa']; ?>
                        </p><br>
                        
                        </div>
                        
                        
                       
                        </div></div><br>
                    <div class="box-footer">
                       <a href='?module=edit_siswa&&nisn=<?php echo $data[siswa_nisn]; ?>' class='btn btn btn-primary'>
                          Edit Info Siswa  <i class='btn-icon-only icon-arrow-up'></i> 
                       </a> &nbsp; &nbsp; atau &nbsp; &nbsp;
                       <a href='?module=wali_info&&nisn=<?php echo $wali[siswa_nisn]; ?>' class='btn btn btn-inverse'>
                           Edit Info Wali  <i class='btn-icon-only icon-resize-full'></i> 
                       </a>
                    </div>
                </div>
            </div>