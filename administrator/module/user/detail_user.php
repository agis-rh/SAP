<?php
// Mengambil id_user yang akan ditampilkan
$data   = $syntax->info_user($_GET['id_user']);
// Format tanggal Indonesia
$tgl = tgl_indo($data['last_login']);
?>

<div class="span16">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-user"></i>
                        <h5>Profil <?php echo $data['nama_user']; ?></h5>
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                            <i class="icon-reorder"></i>
                        </button>
                    </div>
                    <div class="box-hide-me box-content out">
                        <div class="row">
                            
                         <!--informasi siswa--->
                        <div id="acct-password-row" class="span8">
                        <legend class="lead">
                            Informasi User
                        </legend>
                        <p><small style="color: #0080FF"><em>ID User :</em></small><br> 
			<?php echo $data['id_user']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Nama User :</em></small><br> 
			<?php echo $data['nama_user']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Username :</em></small><br> 
			<?php echo $data['username']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Profesi :</em></small><br> 
			<?php echo $data['nama_profesi']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Alamat :</em></small><br> 
			<?php echo $data['alamat']; ?>
                        </p><br>
                        
                        
                        </div>
                         
                         
                         

                        
                         <!---informasi kontak user--->
                         <div id="acct-verify-row" class="span7">
                         <legend class="lead">
                            Informasi Kontak User 
                        </legend>
                        <p><small style="color: #0080FF"><em>Nomor Telepon :</em></small><br> 
			<?php echo $data['no_hp']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Email :</em></small><br> 
			<?php echo $data['email']; ?>
                        </p><br>
                        
                        <p><small style="color: #0080FF"><em>Terakhir Login :</em></small><br> 
                            <em style='color: #fd1515'> <?php
                                                        if($data['last_login']=='0000-00-00 00:00:00') {
                                                        echo"<b style='color:red'>Belum Pernah Login</b>";
                                                               }else {
                                                                    echo $tgl;
                                                                            }
                                                                           ?></em>
                        </p><br>
                        
                        <?php 
                        if($data[image_user]==''){
                           echo"<p><small style='color: #0080FF'><em>Foto :</em></small><br> </p>
                            <img src='../assets/images/upload.png'  width='180' height='180'>
                        <br>"; 
                        }else{
                        echo"<p><small style='color: #0080FF'><em>Foto :</em></small><br> </p>
                            <img src='../photos/$data[image_user]'  width='180' height='180'>
                        <br>";
                        }
                        ?>
                        </div>
                        
                        
                        
                       
                        </div></div><br>
                    <div class="box-footer">
                       <a href='?module=edit_user&&id_user=<?php echo $data[id_user]; ?>' class='btn btn btn-primary'>
                          Edit Info User <i class='btn-icon-only icon-arrow-right'></i> 
                       </a>
                       </a>
                    </div>
                </div>
            </div>