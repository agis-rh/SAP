
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
                        
 <form class="form-horizontal" action="" method="post">
    <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Standar Kompetensi</h3></legend><br> 
                                 <div class="control-group">
                                    <label class="control-label">SK Kode</label>
                                    <div class="controls">
                                        <input name="kode" placeholder="Masukan SK Kode  . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">SK Nama</label>
                                    <div class="controls">
                                        <input name="nama" placeholder="Masukan SK Nama . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kompetensi Keahlian</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="kk" data-placeholder="Pilih Kompetensi Keahlian">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kompetensi keahlian
                                         $data = $syntax->kompetensi_keahlian();
                                         foreach ($data as $row){
                                             echo" <option value='$row[kompetensi_kode]'>$row[kompetensi_nama]</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                            <div class="control-group">
                                    <label class="control-label">Guru Pengajar</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="guru" data-placeholder="Pilih Guru Pengajar">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kompetensi keahlian
                                         $data = $syntax->show_guru();
                                         foreach ($data as $row){
                                             echo" <option value='$row[guru_kode]'>$row[guru_nama]</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kelas</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="kelas" data-placeholder="Pilih Kelas">
                                         <option value="0"></option>
                                         <option value="X">X (sepuluh)</option>
                                         <option value="XI">XI (sebelas)</option>
                                         <option value="XII">XII (dua belas)</option>
                                    </select>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Semester</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="semester" data-placeholder="Pilih Semester">
                                         <option value="0"></option>
                                         <option value="1">1 (satu)</option>
                                         <option value="2">2 (dua)</option>
                                         <option value="3">3 (tiga)</option>
                                         <option value="4">4 (empat)</option>
                                         <option value="5">5 (lima)</option>
                                         <option value="6">6 (enam)</option>
                                         
                                    </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nilai KKM</label>
                                    <div class="controls">
                                        <input name="kkm" class="span1" type="number">
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
    // Proses Input
    $sk_kode    = $_POST['kode'];
    $sk_nama    = $_POST['nama'];
    $kk         = $_POST['kk'];
    $kelas      = $_POST['kelas'];
    $semester   = $_POST['semester'];
    $kkm        = $_POST['kkm'];
    $guru       = $_POST['guru'];
    
    if(isset($_POST['save'])){
        // Melakukan Validasi
        if (empty ($_POST ["kode"])||empty($_POST["nama"])||empty($_POST["kk"]) ||empty($_POST["guru"])
                ||empty($_POST["kelas"])||empty($_POST["semester"])||empty($_POST["kkm"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query Insert
        $syntax->tambah_standar_kompetensi($sk_kode,$kk,$sk_nama,$kelas,$semester,$kkm,$guru);
        echo "<script>window.location='media.php?module=sk';</script>";
}
    }

    ?>


