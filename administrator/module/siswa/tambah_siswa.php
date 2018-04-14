
<section class="page container">
 <div class="span14 pull-left">
  <div class="row">
      
<div class="span14">
 <div class="alert alert-block alert-info well well-small well-shadow">
    <p>
        <i class="icon-info-sign"></i> Apabila anda menambahkan data Siswa maka secara otomatis akan membuat satu akun
        untuk Siswa tersebut dengan :<br><br>
        Username: NISN Siswa yang anda masukan<br>
        Password : NISN Siswa yang anda masukan
    </p>
</div>
</div>
    <div class="span14">                   
                        
 <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
        <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Siswa</h3></legend><br> 
                                 <div class="control-group">
                                    <label class="control-label">NISN</label>
                                    <div class="controls">
                                        <input name="nisn" placeholder="Masukan NISN . . . . ." class="span7" type="text">
                                        <i><small style="color: #0080FF">)* Pastikan NISN yang dimasukan tidak salah !</small></i>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama</label>
                                    <div class="controls">
                                        <input name="nama" placeholder="Masukan Nama . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kelas</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="kelas" data-placeholder="Pilih Kelas">
                                         <option value="0"></option>
                                         <?php
                                         // Memilih kelas
                                         $kelas = $syntax->show_kelas();
                                         foreach ($kelas as $row){
                                             echo" <option value='$row[id_kelas]'>$row[nama_kelas]</option>";
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
                                         // Memilih kompetensi keahlian
                                         $data = $syntax->kompetensi_keahlian();
                                         foreach ($data as $hasil){
                                             echo" <option value='$hasil[kompetensi_kode]'>$hasil[kompetensi_nama]</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <div class="controls">
                                        <div class="radio">
                                        <input type='radio' name='jk' value='L' />L
                                        </div>
                                        <div class="radio">
                                        <input type='radio' name='jk' value='P' />P
                                        </div>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Tanggal Lahir</label>
                                    <div class="controls">
                                       <div class="input-prepend date">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                        <input class="span4 input-prepend date" name="ttl" type="date">
                                        </div>
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
                                    <label class="control-label">No.Telepon</label>
                                    <div class="controls">
                                        <input name="hp" placeholder="Masukan No.Telepon . . . . ." class="span7" type="text">
                                        
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input name="email" placeholder="Masukan Email . . . . ." class="span7" type="email">
                                       
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tempat Lahir</label>
                                    <div class="controls">
                                        <textarea name="tempat" placeholder="Masukan Tempat Lahir . . . . ." class="span7" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="controls">
                                        <textarea name="alamat" placeholder="Masukan Alamat . . . . ." class="span7" type="text"></textarea>
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
</section>

    
  
    <?php
    // Input Data Siswa
    
    $nisn           = $_POST['nisn'];
    $nama           = $_POST['nama'];
    $kelas          = $_POST['kelas'];
    $kompetensi     = $_POST['kompetensi'];
    $jk             = $_POST['jk'];
    $ttl            = $_POST['ttl'];
    $alamat         = $_POST['alamat'];
    $tempat         = $_POST['tempat'];
    $telpon         = $_POST['hp'];
    $email          = $_POST['email'];
    $password       = md5($_POST['nisn']);
    
    // Menyimpan nama dan mengupload foto
    $file       = $_FILES['gambar']['tmp_name'];
    $filename   = $_FILES['gambar']['name'];
    $dir        = "../photos/";
    $ok         = $dir.$filename;
    
    if(isset($_POST['save'])){
        
        // Melakukan validasi terhadap field yg kosong
        if (empty ($_POST ["nisn"])||empty($_POST["kelas"])||empty($_POST["nama"])||empty($_POST["jk"])
                ||empty($_POST["kompetensi"])||empty($_POST["ttl"])||empty($_POST["alamat"])
                ||empty($_POST["hp"])||empty($_POST["email"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query tanpa upload gamabar
    if(empty($file)) {
        $syntax->user_siswa($nisn,$nama,$nisn,$password,$file,$telpon,$alamat,$email);
        $syntax->tambah_siswa($nisn,$kelas,$kompetensi,$nama,$jk,$alamat,$ttl,$tempat,$email,$telpon,$file);
        echo "<script>window.location='media.php?module=siswa';</script>";
    }else{
        
     // Query dengan melakukan upload gambar
        if(move_uploaded_file($file, $ok)) {
           $syntax->user_siswa($nisn,$nama,$nisn,$password,$filename,$telpon,$alamat,$email);
           $syntax->tambah_siswa($nisn,$kelas,$kompetensi,$nama,$jk,$alamat,$ttl,$tempat,$email,$telpon,$filename);
        echo "<script>window.location='media.php?module=siswa';</script>";  
        }
    }
}
    }

    ?>


