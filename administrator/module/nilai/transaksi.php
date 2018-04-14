 <script>
       function pilih_kelas(kelas)
       {
            $.ajax({
                url:'module/nilai/siswa.php',
        data:'kelas='+kelas,
        type:"post",
        dataType:"html",
        timeout:10000,
        success:function(response){
            $('#hasil').html(response);
        }
            });   
        }
        
        function sk(guru)
       {
            $.ajax({
                url:'module/nilai/sk.php',
        data:'guru='+guru,
        type:"post",
        dataType:"html",
        timeout:10000,
        success:function(response){
            $('#data').html(response);
        }
            });   
        }
</script>
<section class="page container">
 <form class="form-horizontal" action="" method="POST">
 <div class="row">
 <div class="span8" id="acct-password-row">                      
  <fieldset>
      <div class="blockoff-left">
      <legend><h3 style="font-family: Footlight MT Light; padding-left: 40px;">Pilih Kategori Nilai</h3></legend> 
                                     <div class="control-group "  style=' padding-left: 40px;'>
                                        <select class='chosen span5' name='guru' onchange="sk(this.value);" data-placeholder='Pilih Nama Guru'>
                                          <?php  
                                         echo"<option value='0'></option>";
                                         
                                         // Apabila sesi adalah guru maka tampilkan namanya sendiri
                                         if($_SESSION['id_profesi']==4){
                                         $guru=$syntax->get_one_guru($_SESSION['id_user']);
                                         echo" <option value='$guru[guru_kode]'>$guru[guru_nama]</option>";
                                          
                                         }else{
                                             
                                          // Apabila Admin maka
                                         // Menampilkan pilihan guru
                                         $data = $syntax->show_guru();
                                         foreach ($data as $row){
                                             echo" <option value='$row[guru_kode]'>$row[guru_nama]</option>";
                                         }
                                         }
                                         ?>
                                        
                                    </select>
                                    </div>
                                       
                                <div class="control-group "  style=' padding-left: 40px;'>
                                <select class="chosen span5" name="ujian" data-placeholder="Pilih Ujian">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan ujian
                                         $data = $syntax->show_ujian();
                                         foreach ($data as $row){
                                             echo" <option value='$row[id_ujian]'>$row[nama_ujian]</option>";
                                         }
                                         ?>
                                    </select>
                                </div>
                               
                                
                                    
                                     <div class="control-group "  style=' padding-left: 40px;'>
                                        <select class="chosen span5" name="kelas" onchange="pilih_kelas(this.value);" data-placeholder="Pilih Kelas">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kelas
                                         $data = $syntax->show_kelas();
                                         foreach ($data as $row){
                                             echo" <option value='$row[id_kelas]'>$row[nama_kelas]</option>";
                                         }
                                         ?>
                                    </select>
                                     </div>
 </div>
 </div>
     
     
<div class="span8  pull-right" id="acct-verify-row">
<div class="blockoff-right">
<legend>
<h3 style="font-family: Footlight MT Light; padding-left: 40px;">Pilih Standar Kompetensi</h3>
</legend>
<div id="data">
                                    
</div>
</div>
</div>
                             
     
     
     <!--- form load siswa ajax--->
 
             <br/><br/><br/>
             <div id="hasil">    
             </div>
                               
                               
                                
                                     
                                     
                                    
</div> 
</fieldset>
</form> 
</section>

    
    
  <?php 
  /* Multi input nilai */
  
  $guru         =$_POST['guru'];
  $kompetensi   =$_POST['kompetensi'];
  $ujian        =$_POST['ujian'];
  $jumlah       =$_POST['jumlah'];

  if(isset($_POST['kirim'])){
  for($i=0;$i<$jumlah;$i++){
  $nis      =$_POST['nisn'][$i];
  $nilai    =$_POST['nilai'][$i];
  $huruf    =  Terbilang($_POST['nilai'][$i]);
  
  $a=$syntax->verifikasi_nilai($nis,$guru,$ujian,$kompetensi);
  if(!empty($a)){
      echo "<script>alert('Duplikat data !');</script>";
        header('location:media.php?module=transaksi');
  }else{
  
       $syntax->tambah_nilai($nis,$guru,$ujian,$kompetensi,$nilai,$huruf);
       if($_SESSION[id_profesi]==4){
        echo "<script>window.location='media.php?module=guru_nilai';</script>";
       }else{
          echo "<script>window.location='media.php?module=nilai';</script>";  
       }
  }
  }
  }
  