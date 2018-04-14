<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content</title>
</head>

<body>
<?php
if ($_GET['module']=='dashboard')
{ 
include "dashboard.php";
}
else
if ($_GET['module']=='tambah_kelas')
{ 
include "module/kelas/tambah_kelas.php";
}
else
if ($_GET['module']=='multi_aksi')
{ 
include "module/kelas/multi_aksi.php";
}
else
if ($_GET['module']=='kelas')
{ 
include "module/kelas/show_kelas.php";
}
else
if ($_GET['module']=='edit_kelas')
{ 
include "module/kelas/edit_kelas.php";
}
else
if ($_GET['module']=='bidang_studi')
{ 
include "module/bidang_studi/show_bidang_studi.php";
}
else
if ($_GET['module']=='tambah_bidang_studi')
{ 
include "module/bidang_studi/tambah_bidang_studi.php";
}
else
if ($_GET['module']=='edit_bidang_studi')
{ 
include "module/bidang_studi/edit_bidang_studi.php";
}
else
if ($_GET['module']=='ujian')
{ 
include "module/ujian/show_ujian.php";
}
else
if ($_GET['module']=='tambah_ujian')
{ 
include "module/ujian/tambah_ujian.php";
}
else
if ($_GET['module']=='edit_ujian')
{ 
include "module/ujian/edit_ujian.php";
}
else
if ($_GET['module']=='pengaturan')
{ 
include "module/pengaturan/show_pengaturan.php";
}
else
if ($_GET['module']=='tambah_pengaturan')
{ 
include "module/pengaturan/tambah_pengaturan.php";
}
else
if ($_GET['module']=='edit_pengaturan')
{ 
include "module/pengaturan/edit_pengaturan.php";
}
else
if ($_GET['module']=='kompetensi_keahlian')
{ 
include "module/kompetensi_keahlian/show_kompetensi_keahlian.php";
}
else
if ($_GET['module']=='tambah_kompetensi_keahlian')
{ 
include "module/kompetensi_keahlian/tambah_kompetensi_keahlian.php";
}
else
if ($_GET['module']=='edit_kompetensi_keahlian')
{ 
include "module/kompetensi_keahlian/edit_kompetensi_keahlian.php";
}
else
if ($_GET['module']=='sk')
{ 
include "module/standar_kompetensi/show_sk.php";
}
else
if ($_GET['module']=='tambah_sk')
{ 
include "module/standar_kompetensi/tambah_sk.php";
}
else
if ($_GET['module']=='edit_sk')
{ 
include "module/standar_kompetensi/edit_sk.php";
}
else
if ($_GET['module']=='siswa')
{ 
include "module/siswa/show_siswa.php";
}
else
if ($_GET['module']=='tambah_siswa')
{ 
include "module/siswa/tambah_siswa.php";
}
else
if ($_GET['module']=='edit_siswa')
{ 
include "module/siswa/edit_siswa.php";
}
else
if ($_GET['module']=='detail_siswa')
{ 
include "module/siswa/detail_siswa.php";
}
else
if ($_GET['module']=='wali')
{ 
include "module/wali_murid/show_wali.php";
}
else
if ($_GET['module']=='tambah_wali')
{ 
include "module/wali_murid/tambah_wali.php";
}
else
if ($_GET['module']=='edit_wali')
{ 
include "module/wali_murid/edit_wali.php";
}
else
if ($_GET['module']=='wali_info')
{ 
include "module/siswa/edit_wali.php";
}
else
if ($_GET['module']=='guru')
{ 
include "module/guru/show_guru.php";
}
else
if ($_GET['module']=='tambah_guru')
{ 
include "module/guru/tambah_guru.php";
}
else
if ($_GET['module']=='edit_guru')
{ 
include "module/guru/edit_guru.php";
}
else
if ($_GET['module']=='detail_guru')
{ 
include "module/guru/detail_guru.php";
}
else
if ($_GET['module']=='user')
{ 
include "module/user/show_user.php";
}
else
if ($_GET['module']=='tambah_user')
{ 
include "module/user/tambah_user.php";
}
else
if ($_GET['module']=='edit_user')
{ 
include "module/user/edit_user.php";
}
else
if ($_GET['module']=='detail_user')
{ 
include "module/user/detail_user.php";
}
else
if ($_GET['module']=='ganti_password')
{ 
include "module/user/ganti_password.php";
}
else
if ($_GET['module']=='profesi')
{ 
include "module/profesi/show_profesi.php";
}
else
if ($_GET['module']=='tambah_profesi')
{ 
include "module/profesi/tambah_profesi.php";
}
else
if ($_GET['module']=='edit_profesi')
{ 
include "module/profesi/edit_profesi.php";
}
else
if ($_GET['module']=='nilai')
{ 
include "module/nilai/show_nilai.php";
}
else
if ($_GET['module']=='tambah_nilai')
{ 
include "module/nilai/tambah_nilai.php";
}
else
if ($_GET['module']=='edit_nilai')
{ 
include "module/nilai/edit_nilai.php";
}
else
if ($_GET['module']=='multi_nilai')
{ 
include "module/nilai/multi_aksi.php";
}
else
if ($_GET['module']=='transaksi')
{ 
include "module/nilai/transaksi.php";
}
else
if ($_GET['module']=='siswa_nilai')
{ 
include "module/nilai/user_nilai/siswa_nilai.php";
}
else
if ($_GET['module']=='guru_nilai')
{ 
include "module/nilai/user_nilai/guru_nilai.php";
}
else
if ($_GET['module']=='pilih_laporan')
{ 
include "module/laporan/pilih_laporan.php";
}
else
if ($_GET['module']=='laporan')
{ 
include "module/laporan/laporan.php";
}
else
if ($_GET['module']=='rekap_nilai')
{ 
include "module/rekap_nilai/rekap_nilai.php";
}
else
if ($_GET['module']=='rekap_form')
{ 
include "module/rekap_nilai/rekap_form.php";
}
else
if ($_GET['module']=='rekap_guru')
{ 
include "module/rekap_nilai/rekap_guru.php";
}
else
if ($_GET['module']=='cari_nilai')
{ 
include "module/cari_nilai/pilih_pencarian.php";
}
else
if ($_GET['module']=='hasil_pencarian')
{ 
include "module/cari_nilai/hasil_pencarian.php";
}
else
if ($_GET['module']=='cari_nilai_siswa')
{ 
include "module/cari_nilai/cari_nilai_siswa.php";
}
else
if ($_GET['module']=='hasil_nilai_siswa')
{ 
include "module/cari_nilai/hasil_nilai_siswa.php";
}
else
if ($_GET['module']=='not_found')
{ 
include "not_found.php";
}
else
if ($_GET['module']=='duplikat')
{ 
include "not_found.php";
}
else
{
include "not_found.php";	
}
?>
</body>
</html>