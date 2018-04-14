
<section class="page container">
 <div class="span14 pull-left">
  <div class="row">
       
<?php
// Mendapatkan kode guru yg akan ditampilkan
$data = $syntax->get_one_guru($_GET['guru_kode']);
?>                       
                        
 <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
     <fieldset>
    <legend><h3 style="font-family: Footlight MT Light;">Edit Guru</h3></legend><br>
                                 <div class="control-group">
                                    <label class="control-label">Kode Guru</label>
                                    <div class="controls">
                                        <input name="guru_kode" disabled value="<?php echo $data[guru_kode]; ?>" class="span7" type="text">
                                        <i><small style="color: #0080FF">)* Kode Guru tidak bisa dirubah !</small></i>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">NIP</label>
                                    <div class="controls">
                                        <input name="nip" value="<?php echo $data[guru_nip]; ?>" placeholder="Masukan NIP . . . . ." class="span7" type="text">
                                        
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama</label>
                                    <div class="controls">
                                        <input name="nama" value="<?php echo $data[guru_nama]; ?>" placeholder="Masukan nama guru . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                  <label class="control-label">Foto</label>
                               <div class="controls">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 178px; height: 178px;"><img src="../photos/<?php echo $data[image_guru] ?>" alt="" /></div>
                                <div><br>
                                    <a href="#" class="btn btn-danger btn-small fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                    <span class="fileupload-new"></span><span class="fileupload-exists"></span><input type="file" name="gambar" />
                                </div>
                              </div>
                               </div><br><br>
                                <div class="control-group">
                                    <label class="control-label">Kompetensi Keahlian</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="kompetensi" data-placeholder="Pilih Kompetensi Keahlian">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kompetensi keahlian
                                         $kompetensi = $syntax->kompetensi_keahlian();
                                         foreach($kompetensi as $hasil) {
                                         echo "<option value='".$hasil['kompetensi_kode']."'";
                                         echo  $hasil['kompetensi_kode']==$data['kompetensi_kode'] ? 'selected' : '';
                                         echo ">$hasil[kompetensi_nama]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="controls">
                                        <textarea name="alamat" class="span7" type="text"><?php echo $data[guru_alamat]; ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">No. Telepon</label>
                                    <div class="controls">
                                        <input name="telpon" value="<?php echo $data[guru_telepon]; ?>" placeholder="Masukan no.telpon . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input name="email" value="<?php echo $data[email_guru]; ?>" placeholder="Masukan email . . . . ." class="span7" type="email">
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
    // Proses edit guru
    $guru_kode      = $_GET['guru_kode'];
    $nama           = $_POST['nama'];
    $nip            = $_POST['nip'];
    $kompetensi     = $_POST['kompetensi'];
    $alamat         = $_POST['alamat'];
    $telpon         = $_POST['telpon'];
    $email          = $_POST['email'];
    
     // Menentukan Nama Gambar
    $file       = $_FILES['gambar']['tmp_name'];
    $filename   = $_FILES['gambar']['name'];
    $dir        = "../photos/";
    $ok         = $dir.$filename;
    
    if(isset($_POST['save'])){
        
        // Melakukan validasi
        if (empty($_POST["nip"])|| empty($_POST["nama"])|| empty($_POST["email"])
                || empty($_POST["kompetensi"])|| empty($_POST["telpon"])|| empty($_POST["alamat"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
     // Menghapus gambar apabila di update
    if(!empty($file)) {
        $get_one    = $syntax->get_one_guru($_GET['guru_kode']);
        if($get_one['image_guru']!='') {
        unlink("../photos/$get_one[image_guru]");
                                         }
         
        // Query jika gambar berhasil di upload
        if(move_uploaded_file($file, $ok)) {
          $syntax->edit_guru1($guru_kode,$kompetensi,$nip,$nama,$alamat,$telpon,$email,$filename);
        echo "<script>window.location='media.php?module=guru';</script>";   
        }
    }else{
        
        // Query apabila tidak mengupload gamabar
        $syntax->edit_guru($guru_kode,$kompetensi,$nip,$nama,$alamat,$telpon,$email);
        echo "<script>window.location='media.php?module=guru';</script>";
    }
}
    }

    ?>


