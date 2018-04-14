
<section class="page container">
 <div class="span16 pull-left">
  <div class="row">
       
<?php
// Mendapatkan id yg akan ditampilkan
$data = $syntax->get_one_pengaturan($_GET['id_pengaturan']);
?>
                        
 <form class="form-horizontal" action="" method="post">
     <input type="hidden" name="id_ujian" value="<?php echo $data; ?>">
  <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Pengaturan</h3></legend><br> 
                                <div class="control-group">
                                    <label class="control-label">Nama Sekolah</label>
                                    <div class="controls">
                                        <input name="nama_sekolah" value="<?php echo $data['nama_sekolah']; ?>" placeholder="Masukan nama sekolah . . . . ." class="span10" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Alamat Sekolah</label>
                                    <div class="controls">
                                        <textarea name="alamat" placeholder="Alamat sekolah . . . . ." class="span10" ><?php echo $data['alamat_sekolah']; ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Keterangan Aplikasi</label>
                                    <div class="controls">
                                        <textarea name="keterangan" placeholder="Keterangan . . . . ." class="span10" ><?php echo $data['keterangan_aplikasi']; ?></textarea>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Judul Aplikasi</label>
                                    <div class="controls">
                                        <textarea name="title" placeholder="Judul . . . . ." class="span10" ><?php echo $data['title']; ?></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Halaman Paging</label>
                                    <div class="controls">
                                        <input name="paging" value="<?php echo $data['paging']; ?>" class="span1" type="number"> 
                                        <i><small style="color: #0080FF">)*  membuat link halaman setiap data tabel</small></i>
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
    $id_pengaturan   = $_GET['id_pengaturan'];
    $nama            = $_POST['nama_sekolah'];
    $alamat          = $_POST['alamat'];
    $title           = $_POST['title'];
    $keterangan      = $_POST['keterangan'];
    $paging          = $_POST['paging'];
    
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty ($_POST ["nama_sekolah"])||empty ($_POST ["alamat"])
            ||empty ($_POST ["keterangan"])||empty ($_POST ["paging"])||empty ($_POST ["title"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query Update
        $syntax->edit_pengaturan($id_pengaturan,$nama,$alamat,$title,$keterangan,$paging);
        echo "<script>window.location='media.php?module=pengaturan';</script>";
}
    }

    ?>




