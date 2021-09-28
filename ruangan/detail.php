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
                    <div class="col-md-6">
                        <div class="table-responsive mt-2 " id="container">
                            <h3><?= $ruangan['ruangan']?></h3>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-kamar">
                                                    Add Kamar
                            </button>
                            <form action="" method="POST">
                                <!-- Modal -->
                                <div class="modal fade" id="add-kamar" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label">Nama Ruangan</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" required name="id_ruangan">
                                                            <option value="<?= $ruangan['id']?>"><?= $ruangan['ruangan']?></option>
                                                            </select>    
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label">Nomor Kamar</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="no_kamar">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label">Nama Kamar</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" name="has_ruangan" value="<?= $ruangan['has_ruangan']?>">
                                                        <input type="text" class="form-control" name="nama_kamar">
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
                                                            <option value="<?= $data_kelas['id']?>"><?= $data_kelas['nama_submaster']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Tambah Kamar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Kamar</th>
                                        <th>Bed</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
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
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $d['no_kamar']; ?></td>
                                            <td></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-bed<?= $d['no_kamar']; ?>">
                                                    Add Bed
                                                </button>
                                                <form action="" method="POST">
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="add-bed<?= $d['no_kamar']; ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bed</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-4 col-form-label">Nama Ruangan</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select" required name="id_ruangan">
                                                                                <option value="<?= $ruangan['id']?>"><?= $ruangan['ruangan']?></option>
                                                                            </select>    
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-4 col-form-label">Nomor Kamar</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select" required name="id_kamar">
                                                                                <option value="<?= $d['id_kamar']?>"><?= $d['no_kamar']?></option>
                                                                            </select>  
                                                                            <input type="hidden" class="form-control" name="has_ruangan" value="<?= $ruangan['has_ruangan']?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-4 col-form-label">Bed</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select" required name="nama_bed">
                                                                                
                                                                                <option value="">---pilih bed---</option>
                                                                                <option value="a">Bed A</option>
                                                                                <option value="b">Bed B</option>
                                                                                <option value="c">Bed C</option>
                                                                                <option value="d">Bed D</option>
                                                                                <option value="e">Bed E</option>
                                                                            </select> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="tambah_kamar">Tambah Kamar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <?php
                                            $id_kamar = $d['id_kamar'];
                                            $sql_bed  = mysqli_query($host, "SELECT * FROM ruangan_kamar_bed WHERE id_kamar='$id_kamar'");
                                            while($k=mysqli_fetch_array($sql_bed)){
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><?=$k['nama_bed']?></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tr>
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
if(isset($_POST['id_kamar'])){
    $id_kamar       = $_POST['id_kamar'];
    $id_ruangan     = $_POST['id_ruangan'];
    $nama_bed       = $_POST['nama_bed'];
    $has_ruangan    = $_POST['has_ruangan'];
    $created_at     = date('Y-m-d H:i:s');
    $has_kamar_bed  = md5(uniqid());
    $tambah_bed     = mysqli_query($host, "INSERT INTO ruangan_kamar_bed SET 
                            id_kamar        = '$id_kamar',
                            id_ruangan      = '$id_ruangan',
                            nama_bed        = '$nama_bed',
                            created_by      = '$user_check',
                            created_at      = '$created_at',
                            has_kamar_bed   = '$has_kamar_bed'");
    echo "<script>document.location=\"$site_url/ruangan/detail.php?id=$has_ruangan\"</script>";                        
}
if(isset($_POST['no_kamar'])){
    $id_ruangan         = $_POST['id_ruangan'];
    $no_kamar           = $_POST['no_kamar'];
    $nama_kamar         = $_POST['nama_kamar'];
    $id_kelas_perawatan = $_POST['id_kelas_perawatan'];
    $created_at         = date('Y-m-d H:i:s');
    $has_ruangan_kamar  = md5(uniqid());
    $has_ruangan        = $_POST['has_ruangan'];
    $input_kamar        = mysqli_query($host,"INSERT INTO ruangan_kamar SET
                                id_ruangan              = '$id_ruangan',
                                no_kamar                = '$no_kamar',
                                nama_kamar              = '$nama_kamar',
                                created_at              = '$created_at',
                                id_kelas_perawatan      = '$id_kelas_perawatan',
                                created_by              = '$user_check',
                                has_ruangan_kamar       = '$has_ruangan_kamar'
                                ");
        echo "<script>document.location=\"$site_url/ruangan/detail.php?id=$has_ruangan\"</script>";
}
include('../layout/footer.php');
?>