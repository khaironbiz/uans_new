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
                                ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['nrm']; ?></td>
                                    <td><?= $d['sex']; ?></td>
                                    <td><?= $d['tgl_lahir']; ?></td>
                                    <td><?= $d['agama']; ?></td>
                                    <td><a class="btn btn-success btn-sm" href="#">Daftar</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
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