
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
      
                    
                    <?php
function anti_injection($data){
$filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
return $filter;
                     }
                                        $id_user              = $_SESSION['id_user'];
                                        $password_lama        = anti_injection(md5($_POST['lama']));
                                        $password_baru        = anti_injection(md5($_POST['baru']));
                                        $konfirmasi           = anti_injection(md5($_POST['konfirmasi']));
                                        $password             = anti_injection(md5($_POST['baru']));
                                        if(isset($_POST['save'])) {
                                            $cek_password = $syntax->cek_password($password_lama,$id_user);
                                            if($cek_password > 0) {
                                                if($password_baru==$konfirmasi) {
                                                    $syntax->edit_password($password,$id_user);
                                                    echo "
                                                        
                                          <div class='span10 alert alert-block alert-info well well-small well-shadow'>"
                                        . "<p><i class='icon-ok icon-large'></i> Password Anda telah berhasil di ganti !</p>"
                                                        . "</div>";
                                                }
                                                else {
                                                    echo "
                                                        
                                          <div class='span10 alert alert-block alert-danger well well-small well-shadow'>"
                                        . "<p><i class='icon-remove icon-large'></i> Konfirmasi password yang anda masukan tidak cocok, silahkan periksa kembali !</p>"
                                                        . "</div>";
                                                }
                                            }
                                            else {
                                               echo "
                                                        
                                          <div class='span10 alert alert-block alert-danger well well-small well-shadow'>"
                                        . "<p><i class='icon-remove icon-large'></i> Password lama yang anda masukan salah, silahkan cek kembali !</p>"
                                                        . "</div>";
                                            }
                                        }
                                        ?>

                  
                        
 <form class="form-horizontal" action="" method="post">
     <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Ganti Password</h3></legend><br> 
        
                                 <div class="control-group">
                                    <label class="control-label">Password Lama</label>
                                   <div class="controls">
                                       <input name="lama" placeholder="Masukan Password Lama . . . . ." class="span7" type="password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password Baru</label>
                                    <div class="controls">
                                        <input name="baru" placeholder="Masukan Password Baru . . . . ." class="span7" type="password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Ketik Ulang Password</label>
                                    <div class="controls">
                                        <input name="konfirmasi" placeholder="Ketik Ulang Password . . . . ." class="span7" type="password">
                                    </div>
                                </div>
            </fieldset><br/><br/><br/>
                        
 <!----button----->
  <footer class="form-actions">
      <button id="submit-button"  type="submit" class="btn btn-primary" name="save"><i class="icon-ok"></i> Save</button>
      <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Cancel</a>
  </footer>                 

 
</form>
</div>   
</div>
</section>

    

 
                   


