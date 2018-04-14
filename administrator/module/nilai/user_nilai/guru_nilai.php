<?php
$data=$syntax->get_one_guru($_SESSION['id_user']);
?>
<div class="span16">
 <div class="alert alert-block alert-info well well-small well-shadow">
     
<div class="pull-right" >
<a href="?module=transaksi">
<button class="btn btn-primary btn-small"><i class="icon-plus"></i> Tambah Nilai</button>
</a>
</div>
     
    <p>
        <i class="icon-info-sign"></i> Data nilai yang di masukan oleh <?php echo $data['guru_nama']; ?>
    </p>
    
</div>
</div>


                    <!----Data table----->
                    
            <div class="span16">
                <div class="box">
                    <div class="box-header">
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-hide-me">
                             <i class="icon-tasks"></i>  <small>Nilai</small>
                        </button>
                    </div>
                    
                    <div class="box-hide-me box-content out">
                          <form action="?module=multi_nilai" method="POST">
                                <table id="sample-table" class="table table-hover table-bordered tablesorter well well-small well-shadow">
                                    <thead>
                                        <tr>
                                            <th width="2"><input type="checkbox" id="table-select-all"></th>
                                            <th width="5%">No.</th>
                                            <th width="30%">Nama Siswa</th>
                                            <th width="30%">Standar Kompetensi Nama</th>
                                            <th width="8%">Nilai</th>
                                            <th width="15%">Keterangan</th>
                                            <th width="10%">Aksi</th>
                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        // Menetukan paging
                                        $batas  = $setting['paging'];
                                        $posisi = $paging->cariPosisi($batas);
                                        $no     = $paging->cariPosisi($batas)+1;
                                        $data   = $syntax->guru_nilai($_SESSION['id_user'],$posisi,$batas);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td><input type='checkbox' name='cek[]' id='id-$nomor' value='$row[id_nilai]'></td>
                                            <td>$nomor</td>
                                            <td>$row[siswa_nama]</td>
                                            <td>$row[sk_nama]</td>
                                            <td>$row[nilai]</td>
                                            <td>";
                                        
                                            // Melakukan perhitungan kelulusan
                                            $ket=$syntax->get_one_standar_kompetensi($row['sk_kode']);
                                            if($row['nilai']< $ket['sk_kkm']){
                                                echo "<i style='color: #fd1515'>Tidak Kompeten</i>";
                                            }else{
                                                echo "<i style='color: #0080FF'>Kompeten</i>";
                                            }
                                            
                                            
                                            echo"</td>
                                            <td class='td-actions'>
                                                <a href='?module=edit_nilai&&id_nilai=$row[id_nilai]' class='btn btn-small btn-info'>
                                                <i class='btn-icon-only icon-pencil'></i> 
                                                </a>
                                                 <a href='?module=nilai&aksi=hapus&id_nilai=$row[id_nilai]' class='btn btn-small btn-danger'
                                                      onClick=\"return confirm('Apakah Anda benar-benar yakin akan menghapus nilai $row[siswa_nama] ?')\">
                                                <i class='btn-icon-only icon-trash'></i>
                                                 </a>
                                            </td>
                                        </tr>";
                                        
                                        $nomor++;
                                        }
                                        
                                                ?>
                                        
                                        
                                    </tbody>
                                </table>
                        
                             <!---paging---->
    <div class="box-footer well well-small well-shadow">
     <div class="pagination">
 <?php
 // Menampilkan paging
 $active     = "guru_nilai";
 $page       = $_GET['module'];
 $jml_data   = $syntax->jumlah_nilai();
 $jml_page   = $paging->jumlahPage($jml_data,$batas);
 $link       = $paging->linkHalaman($page,$jml_page,$active);
 echo $link;
 ?>
     </div><br>
    
    <div class="pull-left">
    <label class="alt-label">
    <input name="pilih" type="radio"
    onclick="for(i=1;i<=<?php echo $nomor;?>;i++){document.getElementById('id-'+i).checked=true;}"/>
    Tandai semua
    </label>
    <label class="alt-label">
    <input name="pilih" type="radio"
    onclick="for(i=1;i<=<?php echo $nomor;?>;i++){document.getElementById('id-'+i).checked=false;}"/>
    Hapus semua tanda
    </label>
    </div><br><br>
    
     <!--- button --->
    
								
<td colspan="4" class="table-footer">
<input type="submit" name="delete_cek" class="btn btn-danger btn-small" onclick="window.confirm('Hapus data kelas yang ditandai ?')" value="Hapus data yang ditandai">	
<input type="submit" name="edit_cek" class="btn btn-success btn-small" value="Edit data yang ditandai">	
</td><br>
                        
                             
                            </div>
                          </form>
                        

                        </div>
                    </div>
                   
                    
    
         
         
         <?php
          // Hapus nilai                      
          if($_GET['aksi']=='hapus') {
          $id_nilai  = $_GET['id_nilai'];
          $syntax->hapus_nilai($id_nilai);
          echo "<script>window.location='?module=nilai';</script>";
                                }
             ?>

