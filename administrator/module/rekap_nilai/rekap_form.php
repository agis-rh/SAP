<section class="page container">
 <div class="span20 pull-left">
  <div class="row">
 
  <form class="form-horizontal" action="?module=rekap_guru" method="POST">  
      
 <div id="acct-password-row" class="span7">
  <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Pilih Siswa</h3></legend><br>
         <div class="control-group ">
                <select class="chosen span6" name="siswa" data-placeholder="Pilih Siswa">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan siswa
                                         $data = $syntax->show_siswa();
                                         foreach ($data as $row){
                                             echo" <option value='$row[siswa_nisn]'>$row[siswa_nama]</option>";
                                         }
                                         ?>
                      </select>
                      </div>
                      
                                </fieldset><br/><br/><br/>
                                     
      <footer id="submit-actions" class="form-actions">
           <button type="submit" class="btn btn-primary"><i class="icon-zoom-in"></i> Lihat</button>
           <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Kembali</a>
     </footer>   
                                                
                                     

</div>
</form>
</div>
</div>
</section>
    
