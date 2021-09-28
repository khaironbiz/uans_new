<?php
$judul  = "Data Base Ruangan";
include('../layout/header.php');
include('../layout/menu.php');
$has_ruangan    = $_GET['id'];
$sql_ruangan    = mysqli_query($host, "SELECT * FROM ruangan WHERE has_ruangan='$has_ruangan'");
$ruangan        = mysqli_fetch_array($sql_ruangan);
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
            </div>
            <div>
                <div class="row justify-content-center"> 
                    <div class="col-md-12">
                        <div class="table-responsive mt-2 " id="container">
                            <h3><?= $ruangan['ruangan']?></h3>
                            <table class="table table-bordered table-sm">
                                
                                <tbody>
                                    <?php 
                                    $id_ruangan     = $ruangan['id'];
                                    $sql_kamar      = mysqli_query($host,"SELECT * FROM ruangan_kamar WHERE id_ruangan='$id_ruangan' order by no_kamar");
                                    $nomor = 1;
                                    while($d = mysqli_fetch_array($sql_kamar)){
                                        // //agama
                                        // $id_agama   = $d['agama'];
                                        // $sql_agama  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
                                        // $agama      = mysqli_fetch_array($sql_agama);
                                        
                                        ?>
                                        <tr>
                                            <th colspan="4"><?= $d['no_kamar']; ?></th>
                                        </tr>
                                        
                                            <?php
                                            // $id_kamar   = $d['id_kamar'];
                                            // $sql_bed    = mysqli_query($host, "SELECT * FROM ruangan_kamar_bed WHERE id_kamar='$id_kamar'");
                                            // while($k    = mysqli_fetch_array($sql_bed)){
                                            $id_kamar   = $d['id_kamar'];
                                            $sql_px     = mysqli_query($host, "SELECT * FROM pasien_ruangan 
                                                            JOIN ruangan_kamar_bed ON ruangan_kamar_bed.id_bed=pasien_ruangan.id_bed
                                                            JOIN pasien_db ON pasien_db.nrm=pasien_ruangan.nrm
                                                            WHERE pasien_ruangan.id_kamar='$id_kamar' ORDER BY ruangan_kamar_bed.nama_bed");  
                                            while($px         = mysqli_fetch_array($sql_px)){
                                            
                                            ?>
                                            <tr>
                                                <td width="5%">Bed <?= strtoupper($px['nama_bed'])?></td>
                                                <td><?= $px['nama']?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="4"><a href="#" class="btn btn-danger btn-sm">Back</a></td>
                                    </tr>
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