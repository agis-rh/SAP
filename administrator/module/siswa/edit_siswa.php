
<section class="page container">
 <div class="span14 pull-left">
  <div class="row">
       
<?php
// Mendapatkan NISN siswa yg akan ditampilkan
$data = $syntax->get_one_siswa($_GET['nisn']);
?>                     
                        
 <form class="form-horizontal"  enctype="multipart/form-data" action="" method="post">
    <fieldset>
    <legend><h3 style="font-family: Footlight MT Light;">Edit Siswa</h3></legend><br>
                                 <div class="control-group">
                                    <label class="control-label">NISN</label>
                                    <div class="controls">
                                        <input name="nisn" value="<?php echo $data['siswa_nisn'] ?>" disabled class="span7" type="text">
                                        <i><small style="color: #0080FF">)* NISN tidak bisa diubah !</small></i>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama</label>
                                    <div class="controls">
                                        <input name="nama" value="<?php echo $data['siswa_nama'] ?>" class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kelas</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="kelas" data-placeholder="Pilih Kelas">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kelas
                                         $kelas = $syntax->show_kelas();
                                         foreach($kelas as $row) {
                                         echo "<option value='".$row['id_kelas']."'";
                                         echo  $row['id_kelas']==$data['id_kelas'] ? 'selected' : '';
                                         echo ">$row[nama_kelas]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
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
                                    <label class="control-label">Jenis Kelamin</label>
                                    <div class="controls">
                                        <?php
                                        // Menampilkan jenis kelamin
                                        if($data[siswa_jk]=='L'){
                                        echo"<div class='radio'>
                                        <input type='radio' name='jk' value='L' checked />L
                                        </div>
                                        <div class='radio'>
                                        <input type='radio' name='jk' value='P' />P
                                        </div>";
                                        }else{
                                          echo"<div class='radio'>
                                        <input type='radio' name='jk' value='L' />L
                                        </div>
                                        <div class='radio'>
                                        <input type='radio' name='jk' value='P' checked />P
                                        </div>";  
                                        }
                                        ?>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Tanggal Lahir</label>
                                    <div class="controls">
                                       <div class="input-prepend date">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                        <input class="span4 input-prepend date" value="<?php echo $data[siswa_tgl_lahir]; ?>" name="ttl" type="date">
                                        </div>
                                    </div>
                                </div>
                                 <label class="control-label">Foto</label>
                               <div class="controls">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 178px; height: 178px;"><img src="../photos/<?php echo $data[image] ?>" alt="" /></div>
                                <div><br>
                                    <a href="#" class="btn btn-danger btn-small fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                    <span class="fileupload-new"></span><span class="fileupload-exists"></span><input type="file" name="gambar" />
                                </div>
                              </div>
                               </div><br><br>
                                 <div class="control-group">
                                    <label class="control-label">No.Telepon</label>
                                    <div class="controls">
                                        <input name="hp" value="<?php echo $data[kontak_siswa]; ?>" class="span7" type="text">
                                        
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input name="email" value="<?php echo $data[email_siswa]; ?>" class="span7" type="email">
                                       
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tempat Lahir</label>
                                    <div class="controls">
                                        <textarea name="tempat" class="span7" type="text"><?php echo $data[siswa_tmpt_lahir]; ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="controls">
                                        <textarea name="alamat" class="span7" type="text"><?php echo $data[siswa_alamat]; ?></textarea>
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
 </div>
 </div>
</section>

    

    <?php
    // edit siswa
    
    $nisn           = $_GET['nisn'];
    $nama           = $_POST['nama'];
    $kelas          = $_POST['kelas'];
    $kompetensi     = $_POST['kompetensi'];
    $jk             = $_POST['jk'];
    $ttl            = $_POST['ttl'];
    $alamat         = $_POST['alamat'];
    $tempat         = $_POST['tempat'];
    $email          = $_POST['email'];
    $kontak         = $_POST['hp'];
    
    
    // Menentukan Nama Gambar
    $file       = $_FILES['gambar']['tmp_name'];
    $filename   = $_FILES['gambar']['name'];
    $dir        = "../photos/";
    $ok         = $dir.$filename;
    
    if(isset($_POST['save'])){
        // Melakukan validasi terhadap field yg kosong
        if (empty($_POST["kelas"])||empty($_POST["nama"])||empty($_POST["jk"])
                ||empty($_POST["kompetensi"])||empty($_POST["ttl"])||empty($_POST["alamat"])
                ||empty($_POST["email"])||empty($_POST["hp"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Menghapus gambar apabila di update
    if(!empty($file)) {
        $get_one    = $syntax->get_one_siswa($_GET['nisn']);
        if($get_one['image']!='') {
        unlink("../photos/$get_one[image]");
                                         }
         
        // Query jika gambar berhasil di upload
        if(move_uploaded_file($file, $ok)) {
          $syntax->edit_siswa($nisn,$kelas,$kompetensi,$nama,$jk,$alamat,$ttl,$tempat,$email,$kontak,$filename);
        echo "<script>window.location='media.php?module=siswa';</script>";   
        }
    }else{
        
        // Query apabila tidak mengupload gamabar
        $syntax->edit_siswa1($nisn,$kelas,$kompetensi,$nama,$jk,$alamat,$ttl,$tempat,$email,$kontak);
        echo "<script>window.location='media.php?module=siswa';</script>";
    }
}
    }

    ?>


