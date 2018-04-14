
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
                        
 <form class="form-horizontal" action="" method="post">
        <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Wali Murid</h3></legend><br> 
                                 <div class="control-group">
                                    <label class="control-label">Nama Ayah</label>
                                    <div class="controls">
                                        <input name="ayah" placeholder="Masukan nama ayah . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama Ibu</label>
                                    <div class="controls">
                                        <input name="ibu" placeholder="Masukan nama ibu . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Wali dari</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="siswa" data-placeholder="Pilih Siswa">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan siswa
                                         $siswa = $syntax->show_siswa();
                                         foreach ($siswa as $r){
                                             echo" <option value='$r[siswa_nisn]'>$r[siswa_nama]</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Pekerjaan Ayah</label>
                                    <div class="controls">
                                        <input name="p_ayah" placeholder="Masukan pekerjaan ayah . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Pekerjaan Ibu</label>
                                    <div class="controls">
                                        <input name="p_ibu" placeholder="Masukan pekerjaan ibu . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">No. Telepon</label>
                                    <div class="controls">
                                        <input name="telpon" placeholder="Masukan nomor telepon . . . . ." class="span7" type="text">
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
</section>

    
  
    <?php
    // Proses Input
    $ayah           = $_POST['ayah'];
    $ibu            = $_POST['ibu'];
    $nisn           = $_POST['siswa'];
    $p_ayah         = $_POST['p_ayah'];
    $p_ibu          = $_POST['p_ibu'];
    $telpon         = $_POST['telpon'];
    $alamat         = $_POST['alamat'];
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty ($_POST ["ayah"])||empty($_POST["ibu"])||empty($_POST["siswa"])||empty($_POST["p_ayah"])
                ||empty($_POST["p_ibu"])||empty($_POST["telpon"])||empty($_POST["alamat"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    // Qurery Insert
        $syntax->tambah_wali($nisn,$ayah,$ibu,$p_ayah,$p_ibu,$alamat,$telpon);
        echo "<script>window.location='media.php?module=wali';</script>";
}
    }

    ?>


