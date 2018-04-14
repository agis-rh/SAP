<?php
/*
 *****************************************
 * functions
 *****************************************
 */

date_default_timezone_set('Asia/jakarta');
error_reporting(0); //Menghilangkan laporan error
require_once ("connection.php");  // koneksi ke database
require_once ("paging.php");     // fungsi paging halaman
require_once ("paging.id.php"); // fungsi paging id
require_once ("fungsi_terbilang.php"); // fungsi paging id
require_once ("fungsi_indotgl.php"); // fungsi paging id

class Functions {









    /*
     * ************************************
     * Manajemen tabel bidang studi
     * ************************************
     */

    public function show_bidang_studi(){
        $query   = "SELECT * FROM bidang_studi ORDER BY bidang_kode ASC";
        $data    = mysql_query($query);
        while ($row = mysql_fetch_array($data)) {
            $hasil [] = $row;
        }

        return $hasil;
    }


    public function paging_bidang_studi($posisi,$batas){
        $query   = "SELECT * FROM bidang_studi ORDER BY bidang_kode ASC LIMIT $posisi,$batas";
        $data    = mysql_query($query);
        while ($row = mysql_fetch_array($data)) {
            $hasil [] = $row;
        }

        return $hasil;
    }


    public function jumlah_bidang_studi (){
        $query   = "SELECT * FROM bidang_studi";
        $data    = mysql_query($query);
        $hasil   = mysql_num_rows($data);

        return $hasil;
    }


    public function tambah_bidang_studi ($bidang_kode,$bidang_nama){
        $query  = "INSERT INTO bidang_studi VALUES ('$bidang_kode','$bidang_nama')";
        mysql_query ($query);
    }

    public function edit_bidang_studi ($bidang_kode,$bidang_nama){
        $query  = "UPDATE bidang_studi SET bidang_nama='$bidang_nama'
        WHERE " ."bidang_kode='$bidang_kode'";
        mysql_query ($query);
    }


    public function hapus_bidang_studi ($bidang_kode){
        $query  = "DELETE FROM bidang_studi WHERE bidang_kode='$bidang_kode'";
        mysql_query ($query);
    }


    public function get_one_bidang_studi ($bidang_kode){
        $query  = "SELECT * FROM bidang_studi WHERE bidang_kode='$bidang_kode'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);

        return $hasil;
    }



    /*
     * ***********************************
     * Manajemen tabel kompetensi keahlian
     * ***********************************
     */

