
<section class="page container">
 <div class="span13 pull-left">
  <div class="row">
       
                        
                        
 <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
         <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah User</h3></legend><br> 
        
                                 <div class="control-group">
                                    <label class="control-label">ID User</label>
                                    <div class="controls">
                                        <input name="id" value="<?php
                                              $data=$syntax->jumlah_user();
                                              $kode=$data+1;
                                              if($kode < 10){
                                                  echo "US-00$kode";
                                              }else{
                                                  echo "US-0$kode";
                                              }
                                              
                                              ?>" class="span7" type="text" disabled>
                                        
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama</label>
                                    <div class="controls">
                                        <input name="nama" placeholder="Masukan Nama User . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Username</label>
                                    <div class="controls">
                                        <input name="username" placeholder="Masukan Username . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input name="password" placeholder="Masukan Password . . . . ." class="span7" type="password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Profesi</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="profesi" data-placeholder="Pilih Profesi">
                                         <option value="0"></option>
                                         <?php
                                         // Memilih profesi
                                         $profesi = $syntax->show_profesi();
                                         foreach ($profesi as $row){
                                             echo" <option value='$row[id_profesi]'>$row[nama_profesi]</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                
                                 <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input name="email" placeholder="Masukan Email . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">No.Telepon</label>
                                    <div class="controls">
                                        <input name="hp" placeholder="Masukan Nomor Telepon . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="controls">
                                        <textarea name="alamat" placeholder="Masukan Alamat . . . . ." class="span7" type="text"></textarea>
                                    </div>
                                </div>
                                
                                <label class="control-label">Foto</label>
                               <div class="controls">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 178px; height: 178px;"><img src="../assets/images/upload.png" alt="" /></div>
                                <div><br>
                                    <a href="#" class="btn btn-danger btn-small fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                    <span class="fileupload-new"></span><span class="fileupload-exists"></span><input type="file" name="gambar" />
                                </div>
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

    
  
    <?php
    // Input Data User
    
    $nama           = $_POST['nama'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']);
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
        
        // Melakukan validasi terhadap field yg kosong
        if (empty($_POST["nama"])||empty($_POST["username"])||empty($_POST["password"])
                ||empty($_POST["profesi"])||empty($_POST["hp"])||empty($_POST["alamat"])||empty($_POST["email"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
     // membuat id user
    $data=$syntax->jumlah_user();
    $kode=$data+1;
    if($kode < 10){
        $a="US-00".$kode;
        
            
    // Query tanpa upload gamabar
    if(empty($file)) {
        $syntax->tambah_user($a,$nama,$username,$password,$profesi,$file,$hp,$alamat,$email);
        echo "<script>window.location='media.php?module=user';</script>";
    }else{
        
     // Query dengan melakukan upload gambar
        if(move_uploaded_file($file, $ok)) {
           $syntax->tambah_user($a,$nama,$username,$password,$profesi,$filename,$hp,$alamat,$email);
        echo "<script>window.location='media.php?module=user';</script>";  
        }
    }
        
       
     }else{
           $b="US-0".$kode;
               
    // Query tanpa upload gamabar
    if(empty($file)) {
        $syntax->tambah_user($b,$nama,$username,$password,$profesi,$file,$hp,$alamat,$email);
        echo "<script>window.location='media.php?module=user';</script>";
    }else{
        
     // Query dengan melakukan upload gambar
        if(move_uploaded_file($file, $ok)) {
           $syntax->tambah_user($b,$nama,$username,$password,$profesi,$filename,$hp,$alamat,$email);
        echo "<script>window.location='media.php?module=user';</script>";  
        }
    }
          
      }

}
    }

    ?>


