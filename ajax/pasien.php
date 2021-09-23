<?php 
require_once('../auth/koneksi.php');
require_once('../auth/site.php');
$keyword        = $_GET['keyword'];
$sql_anggota    = "SELECT * FROM pasien_db WHERE nama LIKE '%$keyword%' ORDER BY nama ASC LIMIT 5";
$query_anggota  = mysqli_query($host, $sql_anggota);
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NRM</th>
            <th>Jenis Kelamin</td>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $count  = mysqli_num_rows($query_anggota);
        $no=1;
        if($count >0){
            while($data_anggota =mysqli_fetch_array($query_anggota)){
            //agama
            $id_agama   = $data_anggota['agama'];
            $sql_agama  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
            $agama      = mysqli_fetch_array($sql_agama);
            //jenis kelamin
            $id_sex     = $data_anggota['sex'];
            $sql_sex    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_sex'");
            $sex        = mysqli_fetch_array($sql_sex);
            ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$data_anggota['nama']?></td>
            <td><?=$data_anggota['nrm']?></td>
            <td><?=$sex['nama_submaster']?></td>
            <td><?=$data_anggota['tgl_lahir']?></td>
            <td><?=$agama['nama_submaster'] ?></td>
            <td><a href="" class="btn btn-success btn-sm">Pilih</a></td>
        </tr>
        <?php
        $no++;
        }
    }else{
        ?>
        <tr>
            <td colspan="7"> DATA TIDAK DITEMUKAN</td>
            </tr>
        <?php
        }
    ?>
    <tr>
        <td colspan="7" class="text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pasien</button>
        </td>
    </tr>
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
                                    <input type="text" class="form-control" placeholder="NRM" name="nrm">
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
                                        <option value="<?= $data_dx['id']?>"><?= $data_status['dx_medis']?></option>
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


    </tbody>
</table>
