<?php

/* 
 * filename : .php
 * Creator  : Agis Rahma Herdiana
 * Made     : Copyright © 2015
 */

function Terbilang($nilai) {
    /* Membuat array untuk nama bilangan */
    $nama_bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($nilai < 12){
        /* Jika nilai yang dimasukan kurang dari 12 */
        $huruf = " ". $nama_bilangan[$nilai];
    }
    elseif ($nilai < 20) {
        /* Jika nilai yang dimasukan kurang dari 12 */
        $huruf = Terbilang($nilai - 10). "Belas";
    }
    elseif ($nilai <100) {
        /* Jika nilai yang dimasukan kurang dari 100 */
        $huruf = Terbilang($nilai / 10). " Puluh". Terbilang($nilai % 10);
    }
    elseif ($nilai == 100) {
        /* Jika nilai yang dimasukan kurang dari 12 */
        $huruf = " Seratus" . Terbilang($nilai - 100);
}

/* konversi nilai menjadi huruf */
return $huruf;
    
}