    public function show_kompetensi_keahlian (){
        $query  = "SELECT k.*, b.*
                    FROM kompetensi_keahlian AS k, bidang_studi AS b
                    WHERE k.bidang_kode = b.bidang_kode ORDER BY k.kompetensi_kode";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
           $hasil[] = $row;
        }
    }

     public function paging_kompetensi_keahlian($posisi,$batas){
        $query  = "SELECT k.*, b.*
                    FROM kompetensi_keahlian AS k, bidang_studi AS b
                    WHERE k.bidang_kode = b.bidang_kode ORDER BY k.kompetensi_kode ASC LIMIT $posisi, $batas";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
           $hasil[] = $row;
        }
        return $hasil;
    }

    
     public function kompetensi_keahlian (){
        $query   = "SELECT * FROM kompetensi_keahlian ORDER BY kompetensi_nama ASC";
        $data    = mysql_query($query);
        while ($row = mysql_fetch_array($data)) {
            $hasil [] = $row;
        }

        return $hasil;
    }
    
     public function jumlah_kompetensi_keahlian (){
        $query   = "SELECT * FROM kompetensi_keahlian";
        $data    = mysql_query($query);
        $hasil   = mysql_num_rows($data);

        return $hasil;
    }


    public function tambah_kompetensi_keahlian ($kompetensi_kode,$bidang_kode,$kompetensi_nama){
        $query  = "INSERT INTO kompetensi_keahlian VALUES ('$kompetensi_kode','$bidang_kode','$kompetensi_nama')";
        mysql_query ($query);
    }

    public function edit_kompetensi_keahlian ($kompetensi_kode,$bidang_kode,$kompetensi_nama){
        $query  = "UPDATE kompetensi_keahlian SET kompetensi_kode='$kompetensi_kode', bidang_kode='$bidang_kode',
        kompetensi_nama='$kompetensi_nama'  WHERE "."kompetensi_kode='$kompetensi_kode'";
        mysql_query ($query);
    }

   public function hapus_kompetensi_keahlian($kompetensi_kode){
         $query = "DELETE FROM kompetensi_keahlian WHERE kompetensi_kode='$kompetensi_kode'";
         mysql_query($query);
     }

    public function get_one_kompetensi_keahlian ($kompetensi_kode){
        $query = "SELECT * FROM kompetensi_keahlian WHERE kompetensi_kode='$kompetensi_kode'";
        $data  = mysql_query ($query);
        $hasil = mysql_fetch_array ($data);

        return $hasil;
    }
    
    
    /*
     * ***********************************
     * Manajemen tabel kelas
     * ***********************************
     */
    
    public function show_kelas(){
        $query  = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    public function paging_kelas ($posisi,$batas){
        $query  = "SELECT * FROM kelas ORDER BY nama_kelas ASC LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }
        return $hasil;
    }
    
    public function jumlah_kelas (){
        $query  = "SELECT * FROM kelas";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function tambah_kelas ($nama_kelas){
        $query  = "INSERT INTO kelas VALUES ('','$nama_kelas')";
        mysql_query($query);
    }
    
    public function edit_kelas ($id_kelas,$nama_kelas){
        $query  = "UPDATE kelas SET nama_kelas='$nama_kelas' WHERE id_kelas='$id_kelas'";
        mysql_query($query);
    }
    
    public function hapus_kelas ($id_kelas) {
        $query  = "DELETE FROM kelas WHERE id_kelas='$id_kelas'";
        mysql_query($query);
    }
    
    public function get_one_kelas ($id_kelas) {
        $query  =  "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }



    
     /*
     * ***********************************
     * Manajemen tabel standar kompetensi
     * ***********************************
     */
    
     public function show_standar_kompetensi(){
         $query = "SELECT s.*, k.*
             FROM standar_kompetensi AS s, kompetensi_keahlian AS k
             WHERE s.kompetensi_kode = k.kompetensi_kode ORDER BY s.sk_nama";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function paging_standar_kompetensi($posisi,$batas){
         $query = "SELECT s.*, k.*
             FROM standar_kompetensi AS s, kompetensi_keahlian AS k
             WHERE s.kompetensi_kode = k.kompetensi_kode ORDER BY s.sk_kode ASC LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function jumlah_standar_kompetensi(){
         $query = "SELECT * FROM standar_kompetensi";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
     
     public function tambah_standar_kompetensi($sk_kode,$kompetensi_kode,$sk_nama,$sk_kelas,$sk_semester,$sk_kkm,$guru){
         $query = "INSERT INTO standar_kompetensi VALUES ('$sk_kode','$kompetensi_kode','$sk_nama','$sk_kelas','$sk_semester','$sk_kkm','$guru')";
         mysql_query($query);
     }
     
     public function edit_standar_kompetensi($sk_kode,$kompetensi_kode,$sk_nama,$sk_kelas,$sk_semester,$sk_kkm,$guru){
         $query = "UPDATE standar_kompetensi SET kompetensi_kode='$kompetensi_kode', sk_nama='$sk_nama', sk_kelas='$sk_kelas', sk_semester='$sk_semester', sk_kkm='$sk_kkm', guru_kode='$guru' "
                 . "WHERE sk_kode='$sk_kode'";
         mysql_query($query);
     }
     
     public function hapus_standar_kompetensi($sk_kode){
         $query = "DELETE FROM standar_kompetensi WHERE sk_kode='$sk_kode'";
         mysql_query($query);
     }
     
     public function get_one_standar_kompetensi($sk_kode){
         $query  =  "SELECT * FROM standar_kompetensi WHERE sk_kode='$sk_kode'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
    public function show_sk(){
        $query  = "SELECT * FROM standar_kompetensi ORDER BY sk_nama ASC";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    public function sk($guru_kode){
        $query  = "SELECT * FROM standar_kompetensi WHERE guru_kode='$guru_kode' ORDER BY sk_nama ASC";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
     
     
     
     
    /*
     * ***********************************
     * Manajemen tabel ujian sekolah
     * ***********************************
     */
     
      public function show_ujian(){
        $query  = "SELECT * FROM ujian ORDER BY nama_ujian ASC";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    public function paging_ujian ($posisi,$batas){
        $query  = "SELECT * FROM ujian ORDER BY nama_ujian ASC LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }
        return $hasil;
    }
    
    public function jumlah_ujian (){
        $query  = "SELECT * FROM ujian";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function tambah_ujian ($nama_ujian,$keterangan){
        $query  = "INSERT INTO ujian VALUES ('','$nama_ujian','$keterangan')";
        mysql_query($query);
    }
    
    public function edit_ujian ($id_ujian,$nama_ujian,$keterangan){
        $query  = "UPDATE ujian SET nama_ujian='$nama_ujian', keterangan='$keterangan' WHERE " ."id_ujian='$id_ujian'";
        mysql_query($query);
    }
    
    public function hapus_ujian ($id_ujian) {
        $query  = "DELETE FROM ujian WHERE id_ujian='$id_ujian'";
        mysql_query($query);
    }
    
    public function get_one_ujian ($id_ujian) {
        $query  =  "SELECT * FROM ujian WHERE id_ujian='$id_ujian'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }


    
    /*
     * ***********************************
     * Manajemen tabel pengaturan
     * ***********************************
     */
    
     public function show_pengaturan(){
        $query  = "SELECT * FROM pengaturan LIMIT 1";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
     public function tambah_pengaturan ($nama_sekolah,$alamat_sekolah,$keterangan_aplikasi,$paging){
        $query  = "INSERT INTO pengaturan VALUES ('','$nama_sekolah','$alamat_sekolah','$keterangan_aplikasi','$paging')";
        mysql_query($query);
    }
    
    public function edit_pengaturan ($id_pengaturan,$nama_sekolah,$alamat_sekolah,$title,$keterangan_aplikasi,$paging){
        $query  = "UPDATE pengaturan SET nama_sekolah='$nama_sekolah', alamat_sekolah='$alamat_sekolah', title='$title', keterangan_aplikasi='$keterangan_aplikasi', paging='$paging' WHERE " ."id_pengaturan='$id_pengaturan'";
        mysql_query($query);
    }
    
     public function get_one_pengaturan () {
        $query  =  "SELECT * FROM pengaturan WHERE id_pengaturan='1'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }
    
    
     /*
     * ***********************************
     * Manajemen tabel siswa
     * ***********************************
     */
    
    
    public function paging_siswa($posisi,$batas){
         $query = "SELECT s.*, ko.*, k.*
             FROM siswa AS s, kompetensi_keahlian AS ko, kelas AS k
             WHERE s.kompetensi_kode = ko.kompetensi_kode && s.id_kelas = k.id_kelas ORDER BY s.siswa_nama ASC LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function detail_siswa($nisn){
         $query = "SELECT s.*, ko.*, k.*
             FROM siswa AS s, kompetensi_keahlian AS ko, kelas AS k
             WHERE s.kompetensi_kode = ko.kompetensi_kode && s.id_kelas = k.id_kelas  && s.siswa_nisn='$nisn'";
         $data  = mysql_query($query);
         $hasil =  mysql_fetch_array($data);
         
         return $hasil;
     }
     
     public function jumlah_siswa(){
         $query = "SELECT * FROM siswa";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
     
     public function tambah_siswa($nisn,$id_kelas,$kompetensi_kode,$nama,$jk,$alamat,$tgl_lahir,$tempat_lahir,$email,$kontak,$image){
         $query = "INSERT INTO siswa VALUES ('$nisn','$id_kelas','$kompetensi_kode','$nama','$jk','$alamat','$tgl_lahir','$tempat_lahir','$email','$kontak','$image')";
         mysql_query($query);
     }
     
     public function edit_siswa($nisn,$id_kelas,$kompetensi_kode,$nama,$jk,$alamat,$tgl_lahir,$tempat_lahir,$email,$kontak,$image){
         $query = "UPDATE siswa SET id_kelas='$id_kelas', kompetensi_kode='$kompetensi_kode', siswa_nama='$nama', siswa_jk='$jk', siswa_alamat='$alamat', siswa_tgl_lahir='$tgl_lahir', siswa_tmpt_lahir='$tempat_lahir', email_siswa='$email', kontak_siswa='$kontak', image='$image' "
                 . "WHERE siswa_nisn='$nisn'";
         mysql_query($query);
     }
     
      public function edit_siswa1($nisn,$id_kelas,$kompetensi_kode,$nama,$jk,$alamat,$tgl_lahir,$tempat_lahir,$email,$kontak){
         $query = "UPDATE siswa SET id_kelas='$id_kelas', kompetensi_kode='$kompetensi_kode', siswa_nama='$nama', siswa_jk='$jk', siswa_alamat='$alamat', siswa_tgl_lahir='$tgl_lahir', siswa_tmpt_lahir='$tempat_lahir', email_siswa='$email', kontak_siswa='$kontak' "
                 . "WHERE siswa_nisn='$nisn'";
         mysql_query($query);
     }
     
     public function hapus_siswa($nisn){
         $query = "DELETE FROM siswa WHERE siswa_nisn='$nisn'";
         mysql_query($query);
     }
     
     public function get_one_siswa($nisn){
         $query  =  "SELECT * FROM siswa WHERE siswa_nisn='$nisn'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
     public function show_siswa(){
         $query  =  "SELECT * FROM siswa ORDER BY siswa_nama";
         $data   = mysql_query($query);
        while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function siswa($id_kelas){
         $query  =  "SELECT * FROM siswa WHERE id_kelas='$id_kelas' ORDER BY siswa_nama";
         $data   = mysql_query($query);
        while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
      public function hitung_siswa($id_kelas){
         $query = "SELECT * FROM siswa where id_kelas='$id_kelas'";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
     
     
     
    /*
     * ***********************************
     * Manajemen tabel wali murid
     * ***********************************
     */
    
    
    public function paging_wali($posisi,$batas){
         $query = "SELECT s.*, w.*
             FROM siswa AS s, wali_murid AS w
             WHERE w.siswa_nisn = s.siswa_nisn ORDER BY s.siswa_nama ASC LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function jumlah_wali(){
         $query = "SELECT * FROM wali_murid";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
     
      public function info_wali($nisn){
         $query = "SELECT * FROM wali_murid WHERE siswa_nisn='$nisn'";
         $data  = mysql_query($query);
         $hasil =  mysql_fetch_array($data);
         
         return $hasil;
     }
     
     public function tambah_wali($nisn,$ayah,$ibu,$p_ayah,$p_ibu,$alamat,$telepon){
         $query = "INSERT INTO wali_murid VALUES ('','$nisn','$ayah','$ibu','$p_ayah','$p_ibu','$alamat','$telepon')";
         mysql_query($query);
     }
     
     public function edit_wali($id_wali,$nisn,$ayah,$ibu,$p_ayah,$p_ibu,$alamat,$telpon){
         $query = "UPDATE wali_murid SET siswa_nisn='$nisn', wali_nama_ayah='$ayah', wali_nama_ibu='$ibu', wali_pekerjaan_ayah='$p_ayah', wali_pekerjaan_ibu='$p_ibu', wali_alamat='$alamat', wali_telepon='$telpon' "
                 . "WHERE wali_id='$id_wali'";
         mysql_query($query);
     }
     
      public function edit_wali_info($nisn,$ayah,$ibu,$p_ayah,$p_ibu,$alamat,$telpon){
         $query = "UPDATE wali_murid SET wali_nama_ayah='$ayah', wali_nama_ibu='$ibu', wali_pekerjaan_ayah='$p_ayah', wali_pekerjaan_ibu='$p_ibu', wali_alamat='$alamat', wali_telepon='$telpon' "
                 . "WHERE siswa_nisn='$nisn'";
         mysql_query($query);
     }
     
     public function hapus_wali($id_wali){
         $query = "DELETE FROM wali_murid WHERE wali_id='$id_wali'";
         mysql_query($query);
     }
     
     public function get_one_wali($id_wali){
         $query  =  "SELECT * FROM wali_murid WHERE wali_id='$id_wali'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
      public function get_one_wali_info($nisn){
         $query  =  "SELECT * FROM wali_murid WHERE siswa_nisn='$nisn'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
     
     
    
  
 /*
     * ***********************************
     * Manajemen tabel guru
     * ***********************************
     */
    
    
    public function paging_guru($posisi,$batas){
         $query = "SELECT g.*, k.*
             FROM guru AS g, kompetensi_keahlian AS k
             WHERE g.kompetensi_kode = k.kompetensi_kode ORDER BY g.guru_kode ASC LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
         public function detail_guru($guru_kode){
         $query = "SELECT g.*, k.*
             FROM guru AS g, kompetensi_keahlian AS k
             WHERE g.kompetensi_kode = k.kompetensi_kode && g.guru_kode='$guru_kode'";
         $data  = mysql_query($query);
         $hasil =  mysql_fetch_array($data);
         
         return $hasil;
     }
     
     
     public function jumlah_guru(){
         $query = "SELECT * FROM guru";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
     
     public function tambah_guru($kode,$kompetensi_kode,$nip,$nama,$alamat,$telepon,$email,$image){
         $query = "INSERT INTO guru VALUES ('$kode','$kompetensi_kode','$nip','$nama','$alamat','$telepon','$email','$image')";
         mysql_query($query);
     }
     
     public function edit_guru($kode,$kompetensi_kode,$nip,$nama,$alamat,$telepon,$email){
         $query = "UPDATE guru SET kompetensi_kode='$kompetensi_kode', guru_nip='$nip', guru_nama='$nama', guru_alamat='$alamat', guru_telepon='$telepon', email_guru='$email' "
                 . "WHERE guru_kode='$kode'";
         mysql_query($query);
     }
     
      public function edit_guru1($kode,$kompetensi_kode,$nip,$nama,$alamat,$telepon,$email,$image){
         $query = "UPDATE guru SET kompetensi_kode='$kompetensi_kode', guru_nip='$nip', guru_nama='$nama', guru_alamat='$alamat', guru_telepon='$telepon', email_guru='$email', image_guru='$image' "
                 . "WHERE guru_kode='$kode'";
         mysql_query($query);
     }
     
     public function hapus_guru($guru_kode){
         $query = "DELETE FROM guru WHERE guru_kode='$guru_kode'";
         mysql_query($query);
     }
     
     public function get_one_guru($guru_kode){
         $query  =  "SELECT * FROM guru WHERE guru_kode='$guru_kode'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
      public function show_guru(){
         $query  =  "SELECT * FROM guru ORDER BY guru_nama";
         $data   = mysql_query($query);
        while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     
    
     
     /*
     * ***********************************
     * Manajemen tabel user
     * ***********************************
     */
     
     
      public function paging_user($posisi,$batas){
         $query = "SELECT u.*, p.*
             FROM user AS u, profesi AS p
             WHERE u.id_profesi = p.id_profesi ORDER BY u.nama_user ASC LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
         public function detail_user($id_user){
         $query = "SELECT u.*, g.*
             FROM user AS u, guru AS g
             WHERE u.id_user = g.guru_kode && u.id_user='$id_user'";
         $data  = mysql_query($query);
         $hasil =  mysql_fetch_array($data);
         
         return $hasil;
     }
     
     
     public function jumlah_user(){
         $query = "SELECT * FROM user";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
     
     public function tambah_user($id,$nama,$username,$password,$profesi,$image,$hp,$alamat,$email){
         $query = "INSERT INTO user VALUES ('$id','$nama','$username','$password','$profesi','$image','$hp',"
                 . "'$alamat','$email','user','Y','')";
         mysql_query($query);
     }
     
     public function user_guru($id,$nama,$username,$password,$image,$hp,$alamat,$email){
         $query = "INSERT INTO user VALUES ('$id','$nama','$username','$password','4','$image','$hp',"
                 . "'$alamat','$email','user','Y','')";
         mysql_query($query);
     }
     
      public function user_siswa($id,$nama,$username,$password,$image,$hp,$alamat,$email){
         $query = "INSERT INTO user VALUES ('$id','$nama','$username','$password','5','$image','$hp',"
                 . "'$alamat','$email','user','Y','')";
         mysql_query($query);
     }
     
     public function edit_user($id,$nama,$username,$profesi,$image,$hp,$alamat,$email,$aktif){
         $query = "UPDATE user SET nama_user='$nama', username='$username', id_profesi='$profesi', image_user='$image', no_hp='$hp', "
                 . "alamat='$alamat', email='$email', aktif='$aktif' "
                 . "WHERE id_user='$id'";
         mysql_query($query);
     }
     
     public function edit_user1($id,$nama,$username,$profesi,$hp,$alamat,$email,$aktif){
         $query = "UPDATE user SET nama_user='$nama', username='$username', id_profesi='$profesi', no_hp='$hp', "
                 . "alamat='$alamat', email='$email', aktif='$aktif' "
                 . "WHERE id_user='$id'";
         mysql_query($query);
     }
     
     
     public function hapus_user($id_user){
         $query = "DELETE FROM user WHERE id_user='$id_user'";
         mysql_query($query);
     }
     
     public function get_one_user($id_user){
         $query  =  "SELECT * FROM user WHERE id_user='$id_user'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
      public function info_user($id_user){
         $query  =  "SELECT u.*, p.* FROM user AS u, profesi As p WHERE u.id_user='$id_user' && u.id_profesi=p.id_profesi";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
     public function cek_password($password_lama,$id_user){
         $query  =  "SELECT * FROM user WHERE password='$password_lama' && id_user='$id_user'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
      public function edit_password($password,$id_user) {
        $query = "UPDATE user SET password='$password' WHERE id_user='$id_user'";
        mysql_query($query);
    }
   
    
    /*
     * ***********************************
     * Manajemen tabel profesi
     * ***********************************
     */
     
      public function show_profesi(){
        $query  = "SELECT * FROM profesi ORDER BY nama_profesi ASC";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    public function paging_profesi ($posisi,$batas){
        $query  = "SELECT * FROM profesi ORDER BY nama_profesi ASC LIMIT $posisi,$batas";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }
        return $hasil;
    }
    
    public function jumlah_profesi (){
        $query  = "SELECT * FROM profesi";
        $data   = mysql_query($query);
        $hasil  = mysql_num_rows($data);
        
        return $hasil;
    }
    
    public function tambah_profesi ($nama_profesi,$keterangan){
        $query  = "INSERT INTO profesi VALUES ('','$nama_profesi','$keterangan','Y')";
        mysql_query($query);
    }
    
    public function edit_profesi ($id_profesi,$nama_profesi,$keterangan,$aktif){
        $query  = "UPDATE profesi SET nama_profesi='$nama_profesi', keterangan_profesi='$keterangan', profesi_aktif='$aktif' WHERE id_profesi='$id_profesi'";
        mysql_query($query);
    }
    
    public function hapus_profesi ($id_profesi) {
        $query  = "DELETE FROM profesi WHERE id_profesi='$id_profesi'";
        mysql_query($query);
    }
    
    public function get_one_profesi ($id_profesi) {
        $query  =  "SELECT * FROM profesi WHERE id_profesi='$id_profesi'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
    }


    
    /*
     * ***********************************
     * Manajemen Akun
     * ***********************************
     */
    
     public function login_username($username,$password) {
        $query  = "SELECT * FROM user WHERE username='$username'
                   && password='$password' && aktif='Y'";
        $data   = mysql_query($query);
        
        return $data;
    }
    
    public function login_email($email,$password) {
        $query  = "SELECT * FROM user WHERE username='$username'
                   && email='$email' && aktif='Y'";
        $data   = mysql_query($query);
        
        return $data;
    }
    
    public function last_login($id_user,$time){
        $query = "UPDATE user SET last_login='$time' WHERE id_user='$id_user' ";
        mysql_query($query);
    }


    
    
    public function logout_akun() {
        session_start();
        session_destroy();
        echo "<script>window.location='index.php';</script>";
    }
    
    
    /*
     * ***********************************
     * Manajemen tabel nilai
     * ***********************************
     */
    
    
    public function paging_nilai($posisi,$batas){
         $query = "SELECT n.*, k.*, s.*
             FROM nilai AS n, standar_kompetensi AS k, siswa AS s
             WHERE n.siswa_nisn = s.siswa_nisn && n.sk_kode = k.sk_kode ORDER BY k.sk_nama ASC LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function siswa_nilai($nisn,$posisi,$batas){
         $query = "SELECT n.*, k.*, u.*
             FROM nilai AS n, standar_kompetensi AS k, ujian AS u
             WHERE n.siswa_nisn = '$nisn' && n.sk_kode = k.sk_kode && n.id_ujian = u.id_ujian LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function guru_nilai($nip,$posisi,$batas){
         $query = "SELECT n.*, k.*, s.*, u.*
             FROM nilai AS n, standar_kompetensi AS k, siswa AS s, ujian AS u
             WHERE n.guru_kode = '$nip' && n.sk_kode = k.sk_kode && n.siswa_nisn = s.siswa_nisn && n.id_ujian = u.id_ujian LIMIT $posisi,$batas";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
     public function jumlah_nilai(){
         $query = "SELECT * FROM nilai";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
     
     
     public function tambah_nilai($nisn,$guru,$ujian,$sk_kode,$nilai,$huruf){
         $query = "INSERT INTO nilai VALUES ('','$nisn','$guru','$ujian','$sk_kode','$nilai','$huruf')";
         mysql_query($query);
     }
     
     public function edit_nilai($id_nilai,$nisn,$guru,$ujian,$sk_kode,$nilai,$huruf){
         $query = "UPDATE nilai SET siswa_nisn='$nisn', guru_kode='$guru', id_ujian='$ujian', sk_kode='$sk_kode', nilai='$nilai', nilai_huruf='$huruf' "
                 . "WHERE id_nilai='$id_nilai'";
         mysql_query($query);
     }
     
     
     public function hapus_nilai($id_nilai){
         $query = "DELETE FROM nilai WHERE id_nilai='$id_nilai'";
         mysql_query($query);
     }
     
     public function get_one_nilai($id_nilai){
         $query  =  "SELECT * FROM nilai WHERE id_nilai='$id_nilai'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
     }
     
     public function verifikasi_nilai($nisn,$guru,$ujian,$sk){
         $query  =  "SELECT * FROM nilai WHERE siswa_nisn='$nisn' && guru_kode='$guru' && id_ujian='$ujian' && sk_kode='$sk'";
        $data   = mysql_query($query);
        $hasil  = mysql_fetch_array($data);
        
        return $hasil;
         
     }
     
    
     
 /*
 * ****************************************
 * Manajemen Laporan
 * ****************************************
 */
     
      public function laporan($kelas,$ujian,$sk){
         $query = "select s.*, n.* from siswa as s, nilai as n where s.id_kelas='$kelas' && s.siswa_nisn=n.siswa_nisn && n.id_ujian='$ujian' && n.sk_kode = '$sk' ";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
      public function jumlah_data_laporan($kelas,$ujian,$sk){
         $query = "select s.*, n.* from siswa as s, nilai as n where s.id_kelas='$kelas' && s.siswa_nisn=n.siswa_nisn && n.id_ujian='$ujian' && n.sk_kode = '$sk' ";
         $data  = mysql_query($query);
         $hasil = mysql_num_rows($data);
         
         return $hasil;
     }
    
     
 /*
 * ****************************************
 * Cari Nilai
 * ****************************************
 */
     
    public function cari_nilai($siswa,$ujian,$sk){
         $query = "select n.*, s.*, g.*, sk.*, u.* from nilai as n, siswa as s, guru as g, standar_kompetensi as sk, ujian as u"
                 . " where n.siswa_nisn='$siswa' && n.id_ujian='$ujian' && n.sk_kode='$sk' &&"
                 . " s.siswa_nisn=n.siswa_nisn && g.guru_kode=n.guru_kode && sk.sk_kode=n.sk_kode && u.id_ujian=n.id_ujian";
         $data  = mysql_query($query);
         $hasil=  mysql_fetch_array($data);
       
         return $hasil;
     }
     
     public function cari_nilai_siswa($siswa,$ujian,$sk,$guru){
         $query = "select n.*, s.*, g.*, sk.*, u.* from nilai as n, siswa as s, guru as g, standar_kompetensi as sk, ujian as u"
                 . " where n.siswa_nisn='$siswa' && n.id_ujian='$ujian' && n.sk_kode='$sk' && n.guru_kode='$guru' &&"
                 . " s.siswa_nisn=n.siswa_nisn && g.guru_kode=n.guru_kode && sk.sk_kode=n.sk_kode && u.id_ujian=n.id_ujian";
         $data  = mysql_query($query);
         $hasil=  mysql_fetch_array($data);
       
         return $hasil;
     }
     
     public function sk_guru($guru){
        $query  = "SELECT * FROM standar_kompetensi WHERE guru_kode='$guru' ORDER BY sk_nama ASC";
        $data   = mysql_query($query);
        while ($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    
    
 /*
 * ****************************************
 * Rekap Nilai
 * ****************************************
 */

   public function rekap($siswa){
         $query = "select s.*, sk.* from siswa as s, standar_kompetensi as sk where s.siswa_nisn='$siswa' && s.kompetensi_kode=sk.kompetensi_kode ";
         $data  = mysql_query($query);
         while ($row=  mysql_fetch_array($data)){
             $hasil[]=$row;
         }
         return $hasil;
     }
     
      public function nilai_rekap($siswa,$sk){
         $query = "select * from nilai where siswa_nisn='$siswa' && sk_kode='$sk' ";
         $data  = mysql_query($query);
         $hasil=  mysql_fetch_array($data);
       
         return $hasil;
     }
    

} /*
 * ****************************************
 * akhiri fungsi (functions)
 * ****************************************
 */



?>
