<?php
require_once("../../../system/functions.php"); // masukan file functions.php
require_once("../../../system/fungsi_indotgl.php"); 
$syntax  = new Functions();
$db = new koneksi();

$arh=$syntax->get_one_siswa($_POST['siswa']);
$ra=$syntax->get_one_kelas($arh['id_kelas']);

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$arh[siswa_nama] $ra[nama_kelas].xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<div align="center" style="font-family: Times New Roman; font-variant: normal;">
    <span style="font-size:20;">Rekap Nilai</span><br>
    <span style="font-size:19;"><?php echo $arh[siswa_nama]; ?><br>
    <span style="font-size:15;">NISN : <?php echo $arh[siswa_nisn]; ?><br>
        Kelas : <?php echo $ra[nama_kelas]; ?></span>
</div><br><br>
<table width="100%" border="1" align='center' cellpadding="5" cellspacing="1">
  <tbody>
      
    <tr>
      <th width="40">No. </th>
      <th width="450">Standar Kompetensi</th>
      <th width="200">Nama Ujian</th>
      <th width="50">Nilai</th>
      <th width="130">Keterangan</th>
    </tr>
                                        <?php
                                        $siswa  =$_POST['siswa'];
                                        $data   = $syntax->rekap($siswa);
                                        $nomor  = 1;
                                        foreach ($data as $row) {
                                        echo"<tr>
                                            <td>$nomor</td>
                                            <td>$row[sk_nama]</td>";
                                             $nilai = $syntax->nilai_rekap($siswa,$row['sk_kode']);
                                             $ujian = $syntax->get_one_ujian($nilai['id_ujian']);
                                            echo"<td>$ujian[nama_ujian]</td>";
                                            echo"<td align='center'>$nilai[nilai]</td>";                                      
                                            echo"<td align='center'>";
                                            
                                            // Melakukan perhitungan kelulusan
                                            $ket=$syntax->get_one_standar_kompetensi($row['sk_kode']);
                                            if($nilai['nilai']==''){
                                                echo "<i style='color: #0000'>Belum ada nilai</i>";
                                            }
                                                elseif($nilai['nilai']< $ket['sk_kkm']){
                                                echo "<i style='color: #fd1515'>Tidak Kompeten</i>";
                                            }else{
                                                echo "<i style='color: #0080FF'>Kompeten</i>";
                                            }
                                            
                                            
                                            echo"</td>";
                                        
                                     $nomor++;
                                            }
                                        
                                        
                                                ?>
                                       
                                        
 
    
</tbody>
</table><br><br><br><br><br><br><br><br>


<?php 
$tgl=  tgl_lahir(date('Y-m-d'));
 echo"<div align='right'>
   <span style='font-size:15;'>Lemahsugih, $tgl</span><br>
   <span style='font-size:15;'>Nama Siswa</span><br><br><br><br>
   <span style='font-size:15;'>$arh[siswa_nama]</span>
    </div>";
