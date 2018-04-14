
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
       
                        
                        
 <form class="form-horizontal" action="" method="post">
    <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Kelas</h3></legend><br>
                                
                                <div class="control-group">
                                    <label class="control-label">Nama Kelas</label>
                                    <div class="controls">
                                        <input name="nama_kelas" placeholder="Masukan nama kelas . . . . ." class="span7" type="text">
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
    // Proses input kelas
    $nama = $_POST['nama_kelas'];
    
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty ($_POST ["nama_kelas"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query insert
        $syntax->tambah_kelas($nama);
        echo "<script>window.location='media.php?module=kelas';</script>";
}
    }

    ?>


