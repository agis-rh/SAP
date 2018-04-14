
<section class="page container">
 <div class="span16 pull-left">
  <div class="row">     
                        
 <form class="form-horizontal" action="" method="post">
    <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Pengaturan</h3></legend><br> 
        
                                <div class="control-group">
                                    <label class="control-label">Nama Sekolah</label>
                                    <div class="controls">
                                        <input name="nama_sekolah" placeholder="Masukan nama sekolah . . . . ." class="span10" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Alamat Sekolah</label>
                                    <div class="controls">
                                        <textarea name="alamat" placeholder="Alamat sekolah . . . . ." class="span10" ></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Keterangan Aplikasi</label>
                                    <div class="controls">
                                        <textarea name="keterangan" placeholder="Keterangan . . . . ." class="span10" ></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Halaman Paging</label>
                                    <div class="controls">
                                        <input name="paging" class="span1" type="number">
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
    $nama       = $_POST['nama_sekolah'];
    $alamat     = $_POST['alamat'];
    $keterangan = $_POST['keterangan'];
    $paging     = $_POST['paging'];
    
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty ($_POST ["nama_sekolah"])|| empty ($_POST ["alamat"]) || 
                empty ($_POST ["keterangan"]) || empty ($_POST ["paging"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query insert
        $syntax->tambah_pengaturan($nama,$alamat,$keterangan,$paging);
        echo "<script>window.location='media.php?module=pengaturan';</script>";
}
    }

    ?>




