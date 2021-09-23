<?php
$judul  = "Data Base Pasien";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2>DATA BASE PASIEN </h2>
                <p>Melihat seluruh data pasien</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2"> 
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="KeyWord" autofocus autocomplete="off">
            </div>
            
            
        <div>
        <div class="row justify-content-center"> 
            <div class="col-md-12">
                <div class="table-responsive mt-2 " id="container">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NRM</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $batas = 50;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
            
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                            
                            $data = mysqli_query($host,"select * from pasien_db");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
            
                            $data_pegawai = mysqli_query($host,"select * from pasien_db order by nama limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_pegawai)){
                                //agama
                                $id_agama   = $d['agama'];
                                $sql_agama  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
                                $agama      = mysqli_fetch_array($sql_agama);
                                //jenis kelamin
                                $id_sex     = $d['sex'];
                                $sql_sex    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_sex'");
                                $sex        = mysqli_fetch_array($sql_sex);

                                ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['nrm']; ?></td>
                                    <td><?= $sex['nama_submaster']; ?></td>
                                    <td><?= $d['tgl_lahir']; ?></td>
                                    <td><?= $agama['nama_submaster']; ?></td>
                                    <td><a class="btn btn-success btn-sm" href="#">Daftar</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
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
                    </table>
                    <?php
                    if($jumlah_data > $batas){
                    ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                            </li>
                            <?php 
                            for($x=1;$x<=$total_halaman;$x++){
                                ?> 
                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                <?php
                            }
                            ?>				
                            <li class="page-item">
                                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                            </li>
                        </ul>
                    </nav>
                    <?php
                    }
                    ?>
                </div>
                <script src="../assets/js/script-pasien.js"></script>
            </div>
        </div>
    </div>
    
</section>
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
    $sql_nrm    = mysqli_query($host, "SELECT * FROM pasien_db WHERE nrm='$nrm'");
    $count_nrm  = mysqli_num_rows($sql_nrm);
    if($count_nrm <1){
    $tambah_px  = mysqli_query($host, "INSERT INTO pasien_db SET
                    nama        = '$nama',
                    nrm         = '$nrm',
                    sex         = '$sex',
                    pendidikan  = '$pendidikan',
                    agama       = '$agama',
                    tgl_lahir   = '$tgl_lahir'");
        if($tambah_px){
            $daftar = mysqli_query($host, "INSERT INTO pasien_daftar SET
                        nrm         = '$nrm',
                        waktu_masuk = '$wktu_masuk',
                        dx_medis    = '$dx_medis'
                        ");
            echo "<script>document.location=\"$site_url/pasien/data-base.php\"</script>";
        }
    }
}
include('../layout/footer.php');
?>