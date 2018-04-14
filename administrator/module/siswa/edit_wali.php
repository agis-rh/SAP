
<?php
// Mendapatkan id yg akan ditampilkan
$data = $syntax->get_one_wali_info($_GET['nisn']);
?>  
<section class="page container">
 <div class="span11 pull-left">
  <div class="row">
                       
                        
 <form class="form-horizontal" action="" method="post">
     <fieldset>
    <legend><h3 style="font-family: Footlight MT Light;">Edit Wali Siswa</h3></legend><br>
                                 <div class="control-group">
                                    <label class="control-label">Nama Ayah</label>
                                    <div class="controls">
                                        <input name="ayah" value="<?php echo $data[wali_nama_ayah]; ?>" placeholder="Masukan nama ayah . . . . ." class="span4" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama Ibu</label>
                                    <div class="controls">
                                        <input name="ibu" value="<?php echo $data[wali_nama_ibu]; ?>"  placeholder="Masukan nama ibu . . . . ." class="span4" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Pekerjaan Ayah</label>
                                    <div class="controls">
                                        <input name="p_ayah" value="<?php echo $data[wali_pekerjaan_ayah]; ?>"  placeholder="Masukan pekerjaan ayah . . . . ." class="span4" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Pekerjaan Ibu</label>
                                    <div class="controls">
                                        <input name="p_ibu" value="<?php echo $data[wali_pekerjaan_ibu]; ?>"  placeholder="Masukan pekerjaan ibu . . . . ." class="span4" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">No. Telepon</label>
                                    <div class="controls">
                                        <input name="telpon" value="<?php echo $data[wali_telepon]; ?>"  placeholder="Masukan nomor telepon . . . . ." class="span4" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="controls">
                                        <textarea name="alamat"  placeholder="Masukan Alamat . . . . ." class="span4" type="text"><?php echo $data[wali_alamat]; ?></textarea>
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
    // Proses Edit
    $ayah           = $_POST['ayah'];
    $ibu            = $_POST['ibu'];
    $nisn           = $_GET['nisn'];
    $p_ayah         = $_POST['p_ayah'];
    $p_ibu          = $_POST['p_ibu'];
    $telpon         = $_POST['telpon'];
    $alamat         = $_POST['alamat'];
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty ($_POST ["ayah"])||empty($_POST["ibu"])||empty($_POST["p_ayah"])
                ||empty($_POST["p_ibu"])||empty($_POST["telpon"])||empty($_POST["alamat"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    // Query Update
        $syntax->edit_wali_info($nisn,$ayah,$ibu,$p_ayah,$p_ibu,$alamat,$telpon);
        echo "<script>window.location='media.php?module=detail_siswa&&nisn=$_GET[nisn]';</script>";
}
    }

    ?>


