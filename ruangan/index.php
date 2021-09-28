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
            <div class="col-md-6">
                <div class="table-responsive mt-2 " id="container">
                    <table class="table table-bordered table-sm">
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
                            
                            $sql_ruangan = mysqli_query($host,"SELECT * FROM ruangan WHERE id_instalasi='104' ORDER BY id");
                            $nomor = 1;
                            while($d = mysqli_fetch_array($sql_ruangan)){
                                $id_ruangan = $d['id'];
                                $sql_kamar  = mysqli_query($host, "SELECT * FROM ruangan_kamar WHERE id_ruangan='$id_ruangan'");
                                $count_kamar= mysqli_num_rows($sql_kamar);
                                $sql_bed    = mysqli_query($host, "SELECT * FROM ruangan_kamar_bed WHERE id_ruangan='$id_ruangan'");
                                $count_bed  = mysqli_num_rows($sql_bed)
                                ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $d['ruangan']; ?></td>
                                    <td><?= $count_kamar; ?></td>
                                    <td><?= $count_bed; ?></td>
                                    <td>
                                        <a href="<?= $site_url?>/ruangan/detail.php?id=<?= $d['has_ruangan']?>" class="btn btn-success btn-sm">Detail</a>
                                        <a href="<?= $site_url?>/ruangan/bed-management.php?id=<?= $d['has_ruangan']?>" class="btn btn-warning btn-sm">Bed Management</a>
                                    </td>
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