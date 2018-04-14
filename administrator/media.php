<?php
require_once("../system/functions.php"); // masukan file functions.php
require_once("../system/fungsi_indotgl.php"); // masukan file fungsi_indotgl.php
require_once("../system/fungsi_terbilang.php"); // masukan file fungsi_terbilang.php
$syntax  = new Functions();
$db = new koneksi();
$paging = new Paging();
$setting=$syntax->get_one_pengaturan();
session_start();
if(empty($_SESSION['id_user'])) {
    echo "Login dulu !";
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>
        *{
            padding: 0;margin: 0;
        }
        
    
        #loading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(../assets/images/loading.gif) 50% 50% no-repeat #fff;
        }
        
    </style>    

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $setting['title']; ?></title>
    <link rel="shortcut icon" href="../assets/images/b_home.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="layout" content="main"/>
    
    <!------------GLOBAL STYLE----------------->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script src="../assets/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <script src="../assets/js/jquery/bootstrap-fileupload.js" type="text/javascript" ></script>
    <link href="../assets/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="../assets/css/bootstrap-fileupload.min.css.css" type="text/css" />
    <style>
       
    </style>
</head>

    <!----BEGIN BODY---->
    <body>

     
        
    <!-----------------BEGIN FIXED NAVBAR-------->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    
                    
                    
                     <!----LOGO----->
                    <a href="?module=dashboard" class="brand"><i class="icon-leaf"><em> Be awesome </em></i></a>
                    <div id="app-nav-top-bar" class="nav-collapse">
                        
                        
                        
                        <!----button right---->
                        <ul class="nav pull-right">   
                            <li>
                             <div class="btn-group">
	                       <button data-toggle="dropdown" class="btn dropdown-toggle">
                                   <i class="icon-user"></i> Profil  <span class="caret"></span></button>
			          <ul class="dropdown-menu">
                                      <?php
                                      if($_SESSION['id_profesi']==1){
				     echo "<li><a href='?module=detail_user&&id_user=$_SESSION[id_user]'>Profil Akun <i class='icon-user'></i></a></li>
                                         <li><a href='?module=ganti_password'>Ganti Password <i class='icon-lock'></i></a></li>
				     <li class='divider'></li>
				     <li><a href='logout.php'>Logout <i class='icon-arrow-right'></i></a></li>";
                                      }elseif ($_SESSION['id_profesi']==2) {
                                      echo "<li><a href='?module=detail_user&&id_user=$_SESSION[id_user]'>Profil Akun <i class='icon-user'></i></a></li>
                                          <li><a href='?module=ganti_password'>Ganti Password <i class='icon-lock'></i></a></li>
				     <li class='divider'></li>
				       <li><a href='logout.php'>Logout <i class='icon-arrow-right'></i></a></li>";
                                              
                                          }elseif ($_SESSION['id_profesi']==3) {
                                             echo "<li><a href='?module=detail_user&&id_user=$_SESSION[id_user]'>Profil Akun <i class='icon-user'></i></a></li>
                                                 <li><a href='?module=ganti_password'>Ganti Password <i class='icon-lock'></i></a></li>
				     <li class='divider'></li>
				       <li><a href='logout.php'>Logout <i class='icon-arrow-right'></i></a></li>"; 
                                             
                                          }elseif ($_SESSION['id_profesi']==4) {
                                               echo "<li><a href='?module=detail_user&&id_user=$_SESSION[id_user]'>Profil Akun <i class='icon-user'></i></a></li>
                                                   <li><a href='?module=detail_guru&&kode=$_SESSION[id_user]'>Profil Guru <i class='icon-credit-card'></i></a></li>
                                                   <li><a href='?module=ganti_password'>Ganti Password <i class='icon-lock'></i></a></li>
				     <li class='divider'></li>
				       <li><a href='logout.php'>Logout <i class='icon-arrow-right'></i></a></li>";
                                              
                                          }  else {
                                              
                                               echo "<li><a href='?module=detail_user&&id_user=$_SESSION[id_user]'>Profil Akun <i class='icon-user'></i></a></li>
                                                   <li><a href='?module=detail_siswa&&nisn=$_SESSION[id_user]'>Profil Siswa <i class='icon-credit-card'></i></a></li>
                                                   <li><a href='?module=ganti_password'>Ganti Password <i class='icon-lock'></i></a></li>
				     <li class='divider'></li>
				       <li><a href='logout.php'>Logout <i class='icon-arrow-right'></i></a></li>";
                                          }
                                     ?>
				  </ul>
			    </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!---END NAVBAR FIXED---->
        
        
        
        
        <!----BEGIN BODY----->
        <div id="body-container">
            <div id="body-content">
                
                
                    <!---- NAV FIXED MENU ---->
                    <div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul>
                                
                                <?php
                                if($_SESSION['id_profesi']==1){
                                    echo"<li>
                                            <a href='?module=dashboard' rel='tooltip' title='Beranda'>
                                                <i class='icon-home icon-large'></i> Beranda
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=guru' rel='tooltip' title='Guru'>
                                                <i class='icon-user icon-large'></i> Guru
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=siswa' rel='tooltip' title='Siswa'>
                                                <i class='icon-book icon-large'></i> Siswa
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=wali' rel='tooltip' title='Wali Murid'>
                                                <i class='icon-credit-card icon-large'></i> Wali Murid
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=kompetensi_keahlian' rel='tooltip' title='Kompetensi Keahlian'>
                                                <i class='icon-star icon-large'></i> Keahlian
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=bidang_studi' rel='tooltip' title='Bidang Studi'>
                                                <i class='icon-briefcase icon-large'></i> Bidang Studi
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=sk' rel='tooltip' title='Standar Kompetensi'>
                                                <i class='icon-edit icon-large'></i> Stdr Kompetensi
                                            </a>
                                        </li>
                                         <li>
                                            <a href='?module=kelas' rel='tooltip' title='Kelas'>
                                                <i class='icon-list-ol icon-large'></i> Kelas
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=ujian' rel='tooltip' title='Ujian Sekolah'>
                                                <i class='icon-paste icon-large'></i> Ujian Sekolah
                                            </a>
                                        </li>
                                         <li>
                                            <a href='?module=nilai' rel='tooltip' title='Manajemen Nilai'>
                                                <i class='icon-tasks icon-large'></i> Nilai
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=pilih_laporan' rel='tooltip' title='Manajemen Laporan'>
                                                <i class='icon-bar-chart icon-large'></i> Laporan
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=profesi' rel='tooltip' title='Profesi User'>
                                                <i class='icon-map-marker icon-large'></i> Profesi
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=user' rel='tooltip' title='User'>
                                                <i class='icon-lock icon-large'></i> User
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=pengaturan' rel='tooltip' title='Pengaturan'>
                                                <i class='icon-cogs icon-large'></i> Pengaturan
                                            </a>
                                        </li>";
                                }  elseif ($_SESSION['id_profesi']==2) {
                                    echo"<li>
                                            <a href='?module=dashboard' rel='tooltip' title='Beranda'>
                                                <i class='icon-home icon-large'></i> Beranda
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=guru' rel='tooltip' title='Guru'>
                                                <i class='icon-user icon-large'></i> Guru
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=siswa' rel='tooltip' title='Siswa'>
                                                <i class='icon-book icon-large'></i> Siswa
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=wali' rel='tooltip' title='Wali Murid'>
                                                <i class='icon-credit-card icon-large'></i> Wali Murid
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=kompetensi_keahlian' rel='tooltip' title='Kompetensi Keahlian'>
                                                <i class='icon-star icon-large'></i> Keahlian
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=bidang_studi' rel='tooltip' title='Bidang Studi'>
                                                <i class='icon-briefcase icon-large'></i> Bidang Studi
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=sk' rel='tooltip' title='Standar Kompetensi'>
                                                <i class='icon-edit icon-large'></i> Stdr Kompetensi
                                            </a>
                                        </li>
                                         <li>
                                            <a href='?module=kelas' rel='tooltip' title='Kelas'>
                                                <i class='icon-list-ol icon-large'></i> Kelas
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=ujian' rel='tooltip' title='Ujian Sekolah'>
                                                <i class='icon-paste icon-large'></i> Ujian Sekolah
                                            </a>
                                        </li>
                                         <li>
                                            <a href='?module=nilai' rel='tooltip' title='Manajemen Nilai'>
                                                <i class='icon-tasks icon-large'></i> Nilai
                                            </a>
                                        </li>";
                                }  elseif ($_SESSION['id_profesi']==3) {
                                   echo"<li>
                                            <a href='?module=dashboard' rel='tooltip' title='Beranda'>
                                                <i class='icon-home icon-large'></i> Beranda
                                            </a>
                                        </li>
                                       
                                        <li>
                                            <a href='?module=siswa' rel='tooltip' title='Siswa'>
                                                <i class='icon-book icon-large'></i> Siswa
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=wali' rel='tooltip' title='Wali Murid'>
                                                <i class='icon-credit-card icon-large'></i> Wali Murid
                                            </a>
                                        </li>
                                         <li>
                                            <a href='?module=sk' rel='tooltip' title='Standar Kompetensi'>
                                                <i class='icon-edit icon-large'></i> Stdr Kompetensi
                                            </a>
                                        </li>"; 
                                }  elseif ($_SESSION['id_profesi']==4) {
                                  echo"<li>
                                            <a href='?module=dashboard' rel='tooltip' title='Beranda'>
                                                <i class='icon-home icon-large'></i> Beranda
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=guru_nilai' rel='tooltip' title='Manajemen Nilai'>
                                                <i class='icon-tasks icon-large'></i> Nilai
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=cari_nilai_siswa' rel='tooltip' title='Pencarian Nilai'>
                                                <i class='icon-zoom-in icon-large'></i>Cari Nilai
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=rekap_form' rel='tooltip' title='Rekap Nilai'>
                                                <i class='icon-briefcase icon-large'></i> Rekap Nilai
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=pilih_laporan' rel='tooltip' title='Manajemen Laporan'>
                                                <i class='icon-bar-chart icon-large'></i> Laporan
                                            </a>
                                        </li>";   
                                }  else {
                                   echo"<li>
                                            <a href='?module=dashboard' rel='tooltip' title='Beranda'>
                                                <i class='icon-home icon-large'></i> Beranda
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=siswa_nilai' rel='tooltip' title='Nilai Siswa'>
                                                <i class='icon-tasks icon-large'></i> Nilai
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=rekap_nilai&&siswa=$_SESSION[id_user]' rel='tooltip' title='Rekap Nilai'>
                                                <i class='icon-briefcase icon-large'></i> Rekap Nilai
                                            </a>
                                        </li>
                                        <li>
                                            <a href='?module=cari_nilai' rel='tooltip' title='Pencarian Nilai'>
                                                <i class='icon-zoom-in icon-large'></i>Cari Nilai
                                            </a>
                                        </li>";  
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                
          
         <!----TOP MENU ------>
        <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <header class="page-header">
                                <h3><i class="icon-screenshot icon-large"></i> Administrator<br/>
                            <small>Sistem Aplikasi Penilaian</small>
                        </h3>
                    </header>
                </div>
                <div class="span10">
                        <ul class="nav nav-pills">
                            <li>
                                <a href="logout.php" rel="tooltip" data-placement="left" title="Logout">
                                        <i class="icon-signout icon-large"></i>
                               </a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </section>
         
         
         
         <!----CONTENT SECTION----->
    <section class="page container">
        <?php require ('konten.php'); ?>
    </section>

    

            </div> <!--_END BODY CONTENT--->
        </div> <!--- END BODY CONTAINER --->

        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div><br><br><br><br><br><br>

        
        <!----FOOTER--->
        <footer class="application-footer well well-small well-shadow">
                  
                <div class="disclaimer">
                     <?php
                $tahun=date('Y');
                    echo"<p>Sistem Aplikasi Penilaian</p>
                    <p>Copyright © $tahun. Agis Rahma Herdiana</p>
                    <p>Build with bootstrap.</p>";
                      ?>
                </div>
            
        </footer>
        
        
        <!---------SCRIPT PLUGIN------->
        <script src="../assets/js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="../assets/js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="../assets/js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
        <script src="../assets/js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="../assets/js/jquery/virtual-tour.js" type="text/javascript" ></script>
        <script type="text/javascript">
        $(function() {
            $('#sample-table').tablesorter();
            $('#datepicker').datepicker();
            $(".chosen").chosen();
            $("[rel=tooltip]").tooltip();
        });
        $(window).load(function() { $("#loading").fadeIn(300).delay(500).fadeOut("300"); })
    </script>
    <script>
        $(function() {
            $(".meter > span").each(function() {
                $(this)
                    .data("origWidth", $(this).width())
                    .width(0)
                    .animate({
                        width: $(this).data("origWidth")
                    }, 1200);
            });
        });
    </script>
    
   

    </body>
</html>

<?php
}