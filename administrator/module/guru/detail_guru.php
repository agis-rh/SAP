<?php
// Mengambil NISN siswa yang akan ditampilkan
$data   = $syntax->detail_guru($_GET['kode']);
?>

<div class="span16">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-user"></i>
                        <h5>Profil Guru</h5>
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                            <i class="icon-reorder"></i>
                        </button>
                    </div>
                    <div class="box-hide-me box-content out">
                        <div class="row">
                            
                         <!--informasi siswa--->
                        <div id="acct-password-row" class="span8">
                        <legend class="lead">
                            Informasi Guru
                        </legend>
                        <p><small style="color: #0080FF"><em>Kode Guru :</em></small><br> 
			<?php echo $data['guru_kode']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Nomor Induk Pengajar (NIP) :</em></small><br> 
			<?php echo $data['guru_nip']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Nama Guru :</em></small><br> 
			<?php echo $data['guru_nama']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Kompetensi Keahlian :</em></small><br> 
			<?php echo $data['kompetensi_nama']; ?>
                        </p><br>
                        
                        
                        </div>
                         
                         
                        <!---informasi wali siswa--->
                        <div id="acct-verify-row" class="span7">
                         <legend class="lead">
                            Informasi Kontak 
                        </legend>
                        <p><small style="color: #0080FF"><em>No. Telepon :</em></small><br> 
			<?php echo $data['guru_telepon']; ?>
                        </p><br>
                        
                         <p><small style="color: #0080FF"><em>Email :</em></small><br> 
			<?php echo $data['email_guru']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Alamat :</em></small><br> 
			<?php echo $data['guru_alamat']; ?>
                        </p><br>
                        
                        <?php 
                        if($data[image_guru]==''){
                           echo"<p><small style='color: #0080FF'><em>Foto :</em></small><br> </p>
                            <img src='../assets/images/upload.png'  width='180' height='180'>
                        <br>"; 
                        }else{
                        echo"<p><small style='color: #0080FF'><em>Foto :</em></small><br> </p>
                            <img src='../photos/$data[image_guru]'  width='180' height='180'>
                        <br>";
                        }
                        ?>
                        
                        </div>
                         
                         </div></div>
                    <div class="box-footer">
                       <a href='?module=edit_guru&&guru_kode=<?php echo $data[guru_kode]; ?>' class='btn btn btn-primary'>
                          Edit Profil  <i class='btn-icon-only icon-arrow-right'></i> 
                       </a>
                    </div>
                </div>
            </div>