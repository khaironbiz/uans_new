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
            <div class="col-md-2"> 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Pasien</button>
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
include('../layout/footer.php');
?>