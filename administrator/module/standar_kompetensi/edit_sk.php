
<section class="page container">
 <div class="span14 pull-left">
  <div class="row">
             
<?php
// Mendapatkan kode standar kompetensi yg akan ditampilkan
$data = $syntax->get_one_standar_kompetensi($_GET['sk_kode']);
?>                  
                        
 <form class="form-horizontal" action="" method="post">
     <input type="hidden" name="sk_kode" value="<?php echo $data; ?>">
     <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Edit Standar Kompetensi</h3></legend><br> 
                                 <div class="control-group">
                                    <label class="control-label">SK Kode</label>
                                    <div class="controls">
                                        <input name="sk_kode" value="<?php echo $data['sk_kode']; ?>" disabled class="span7" type="text">
                                        <i><small style="color: #0080FF">)* Kode Standar Kompetensi tidak bisa diubah !</small></i>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">SK Nama</label>
                                    <div class="controls">
                                        <input name="nama" value="<?php echo $data['sk_nama']; ?>" placeholder="Masukan SK Nama . . . . ." class="span7" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kompetensi Keahlian</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="kk" data-placeholder="Pilih Kompetensi Keahlian">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kompetensi keahlian
                                         $kompetensi = $syntax->kompetensi_keahlian();
                                         foreach($kompetensi as $row) {
                                         echo "<option value='".$row['kompetensi_kode']."'";
                                         echo  $row['kompetensi_kode']==$data['kompetensi_kode'] ? 'selected' : '';
                                         echo ">$row[kompetensi_nama]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                            <div class="control-group">
                                    <label class="control-label">Guru Pengajar</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="guru" data-placeholder="Pilih Guru Pengajar">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan guru pengajar
                                         $guru = $syntax->show_guru();
                                         foreach($guru as $row) {
                                         echo "<option value='".$row['guru_kode']."'";
                                         echo  $row['guru_kode']==$data['guru_kode'] ? 'selected' : '';
                                         echo ">$row[guru_nama]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Kelas</label>
                                    <div class="controls">
                                        <input name="kelas" value="<?php echo $data['sk_kelas']; ?>" placeholder="Masukan Kelas . . . . ." class="span1" type="text">
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Semester</label>
                                    <div class="controls">
                                        <input name="semester" value="<?php echo $data['sk_semester']; ?>" placeholder="Masukan Semester. . . . ." class="span1" type="number">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nilai KKM</label>
                                    <div class="controls">
                                        <input name="kkm" value="<?php echo $data['sk_kkm']; ?>" class="span1" type="number">
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
    $sk_kode    = $_GET['sk_kode'];
    $sk_nama    = $_POST['nama'];
    $kk         = $_POST['kk'];
    $kelas      = $_POST['kelas'];
    $semester   = $_POST['semester'];
    $kkm        = $_POST['kkm'];
    $gp         = $_POST['guru'];
    
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty($_POST["nama"])||empty($_POST["kk"]) ||empty($_POST["guru"])
                ||empty($_POST["kelas"])||empty($_POST["semester"])||empty($_POST["kkm"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query Update
        $syntax->edit_standar_kompetensi($sk_kode,$kk,$sk_nama,$kelas,$semester,$kkm,$gp);
        echo "<script>window.location='media.php?module=sk';</script>";
}
    }

    ?>


