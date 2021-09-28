<?php
$judul  = "Data Base Ruangan";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2>DATA BASE RUANGAN </h2>
                <p>Melihat seluruh data ruangan</p>
            </div>
        </div>
        <div class="row justify-content-center">
            
            <div class="col-md-2"> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Ruangan</button>
            </div>
            
            
        <div>
        <div class="row justify-content-center"> 
            <div class="col-md-6">
                <div class="table-responsive mt-2 " id="container">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Ruang Pelayanan</th>
                                <th>Kamar</th>
                                <th>Bed</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $data_pegawai = mysqli_query($host,"SELECT * FROM ruangan WHERE id_instalasi='104' order by id");
                            $nomor = 1;
                            while($d = mysqli_fetch_array($data_pegawai)){
                                // //agama
                                // $id_agama   = $d['agama'];
                                // $sql_agama  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
                                // $agama      = mysqli_fetch_array($sql_agama);
                                
                                ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $d['ruangan']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="<?= $site_url?>/ruangan/detail.php?id=<?= $d['has_ruangan']?>" class="btn btn-success btn-sm">Detail</a>
                                    </td>

                                    <?php
                                    $id_ruangan = $d['id'];
                                    $sql_kamar  = mysqli_query($host, "SELECT * FROM ruangan_kamar WHERE id_ruangan='$id_ruangan'");
                                    while($k=mysqli_fetch_array($sql_kamar)){
                                    //kelas perawatan
                                    $id_kelas       = $k['id_kelas_perawatan'];
                                    $sql_kelas      = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_kelas'");
                                    $kelas_perawatan= mysqli_fetch_array($sql_kelas);
                                
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?=$k['nama_kamar']."---".$kelas_perawatan['nama_submaster']?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php

include('../layout/footer.php');
?>