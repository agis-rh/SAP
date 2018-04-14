
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
     
<?php
// Mendapatkan id kelas yg akan ditampilkan
$data = $syntax->get_one_kelas($_GET['id_kelas']);
?>
 <form class="form-horizontal" action="" method="post">
    <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Edit Kelas</h3></legend><br>
                                <div class="control-group">
                                    <label class="control-label">Nama Kelas</label>
                                    <div class="controls">
                                        <input type="hidden" name="id_kelas" value="<?php echo $data; ?>">
                                        <input name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" class="span7" type="text">
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
// Proses edit kelas
$id_kelas = $_GET['id_kelas'];
$nama     = $_POST['nama_kelas'];

 if(isset($_POST['save'])){
     // Melakukan validasi
        if (empty ($_POST ["nama_kelas"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
  }else{
      
      // Query edit kelas
        $syntax->edit_kelas($id_kelas,$nama);
        echo "<script>window.location='media.php?module=kelas';</script>";
}
    }

    ?>