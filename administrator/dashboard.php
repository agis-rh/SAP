<div class="span7">
 <div class="alert alert-block alert-info well well-small well-shadow">
     <i class="icon-info-sign icon-large"></i> Selamat datang <b><?php echo $_SESSION['nama_user']; ?></b> di halaman depan <?php echo $setting['title'];?> <?php  echo $setting['nama_sekolah']; ?> 
</div>
</div>

<div class="span8">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-bookmark"></i>
                        <h5>Shortcuts</h5>
                    </div>
                    <div class="box-content">
                        <div align="center">
                        <div class="btn-group-box">
                            <a href='?module=detail_user&&id_user=<?php echo$_SESSION[id_user];?>' rel='tooltip' title='Akun User'>
                                <button class="btn"><i class="icon-user icon-large"></i><br/>Akun</button>
                            </a>
                            <a href='?module=ganti_password' rel="tooltip" title="Ganti Password">
                            <button class="btn"><i class="icon-unlock icon-large"></i><br/>Password</button>
                            </a>
                            <a href='logout.php' rel="tooltip" title="Logout">
                            <button class="btn"><i class="icon-signout icon-large"></i><br/>Logout</button>
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
</div>

 <div class="span7">
                        <div class="box">
                            <div class="box-header">
                                <i class="icon-exclamation-sign"></i>
                                <h5>Perhatian</h5>
                            </div>
                            <div class="box-content">
                                <p>
                                * Admin berkuasa penuh terhadap aplikasi.
                                </p>
                                <p>
                                * Apabila ada user yang bertindak sewenang-wenang maka akun user tersebut bisa di non-aktifkan oleh admin.
                                </p>
                                <p>
                                * Demi keamanan dan kenyamanan untuk user Guru dan Siswa yang baru bergabung bisa mengganti username dan password karena secara default
                                akun tersebut menggunakan NIP dan NIS.
                                </p>
                                <p>
                                * Ketika mengganti password dan username jangan gunakan karakter spesal (spasi,/.*# dsb.) karena karakter tersebut
                                tidak akan bisa di eksekusi.
                                </p>
                                <p>
                                  * Guru bertugas menginput nilai dan mencetak laporan.
                                </p>
                            </div>
                        </div>
                    </div>

<div class="span8">
                <div class="box pattern pattern-sandstone">
                    <div class="box-header">
                        <i class="icon-star"></i>
                        <h5>Profesi</h5>
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-list">
                            <i class="icon-reorder"></i>
                        </button>
                    </div>
                    <div class="box-content box-list collapse in">
                        <ul>
                            <?php
                            $data=$syntax->show_profesi();
                            foreach ($data as $row){
                            echo"<li>
                                <div>
                                    <p class='news-item-title text-info'>$row[nama_profesi]</p>
                                    <p class='news-item-preview'>$row[keterangan_profesi]</p>
                                </div>
                            </li>";
                            }
                            ?>
                            <li>
                        </ul>
                        <div class="box-collapse">
                            <button class="btn btn-box" data-toggle="collapse" data-target=".more-list">
                               Lihat Kompetensi Keahlian
                            </button>
                        </div>
                        <ul class="more-list collapse out">
                           <?php
                            $bidang=$syntax->kompetensi_keahlian();
                            foreach ($bidang as $hasil){
                            echo"<li>
                                <div>
                                    <p class='news-item-title text-info'>$hasil[kompetensi_kode]</p>
                                    <p class='news-item-preview'>$hasil[kompetensi_nama]</p>
                                </div>
                            </li>";
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>


            