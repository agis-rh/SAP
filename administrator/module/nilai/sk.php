
<?php
require_once("../../../system/functions.php");
$syntax  = new Functions();
$db = new koneksi();

// Menampilkan pilihan standar kompetensi
$data = $syntax->sk($_POST['guru']);
foreach ($data as $row){

    echo"<div class='radio' style=' padding-left: 40px;'>
    <input type='radio' name='kompetensi' value='$row[sk_kode]' /> $row[sk_nama]
    </div><br>";                                
         }
                                      
?>
