                        <!-- Button trigger modal -->
                            <form action="<?=$site_url; ?>/pasien/data-base.php" Method="POST">
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">NRM</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" class="form-control" placeholder="NRM" name="nrm">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="tgl_lahir">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="sex">
                                                            <option value="">---pilih---</option>
                                                            <?php
                                                            $sql_sex = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='4'");
                                                            while($data_sex=mysqli_fetch_array($sql_sex)){
                                                            ?>
                                                            <option value="<?= $data_sex['id']?>"><?= $data_sex['nama_submaster']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">Agama</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="agama">
                                                            <option value="">---pilih agama---</option>
                                                            <?php
                                                            $sql_agama = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='3'");
                                                            while($data_agama=mysqli_fetch_array($sql_agama)){
                                                            ?>
                                                            <option value="<?= $data_agama['id']?>"><?= $data_agama['nama_submaster']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">Pendidikan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="pendidikan">
                                                            <option value="">---Pilih Pendidikan---</option>
                                                            <?php
                                                            $sql_pendidikan = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='26'");
                                                            while($data_pendidikan=mysqli_fetch_array($sql_pendidikan)){
                                                            ?>
                                                            <option value="<?= $data_pendidikan['id']?>"><?= $data_pendidikan['nama_submaster']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">Status Pernikahan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="status_nikah">
                                                            <option value="">---Pilih Status---</option>
                                                            <?php
                                                            $sql_status = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id_master='7'");
                                                            while($data_status=mysqli_fetch_array($sql_status)){
                                                            ?>
                                                            <option value="<?= $data_status['id']?>"><?= $data_status['nama_submaster']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                                    <div class="col-sm-9">
                                                        <input type="datetime-local" class="form-control" placeholder="tanggal masuk" name="waktu_masuk">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">Diagnosa Medis</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" name="dx_medis">
                                                            <option value="">---Diagnosa Medis---</option>
                                                            <?php
                                                            $sql_dx = mysqli_query($host, "SELECT * FROM dx_medis ORDER BY dx_medis ASC");
                                                            while($data_status=mysqli_fetch_array($sql_dx)){
                                                            ?>
                                                            <option value="<?= $data_status['id']?>"><?= $data_status['dx_medis']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="tambah_data">Tambah Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    
<?php
if(isset($_POST['nrm'])){
    $nama       = $_POST['nama'];
    $nrm        = $_POST['nrm'];
    $sex        = $_POST['sex'];
    $agama      = $_POST['agama'];
    $pendidikan = $_POST['pendidikan'];
    $tgl_lahir  = $_POST['tgl_lahir'];
    $wktu_masuk = $_POST['waktu_masuk'];
    $dx_medis   = $_POST['dx_medis'];
    //count px di db
    $sql_nrm    = mysqli_query($host, "SELECT * FROM pasien_db WHERE nrm='$nrm'");
    $count_nrm  = mysqli_num_rows($sql_nrm);
    //count px daftar
    $sql_px     = mysqli_query($host, "SELECT * FROM pasien_daftar WHERE nrm='$nrm'");
    $count_px   = mysqli_num_rows($sql_px);
    if($count_nrm <1){
    $tambah_px  = mysqli_query($host, "INSERT INTO pasien_db SET
                    nama        = '$nama',
                    nrm         = '$nrm',
                    sex         = '$sex',
                    pendidikan  = '$pendidikan',
                    agama       = '$agama',
                    tgl_lahir   = '$tgl_lahir'");
        
    }
    if($count_px <1){
        $daftar = mysqli_query($host, "INSERT INTO pasien_daftar SET
                        nrm         = '$nrm',
                        waktu_masuk = '$wktu_masuk',
                        dx_medis    = '$dx_medis'
                        ");
            echo "<script>document.location=\"$site_url/pasien/daftar.php\"</script>";
    }
}
?>