
<section class="page container">
 <div class="span12 pull-left">
  <div class="row">
       
 <form class="form-horizontal" action="" method="post">
    <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Tambah Kompetensi Keahlian</h3></legend><br>
        
                                 <div class="control-group">
                                    <label class="control-label">Kode Kompetensi</label>
                                    <div class="controls">
                                        <input name="kode" value="<?php
                                              $query=$syntax->jumlah_kompetensi_keahlian ();
                                              $ak=$query+1;
                                              if($ak < 10){
                                                  echo "KK-00$ak";
                                              }else{
                                                  echo "KK-0$ak";
                                              }
                                              
                                              ?>" class="span7" type="text" disabled>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Bidang Studi</label>
                                    <div class="controls">
                                        <select class="chosen span7" name="bidang" data-placeholder="Pilih Bidang Studi">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan bidang studi
                                         $data = $syntax->show_bidang_studi();
                                         foreach ($data as $row){
                                             echo" <option value='$row[bidang_kode]'>$row[bidang_nama]</option>";
                                         }
                                         ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama Kompetensi</label>
                                    <div class="controls">
                                        <input name="nama" placeholder="Masukan nama kompetensi . . . . ." class="span7" type="text">
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
    // Proses input data
    $nama   = $_POST['nama'];
    $bidang = $_POST['bidang'];
    
    if(isset($_POST['save'])){
        // Melakukan validasi
        if (empty($_POST["bidang"]) || empty($_POST["nama"])){
    echo "<script>alert ('Jangan ada yang kosong !');</script>";
}else{
    
    // membuat kode kompetensi keahlian
    $data=$syntax->jumlah_kompetensi_keahlian();
    $kode=$data+1;
    if($kode < 10){
    $a="KK-00".$kode;
        $syntax->tambah_kompetensi_keahlian($a,$bidang,$nama);
        echo "<script>window.location='media.php?module=kompetensi_keahlian';</script>";
        
   }else{
    $b="KK-0".$kode;
    $syntax->tambah_kompetensi_keahlian($b,$bidang,$nama);
    echo "<script>window.location='media.php?module=kompetensi_keahlian';</script>";
                   }
        
}
    }

    ?>


