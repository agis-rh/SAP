                   
            <div class="span12">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <legend><h3 style="font-family: Footlight MT Light;">Edit Nilai</h3></legend><br> 
<?php                      
    if($_POST['delete_cek']) {
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
        
        // Apabila tidak ada data yang ditandai
        echo "<br><div class='alert alert-block alert-danger well well-small well-shadow'><p>
        <i class='icon-info-sign'></i> Tidak ada data nilai yang dipilih untuk di hapus.</p>
        </div>
<a href='javascript:;' onclick='self.history.back()' class='btn btn-primary' /> Kembali</a>";
        
}
  
else {
    // Proses Multi Hapus
$cekid = $_POST['cek'];
for($i=0;$i<count($cekid);$i++) {
$syntax->hapus_nilai($cekid[$i]);
echo "<script>window.location='?module=nilai';</script>";
                                        }
        }
}else if($_POST['edit_cek']) {
    // Proses Multi Edit
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
     // Apabila tidak ada data yang ditandai
        echo "<br><div class='alert alert-block alert-danger well well-small well-shadow'><p>
        <i class='icon-info-sign'></i> Tidak ada data nilai yang dipilih untuk di edit.</p>
        </div>
<a href='javascript:;' onclick='self.history.back()' class='btn btn-primary' /> Kembali</a>";
    }
    else {
         // Menghitung jumlah data yg akan di edit
        $cekid  =   $_POST['cek'];
        for($i=0;$i<count($cekid);$i++) {
         ?>
             
                
                   <?php
                   $data   = $syntax->get_one_nilai($cekid[$i]);
                   ?>
                                     <input type="hidden" name="edit[]">
                                     <input type="hidden" name="id_nilai[]" value="<?php echo $data['id_nilai']; ?>">
                                     
                                     
                                 <div class="control-group">
                                    <label class="control-label">Nama Siswa</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="siswa[]" data-placeholder="Pilih Nama Siswa">
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
                                        <input name="guru[]" disabled value="<?php echo"$data[guru_kode]"; ?>" class="span7" type="text">
                                    </div>
                                </div>
                                     
                               <div class="control-group">
                                    <label class="control-label">Nama Ujian</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="ujian[]" data-placeholder="Pilih Ujian">
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
                                        <select class="chosen span7" name="pelajaran[]" data-placeholder="Pilih Mata Pelajaran">
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
                                        <input name="nilai[]" value="<?php echo $data['nilai']; ?>" class="span1" type="number">
                                    </div>
                                </div>
                    
 
                                     
                   </fieldset><br/><br/><br/> 
                   
 
                            
                    
                    
                    
                    
                    
                    
                    
                    
<?php
 }
?>
 
 <footer class="form-actions">
      <button id="submit-button"  type="submit" class="btn btn-primary" name="save"><i class="icon-ok"></i> Simpan Perubahan</button>
      <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Cancel</a>
 </footer> </form>                   
                   
<?php
 }
}
?>
                   
                        </form> 
                        </div>
                       
                        


<?php
if(isset($_POST['save'])) {
    // Proses edit data
    $id_nilai= $_POST['id_nilai'];
    $nis     = $_POST['siswa'];
    $guru    = $_SESSION['id_user'];
    $ujian   = $_POST['ujian'];
    $pel     = $_POST['pelajaran'];
    $nilai   = $_POST['nilai'];
    $jumlah  = count($edit);
    if($jumlah < 1) {
        echo "<div class=''></div>";
    }
    else {
        for($ai=1;$ai<=$jumlah;$ai++) {
            $a = $ai-1;
            $huruf=  Terbilang($_POST['nilai'][$a]);
            $syntax->edit_nilai($id_nilai[$a],$nis[$a],$guru[$a],$ujian[$a],$pel[$a],$nilai[$a],$huruf);
            echo "<script>window.location='?module=nilai';</script>";
        }
    }
}

