
<section class="page container">
 <div class="span14 pull-left">
  <div class="row">
     
<?php
// Mendapatkan kode kompetensi yg akan ditampilkan
$data = $syntax->get_one_kompetensi_keahlian($_GET['kompetensi_kode']);
?>                  
                        
 <form class="form-horizontal" action="" method="post">
     <input type="hidden" name="kompetensi_kode" value="<?php echo $data; ?>">
      <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Edit Kompetensi Keahlian</h3></legend><br>
                                
                                
                                <div class="control-group">
                                    <label class="control-label">Kode Kompetensi</label>
                                    <div class="controls">
                                        <input name="kompetensi_kode" value="<?php echo $data['kompetensi_kode']; ?>" disabled class="span7" type="text"> 
                                        <i><small style="color: #0080FF">)* Kode Kompetensi tidak bisa diubah !</small></i>
                                    </div>
                                 </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama Kompetensi</label>
                                    <div class="controls">
                                        <input name="nama" value="<?php echo $data['kompetensi_nama']; ?>" class="span7" type="text">
                                    </div>
                                 </div>
                                <div class="control-group">
                                    <label class="control-label">Bidang Studi</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="bidang" data-placeholder="Pilih Bidang Studi">
                                         <option value="0"></option>
                                         <?php
                                         // Menentukan paging
                                         $bidang = $syntax->show_bidang_studi();
                                         foreach($bidang as $row) {
                                         echo "<option value='".$row['bidang_kode']."'";
                                         echo  $row['bidang_kode']==$data['bidang_kode'] ? 'selected' : '';
                                         echo ">$row[bidang_nama]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
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
    // Proses edit kompetensi keahlian
    $kode    = $_GET['kompetensi_kode'];
    $nama    = $_POST['nama'];
    $bidang  = $_POST['bidang'];
    
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty($_POST["nama"]) || empty($_POST["bidang"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query update
        $syntax->edit_kompetensi_keahlian($kode,$bidang,$nama);
        echo "<script>window.location='media.php?module=kompetensi_keahlian';</script>";
}
    }

    ?>


