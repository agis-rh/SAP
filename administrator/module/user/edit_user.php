
<section class="page container">
 <div class="span14 pull-left">
  <div class="row">
    
                          
                        
 <?php
// Mendapatkan id user siswa yg akan ditampilkan
$data = $syntax->get_one_user($_GET['id_user']);
?>                       
 <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
     <fieldset>
    <legend><h3 style="font-family: Footlight MT Light;">Edit User</h3></legend><br>
                            
                                 <div class="control-group">
                                    <label class="control-label">ID User</label>
                                    <div class="controls">
                                        <input value="<?php echo $data['id_user'] ?>" disabled name="id" placeholder="Masukan ID User . . . . ." class="span7" type="text">
                                        
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama</label>
                                    <div class="controls">
                                        <input name="nama" value="<?php echo $data['nama_user'] ?>" placeholder="Masukan Nama User . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Username</label>
                                    <div class="controls">
                                        <input name="username" value="<?php echo $data['username'] ?>" placeholder="Masukan Username . . . . ." class="span7" type="text">
                                        <i><small style="color: #0080FF">)* Username tdiak boleh menggunakan karakter spesial (#.>*, dsb.)</small></i>
                                    </div>
                                 </div>
                                <div class="control-group">
                                    <label class="control-label">Profesi</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="profesi" data-placeholder="Pilih Profesi">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan profesi
                                         $profesi = $syntax->show_profesi();
                                         foreach($profesi as $row) {
                                         echo "<option value='".$row['id_profesi']."'";
                                         echo  $row['id_profesi']==$data['id_profesi'] ? 'selected' : '';
                                         echo ">$row[nama_profesi]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>

                                  <label class="control-label">Foto</label>
                               <div class="controls">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 178px; height: 178px;"><img src="../photos/<?php echo $data[image_user] ?>" alt="" /></div>
                                <div><br>
                                    <a href="#" class="btn btn-danger btn-small fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                    <span class="fileupload-new"></span><span class="fileupload-exists"></span><input type="file" name="gambar" />
                                </div>
                              </div>
                               </div><br><br>
                                 <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input name="email" value="<?php echo $data['email'] ?>" placeholder="Masukan Email . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">No.Telepon</label>
                                    <div class="controls">
                                        <input name="hp" value="<?php echo $data['no_hp'] ?>" placeholder="Masukan Nomor Telepon . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="controls">
                                        <textarea name="alamat" placeholder="Masukan Alamat . . . . ." class="span7" type="text"><?php echo $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                                 <?php
                                 if($_SESSION['id_profesi']==1){
                                echo"<div class='control-group'>
                                    <label class='control-label'>Akun Aktif</label>
                                    <div class='controls'>";
                                        // Menampilkan akun aktif
                                        if($data[aktif]=='Y'){
                                        echo"<div class='radio'>
                                        <input type='radio' name='aktif' value='Y' checked />Y
                                        </div>
                                        <div class='radio'>
                                        <input type='radio' name='aktif' value='N' />T
                                        </div>";
                                        }else{
                                          echo"<div class='radio'>
                                        <input type='radio' name='aktif' value='Y'/>Y
                                        </div>
                                        <div class='radio'>
                                        <input type='radio' name='aktif' value='N'  checked  />T
                                        </div>"; 
                                        }
                                 }
                                        ?>
                                    </div>
                                </div>
      
            </fieldset><br/><br/><br/>
                        
 <!----button----->
   <footer id="submit-actions" class="form-actions">
      <button id="submit-button"  type="submit" class="btn btn-primary" name="save"><i class="icon-ok"></i> Save</button>
      <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Cancel</a>
   </footer>                  

 
</form>
</section>

    
  
    <?php
    // Edit Data User
    
    $id             = $_GET['id_user'];
    $nama           = $_POST['nama'];
    $username       = $_POST['username'];
    $profesi        = $_POST['profesi'];
    $hp             = $_POST['hp'];
    $alamat         = $_POST['alamat'];
    $email          = $_POST['email'];
    // Menyimpan nama dan mengupload foto
    $file       = $_FILES['gambar']['tmp_name'];
    $filename   = $_FILES['gambar']['name'];
    $dir        = "../photos/";
    $ok         = $dir.$filename;
    
    if(isset($_POST['save'])){
        
        if($_SESSION['id_profesi']==1){
    $aktif          = $_POST['aktif'];
    }else{
        $aktif = Y;
    }
        
        // Melakukan validasi terhadap field yg kosong
        if (empty($_POST["nama"])||empty($_POST["username"])
                ||empty($_POST["profesi"])||empty($_POST["hp"])||empty($_POST["alamat"])||empty($_POST["email"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Menghapus gambar apabila di update
    if(!empty($file)) {
        $get_one    = $syntax->get_one_user($_GET['id_user']);
        if($get_one['image_user']!='') {
        unlink("../photos/$get_one[image_user]");
                                         }
         
        // Query jika gambar berhasil di upload
        if(move_uploaded_file($file, $ok)) {
          $syntax->edit_user($id,$nama,$username,$profesi,$filename,$hp,$alamat,$email,$aktif);
        echo "<script>window.location='media.php?module=detail_user&&id_user=$id';</script>";   
        }
    }else{
        
        // Query apabila tidak mengupload gamabar
        $syntax->edit_user1($id,$nama,$username,$profesi,$hp,$alamat,$email,$aktif);
        echo "<script>window.location='media.php?module=detail_user&&id_user=$id';</script>";
    }
}
    }

    ?>


