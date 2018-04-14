<?php
require_once("../../../system/functions.php"); // masukan file functions.php
require_once("../../../system/fungsi_indotgl.php"); 
$syntax  = new Functions();
$db = new koneksi();

$sk     = $syntax->get_one_standar_kompetensi($_POST['sk']);
$ujian  = $syntax->get_one_ujian($_POST['ujian']);
$kelas  = $syntax->get_one_kelas($_POST['kelas']);

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$sk[sk_nama] ($kelas[nama_kelas]).xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<div align="center" style="font-family: Times New Roman; font-variant: normal;">
    <span style="font-size:18;"> <?php echo $sk[sk_nama]; ?></span><br>
    <span style="font-size:15;"><?php echo $ujian[nama_ujian]; ?><br>
        Kelas : <?php echo $kelas[nama_kelas]; ?></span>
</div><br><br>
<table width="100%" border="1" align='center' cellpadding="5" cellspacing="1">
  <tbody>
      
    <tr>
      <th width="40">No. </th>
      <th width="80">NISN</th>
      <th width="250">Nama Siswa</th>
      <th width="50">Nilai</th>
      <th width="165">Nilai Huruf</th>
      <th width="130">Keterangan</th>
    </tr>
    <?php
                                        $kelas  =$_POST['kelas'];
                                        $ujian  =$_POST['ujian'];
                                        $sk     =$_POST['sk'];
                                        $data   = $syntax->laporan($kelas,$ujian,$sk);
                                        $nomor  = 1;
                                        
                                        foreach ($data as $row) {
                                        echo"<tr valign='top'>
                                            <td align='center'>$nomor</td>
                                            <td align='center'>$row[siswa_nisn]</td>
                                            <td>$row[siswa_nama]</td>
                                            <td align='center'>$row[nilai]</td>
                                            <td><i>$row[nilai_huruf]</i></td>
                                            <td align='center'>";
                                        
                                            // Melakukan perhitungan kelulusan
                                            $ket=$syntax->get_one_standar_kompetensi($row['sk_kode']);
                                            if($row['nilai']< $ket['sk_kkm']){
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
 $guru=$syntax->get_one_guru($row['guru_kode']);
 echo"<div align='right'>
   <span>Lemahsugih, $tgl</span><br>
   <span>Guru Pengajar</span><br><br><br><br>
   <span>$guru[guru_nama]</span>
    </div>";
?>