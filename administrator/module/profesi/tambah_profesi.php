
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
                        
                        
 <form class="form-horizontal" action="" method="post">
     <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Profesi</h3></legend><br> 
                                <div class="control-group">
                                    <label class="control-label">Nama Profesi</label>
                                    <div class="controls">
                                        <input name="nama" placeholder="Masukan nama profesi . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Keterangan</label>
                                    <div class="controls">
                                        <textarea name="keterangan" placeholder="Keterangan . . . . ." class="span7" ></textarea>
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
    $nama       = $_POST['nama'];
    $keterangan = $_POST['keterangan'];  
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty ($_POST ["nama"])||empty ($_POST ["keterangan"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    // Proses Insert
        $syntax->tambah_profesi($nama,$keterangan);
        echo "<script>window.location='media.php?module=profesi';</script>";
}
    }

    ?>




