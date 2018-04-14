
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
                     
 <form class="form-horizontal" action="" method="post">
      <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Bidang Studi</h3></legend><br> 
                                
                                 <div class="control-group">
                                    <label class="control-label">Kode Bidang</label>
                                   <div class="controls">
                                       <input name="bidang_kode" value="<?php
                                              $data=$syntax->jumlah_bidang_studi();
                                              $kode=$data+1;
                                              if($kode < 10){
                                                  echo "BS-00$kode";
                                              }else{
                                                  echo "BS-0$kode";
                                              }
                                              
                                              ?>" class="span7" disabled type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama Bidang</label>
                                    <div class="controls">
                                        <input name="bidang_nama" placeholder="Masukan nama bidang . . . . ." class="span7" type="text">
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
    // Input Bidang Studi
    $nama           = $_POST['bidang_nama'];
    
    if(isset($_POST['save'])){
        // Melakukan Validasi
        if (empty ($_POST ["bidang_nama"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // membuat kode bidang studi
    $data=$syntax->jumlah_bidang_studi();
    $kode=$data+1;
    if($kode < 10){
        $a="BS-00".$kode;
           $syntax->tambah_bidang_studi($a,$nama);
       echo "<script>window.location='media.php?module=bidang_studi';</script>";
       
     }else{
           $b="BS-0".$kode;
           $syntax->tambah_bidang_studi($b,$nama);
       echo "<script>window.location='media.php?module=bidang_studi';</script>";
      }
                                              
}
    }

    ?>


