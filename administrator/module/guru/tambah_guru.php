
<section class="page container">
<div class="row"> 
    
<div class="span14">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Apabila anda menambahkan data Guru maka secara otomatis akan membuat satu akun
        untuk Guru tersebut dengan :<br><br>
        Username: NIP Guru yang anda masukan<br>
        Password : NIP Guru yang anda masukan
    </p>
</div>
</div>
    
 <div class="span14">                      
 <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
      <fieldset>
          <legend><h3 style="font-family: Footlight MT Light;">Tambah Guru</h3></legend><br>
                                 <div class="control-group">
                                    <label class="control-label">Kode Guru</label>
                                    <div class="controls">
                                        <input name="guru_kode" value="<?php
                                        $data=$syntax->jumlah_guru();
                                              $kode=$data+1;
                                              if($kode < 10){
                                                  echo "G-00$kode";
                                              }else{
                                                  echo "G-0$kode";
                                              }
                                              ?>" disabled class="span7" type="text">
                                        <i><small style="color: #0080FF">)* Pastikan kode yang dimasukan tidak salah !</small></i>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">NIP</label>
                                    <div class="controls">
                                        <input name="nip" placeholder="Masukan NIP . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama</label>
                                    <div class="controls">
                                        <input name="nama" placeholder="Masukan nama guru . . . . ." class="span7" type="text">
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
                               </div><br>
                                <div class="control-group">
                                    <label class="control-label">Kompetensi Keahlian</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="kompetensi" data-placeholder="Pilih Kompetensi Keahlian">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kompetensi keahlian
                                         $kompetensi = $syntax->kompetensi_keahlian();
                                         foreach ($kompetensi as $row){
                                             echo" <option value='$row[kompetensi_kode]'>$row[kompetensi_nama]</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="controls">
                                        <textarea name="alamat" placeholder="Masukan Alamat . . . . ." class="span7" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">No. Telepon</label>
                                    <div class="controls">
                                        <input name="telpon" placeholder="Masukan no.telepon . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input name="email" placeholder="Masukan Email. . . . ." class="span7" type="email">
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
    // Proses Input Guru
    $nama           = $_POST['nama'];
    $nip            = $_POST['nip'];
    $kompetensi     = $_POST['kompetensi'];
    $alamat         = $_POST['alamat'];
    $telpon         = $_POST['telpon'];
    $pas            = md5($_POST['nip']);
    $email          = $_POST['email'];
    
     // Menyimpan nama dan mengupload foto
    $file       = $_FILES['gambar']['tmp_name'];
    $filename   = $_FILES['gambar']['name'];
    $dir        = "../photos/";
    $ok         = $dir.$filename;
    
    if(isset($_POST['save'])){
        
        // Melakukan Validasi
        if (empty($_POST["nip"])|| empty($_POST["nama"])|| empty($_POST["email"])
                || empty($_POST["kompetensi"]) || empty($_POST["telpon"])|| empty($_POST["alamat"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // membuat kode guru secara otomatis
    $data=$syntax->jumlah_guru();
    $kode=$data+1;
    if($kode < 10){
    $g1="G-00".$kode;
    
         // Query tanpa upload gamabar
    if(empty($file)) {
        $syntax->user_guru($g1,$nama,$nip,$pas,$file,$telpon,$alamat,$email);
        $syntax->tambah_guru($g1,$kompetensi,$nip,$nama,$alamat,$telpon,$email,$file);
        echo "<script>window.location='media.php?module=guru';</script>";
    }else{
        
     // Query dengan melakukan upload gambar
        if(move_uploaded_file($file, $ok)) {
           $syntax->user_guru($g1,$nama,$nip,$pas,$filename,$telpon,$alamat,$email);
           $syntax->tambah_guru($g1,$kompetensi,$nip,$nama,$alamat,$telpon,$email,$filename);
        echo "<script>window.location='media.php?module=guru';</script>";  
        }
    }
    
        }else{
    $g2="G-0".$kode;
    
         // Query tanpa upload gamabar
    if(empty($file)) {
        $syntax->user_guru($g2,$nama,$nip,$pas,$file,$telpon,$alamat,$email);
        $syntax->tambah_guru($g2,$kompetensi,$nip,$nama,$alamat,$telpon,$email,$file);
        echo "<script>window.location='media.php?module=guru';</script>";
    }else{
        
     // Query dengan melakukan upload gambar
        if(move_uploaded_file($file, $ok)) {
           $syntax->user_guru($g2,$nama,$nip,$pas,$filename,$telpon,$alamat,$email);
           $syntax->tambah_guru($g2,$kompetensi,$nip,$nama,$alamat,$telpon,$email,$filename);
        echo "<script>window.location='media.php?module=guru';</script>";  
        }
    }
    
        }

}
    }
    ?>


