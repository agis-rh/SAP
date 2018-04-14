<?php
session_start();
require_once("system/functions.php"); // masukan file functions.php
$syntax  = new Functions();
$db = new koneksi();
if(empty($_SESSION['id_user'])) {
?>
<html lang='en'>
<head>
    <meta charset='UTF-8' /> 
    <title>Login Aplikasi</title>
    <link rel="shortcut icon" href="assets/images/b_home.png">
    <script src='assets/js/jquery/jquery.min.js.js' type='text/javascript' ></script>
    <link href='assets/css/style.css' type='text/css' media='screen, projection' rel='stylesheet' />

</head>
<body>

<div id="wrapper">

    <form id="login" method="POST" action="" class="login-form">
	
		 <div id="login-form">
        <h3>Login Aplikasi</h3>
        <fieldset>
            <form action="" method="POST">
                <input type="text" name="username" required placeholder="Username" "> 
                <input type="password" name="password" required placeholder="Password" ">

                <input type="submit" name="kirim" value="Login">
                <footer class="clearfix">
                <?php
                $tahun=date('Y');
                    echo"<p><span class='info'>&COPY;</span>Copyright $tahun </p>";
                ?>
                </footer>
        </fieldset>

    </div> <!-- end login-form -->

	
	</form>

</div>
<div class="gradient"></div>


</body>
</html>

<?php
                       if(isset($_POST['kirim'])) {
                           
                           function anti_injection($data){
                           $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
                           return $filter;
}
                           $time              = date("Y-m-d H:i:s");
                           $username          = anti_injection($_POST['username']);
                           $password          = anti_injection(md5($_POST['password']));


                               $login_username      = $syntax->login_username($username,$password);
                               $login_email         = $syntax->login_email($username,$password);

                               $jumlah_login_username     = mysql_num_rows($login_username);
                               $jumlah_login_email        = mysql_num_rows($login_email);

                               $data_1       = mysql_fetch_array($login_username);
                               $data_2       = mysql_fetch_array($login_email);

                               if($jumlah_login_username > 0) {

                                   session_start();

                                   $_SESSION['id_user']    = $data_1['id_user'];
                                   $_SESSION['level']      = $data_1['level'];
                                   $_SESSION['id_profesi'] = $data_1['id_profesi'];
                                   $_SESSION['nama_user']  = $data_1['nama_user'];
                                   
                                   // catat waktu login
                                   $syntax->last_login($_SESSION['id_user'], $time);

                                   echo "<script>window.location='administrator/media.php?module=dashboard';</script>";
                               }
                               else {
                                       if($jumlah_login_email > 0) {

                                           session_start();
                                           $_SESSION['id_user']    = $data_2['id_user'];
                                           $_SESSION['level']      = $data_2['level'];
                                           $_SESSION['id_profesi'] = $data_2['id_profesi'];
                                           $_SESSION['nama_user']  = $data_2['nama_user'];

                                           echo "<script>window.location='administrator/media.php?module=dashboard';</script>";
                                       }
                                       else {
                                           echo "<br/><div class='notification'><b>Failed access !</b><br> username atau password salah, silahkan dicek kembali.</div>";   
                                       }
                               }
                       }
                        ?>
		
	</div> <!-- end content -->
        
<?php
}
else {
    header("Location:administrator/ media.php?module=dashboard");
}
	