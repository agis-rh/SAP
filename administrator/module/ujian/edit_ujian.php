
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
      
<?php
// Mendapatkan id yg akan ditampilkan
$data = $syntax->get_one_ujian($_GET['id_ujian']);
?>
 <form class="form-horizontal" action="" method="post">
         <input type="hidden" name="id_ujian" value="<?php echo $data; ?>">
         <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Edit Ujian</h3></legend><br> 
                                <div class="control-group">
                                    <label class="control-label">Nama Ujian</label>
                                    <div class="controls">
                                        <input name="nama_ujian" value="<?php echo $data['nama_ujian']; ?>" class="span7" type="text">
                                    </div>
                                </div>
                                <div class="conrol-group">
                                     <label class="control-label">Keterangan</label>
                                    <div class="controls">
                                        <textarea name="keterangan" class="span7"><?php echo $data['keterangan']; ?></textarea>
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
// Proses Edit
$id_ujian   = $_GET['id_ujian'];
$nama       = $_POST['nama_ujian'];
$keterangan = $_POST['keterangan'];

 if(isset($_POST['save'])){
     // Melakukan Validasi
        if (empty ($_POST ["nama_ujian"])||empty ($_POST ["keterangan"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
  }else{
      // Proses Update
        $syntax->edit_ujian($id_ujian,$nama,$keterangan);
        echo "<script>window.location='media.php?module=ujian';</script>";
}
    }

    ?>