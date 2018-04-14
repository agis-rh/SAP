
<section class="page container">
 <div class="span13 pull-left">
  <div class="row">

                    
<?php
// Mendapatkan bidang kode yg akan ditampilkan
$data = $syntax->get_one_bidang_studi($_GET['bidang_kode']);
?>
                    
                    
 <form class="form-horizontal" action="" method="post">
     <input type="hidden" name="bidang_kode" value="<?php echo $data; ?>">    
      <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Edit Bidang Studi</h3></legend><br>
                                
                                <div class="control-group">
                                    <label class="control-label">Kode Bidang</label>
                                    <div class="controls">
                                        <input name="bidang_kode" disabled value="<?php echo $data['bidang_kode']; ?>" class="span7" type="text"> 
                                        <i><small style="color: #0080FF">)* Kode Bidang tidak bisa diubah !</small></i>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama Bidang</label>
                                    <div class="controls">
                                        <input name="bidang_nama" value="<?php echo $data['bidang_nama']; ?>" class="span7" type="text">
                                    </div>
                                </div>
                            </fieldset><br/><br/><br/>
                        
 <!----Footer----->
 <footer class="form-actions">
      <button id="submit-button"  type="submit" class="btn btn-primary" name="save"><i class="icon-ok"></i> Save</button>
      <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Cancel</a>
 </footer>                  

 
</form>
</div>   
</div>
</section>

  


<?php
// Proses edit bidang studi
$bidang_kode = $_GET['bidang_kode'];
$nama        = $_POST['bidang_nama'];

 if(isset($_POST['save'])){
     // Melakukan validasi
        if (empty ($_POST ["bidang_nama"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
  }else{
     
      // Query Update
        $syntax->edit_bidang_studi($bidang_kode,$nama);
        echo "<script>window.location='media.php?module=bidang_studi';</script>";
}
    }

    ?>