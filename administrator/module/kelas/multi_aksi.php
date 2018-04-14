
                    
            <div class="span12">
             
  
<?php                      
    if($_POST['delete_cek']) {
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
        
        // Apabila tidak ada data yang ditandai
        echo "<br><div class='alert alert-block alert-danger well well-small well-shadow'><p>
        <i class='icon-info-sign'></i> Tidak ada data kelas yang dipilih untuk di hapus.</p>
        </div>
<a href='javascript:;' onclick='self.history.back()' class='btn btn-primary' /> Kembali</a>";
        
}
  
else {
    // Proses Multi Hapus
$cekid = $_POST['cek'];
for($i=0;$i<count($cekid);$i++) {
$syntax->hapus_kelas($cekid[$i]);
echo "<script>window.location='?module=kelas';</script>";
                                        }
        }
}else if($_POST['edit_cek']) {
    // Proses Multi Edit
    $cekid  =   $_POST['cek'];
    if(count($cekid) < 1) {
     // Apabila tidak ada data yang ditandai
        echo "<br><div class='alert alert-block alert-danger well well-small well-shadow'><p>
        <i class='icon-info-sign'></i> Tidak ada data kelas yang dipilih untuk di edit.</p>
        </div>
<a href='javascript:;' onclick='self.history.back()' class='btn btn-primary' /> Kembali</a>";
    }
    else {
        echo"<form class='form-horizontal' action='' method='POST' enctype='multipart/form-data'>
       <fieldset>
        <legend><h3 style='font-family: Footlight MT Light;'>Edit Kelas</h3></legend><br> ";
         // Menghitung jumlah data yg akan di edit
        $cekid  =   $_POST['cek'];
        for($i=0;$i<count($cekid);$i++) {
         ?>
             
                 
                   <?php
                   $data   = $syntax->get_one_kelas($cekid[$i]);
                   ?>
                                <div class="control-group">
                                     <input type="hidden" name="edit[]">
                                     <input type="hidden" name="id_kelas[]" value="<?php echo $data['id_kelas']; ?>">
                                    <label class="control-label">Nama Kelas</label>
                                    <div class="controls">
                                        <input value="<?php echo $data['nama_kelas']; ?>" name="kelas[]" class="span7" type="text">
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
?>                        
                        
                      
                    
                
             
                    
<?php
}
else if($_POST['add_rows']) {
    $jumlah_add     = $_POST['add'];
    echo "<form action='' method='POST' enctype='multipart/form-data'>"
    . "<fieldset>
        <legend><h3 style='font-family: Footlight MT Light;'>Tambah Kelas</h3></legend><br> ";
    for($k=1;$k<=$jumlah_add;$k++) {
        ?>
         
     
            <div class="control-group">
                                     <input type="hidden" name="add[]">
                                    <label class="control-label">Nama Kelas</label>
                                    <div class="controls">
                                        <input  name="kelas[]" class="span7" type="text">
                                    </div>
                                </div>
                   </fieldset><br/><br/><br/>          
                    
                    
<?php
}
?>
                   
   <footer class="form-actions">
      <button id="submit-button"  type="submit" class="btn btn-primary" name="add_row"><i class="icon-ok"></i> Simpan</button>
      <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Cancel</a>
   </footer> 

<?php
}
?>
                    
                   
                        </form> 
</div>


<?php
if(isset($_POST['save'])) {
    $edit      = $_POST['edit'];
    $kelas     = $_POST['kelas'];
    $id_kelas  = $_POST['id_kelas'];
    $jumlah     = count($edit);
    if($jumlah < 1) {
        echo "<div class=''></div>";
    }
    else {
        for($ai=1;$ai<=$jumlah;$ai++) {
            $a = $ai-1;
            $syntax->edit_kelas($id_kelas[$a],$kelas[$a]);
            echo "<script>window.location='?module=kelas';</script>";
        }
    }
}

else if(isset($_POST['add_row'])) {
    $add        = $_POST['add'];
    $kelas      = $_POST['kelas'];
    $jumlah_add = count($add);

    for($b=1;$b<=$jumlah_add;$b++) {
        $c = $b-1;
            $syntax->tambah_kelas($kelas[$c]);
            echo "<script>window.location='?module=kelas';</script>";
    }
}