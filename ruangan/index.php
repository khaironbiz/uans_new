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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $d['id']?>">
                                        Add Kamar
                                        </button>
                                    </td>

                                        <!-- Button trigger modal -->
                                        

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?= $d['id']?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="mb-3 row">
                                                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama Ruangan</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $d['ruangan']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Nama Kamar</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="inputPassword">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Kelas Perawatan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-select" required name="id_kelas_perawatan">
                                                                    <option value="">---Pilih---</option>
                                                                    <?php
                                                                    $sql_kelas_per  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='25'");
                                                                    while($data_kelas=mysqli_fetch_array($sql_kelas_per)){
                                                                    ?>
                                                                    <option value="1"><?= $data_kelas['nama_submaster']?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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