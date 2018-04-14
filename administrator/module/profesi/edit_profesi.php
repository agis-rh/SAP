
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
     
       
<?php
// Mendapatkan id yg akan ditampilkan
$data = $syntax->get_one_profesi($_GET['id_profesi']);
?>
 <form class="form-horizontal" action="" method="post">
         <input type="hidden" name="id_profesi" value="<?php echo $data; ?>">
    <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Edit Profesi</h3></legend><br> 
                                <div class="control-group">
                                    <label class="control-label">Nama Profesi</label>
                                    <div class="controls">
                                        <input name="nama" value="<?php echo $data['nama_profesi']; ?>" class="span7" type="text">
                                    </div>
                                </div>
                                <div class="conrol-group">
                                     <label class="control-label">Keterangan</label>
                                    <div class="controls">
                                        <textarea name="keterangan" class="span7"><?php echo $data['keterangan_profesi']; ?></textarea>
                                    </div>
                                </div>
                                  <div class="control-group">
                                    <label class="control-label">Profesi Aktif</label>
                                    <div class="controls">
                                        <?php
                                        // Menampilkan akun aktif
                                        if($data[profesi_aktif]=='Y'){
                                        echo"<div class='radio'>
                                        <input type='radio' name='aktif' value='Y' checked />Y
                                        </div>
                                        <div class='radio'>
                                        <input type='radio' name='aktif' value='N' />T
                                        </div>";
                                        }else{
                                          echo"<div class='radio'>
                                        <input type='radio' name='aktif' value='Y'/>Y
                                        </div>
                                        <div class='radio'>
                                        <input type='radio' name='aktif' value='N'  checked  />T
                                        </div>"; 
                                        }
                                        ?>
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
$id_profesi = $_GET['id_profesi'];
$nama       = $_POST['nama'];
$keterangan = $_POST['keterangan'];
$aktif      = $_POST['aktif'];
 if(isset($_POST['save'])){
     // Melakukan Validasi
        if (empty ($_POST ["nama"])||empty ($_POST ["keterangan"])||empty ($_POST ["aktif"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
  }else{
      // Proses Update
        $syntax->edit_profesi($id_profesi,$nama,$keterangan,$aktif);
        echo "<script>window.location='media.php?module=profesi';</script>";
}
    }

    ?>