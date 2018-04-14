
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
      
                        
<?php
// Mendapatkan id niai yg akan ditampilkan
$data = $syntax->get_one_nilai($_GET['id_nilai']);
?>                         
 <form class="form-horizontal" action="" method="post">
     <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Edit Nilai</h3></legend><br> 
                                <div class="control-group">
                                    <label class="control-label">Nama Siswa</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="siswa" data-placeholder="Pilih Nama Siswa">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan siswa
                                         $siswa = $syntax->show_siswa();
                                         foreach($siswa as $row) {
                                         echo "<option value='".$row['siswa_nisn']."'";
                                         echo  $row['siswa_nisn']==$data['siswa_nisn'] ? 'selected' : '';
                                         echo ">$row[siswa_nama]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Nama Guru</label>
                                    <div class="controls">
                                       <select class="chosen span7" name="guru" data-placeholder="Pilih Nama Guru">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan guru
                                         $kode_guru = $syntax->show_guru();
                                         foreach($kode_guru as $row) {
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
                                    <label class="control-label">Nama Ujian</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="ujian" data-placeholder="Pilih Ujian">
                                         <option value="0"></option>
                                          <?php
                                         // Menampilkan pilihan ujian
                                         $ujian = $syntax->show_ujian();
                                         foreach($ujian as $u) {
                                         echo "<option value='".$u['id_ujian']."'";
                                         echo  $u['id_ujian']==$data['id_ujian'] ? 'selected' : '';
                                         echo ">$u[nama_ujian]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                 <div class="control-group">
                                    <label class="control-label">Mata Pelajaran</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="pelajaran" data-placeholder="Pilih Mata Pelajaran">
                                         <option value="0"></option>
                                          <?php
                                         // Menampilkan pilihan pelajaran
                                         $sk = $syntax->show_sk();
                                         foreach($sk as $p) {
                                         echo "<option value='".$p['sk_kode']."'";
                                         echo  $p['sk_kode']==$data['sk_kode'] ? 'selected' : '';
                                         echo ">$p[sk_nama]";
                                         echo "</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nilai</label>
                                    <div class="controls">
                                        <input name="nilai" value="<?php echo $data['nilai']; ?>" class="span1" type="number">
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
    // Proses edit data
    $id_nilai=$_GET['id_nilai'];
    $nis     = $_POST['siswa'];
    $guru    = $_POST['guru'];
    $ujian   = $_POST['ujian'];
    $pel     = $_POST['pelajaran'];
    $nilai   = $_POST['nilai'];
    $huruf   = Terbilang($_POST['nilai']);
    
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty ($_POST ["siswa"]) || empty($_POST["ujian"])
        || empty($_POST["pelajaran"]) || empty($_POST["nilai"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // Query update
        $syntax->edit_nilai($id_nilai,$nis,$guru,$ujian,$pel,$nilai,$huruf);
        echo "<script>window.location='media.php?module=nilai';</script>";
}
    }

    ?>


