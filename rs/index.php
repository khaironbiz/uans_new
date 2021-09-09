<?php
$judul  = "Daftar Anggota";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2>DAFTAR RUMAH SAKIT</h2>
                <p>Melihat seluruh rumah sakit yang ada di seluruh Indonesia</p>
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
                                <th>Rumah Sakit</th>
                                <th>Provinsi</th>
                                <th>Kelas</th>
                                <th>Pemilik</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $batas = 50;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
            
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                            
                            $data = mysqli_query($host,"SELECT * FROM rs");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
            
                            $data_pegawai = mysqli_query($host,"SELECT * FROM rs ORDER BY nama_rs limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_pegawai)){
                                ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?= $d['nama_rs']; ?></td>
                                    <td><?= $d['wilayah']; ?></td>
                                    <td><?= $d['kelas']; ?></td>
                                    <td><?= $d['pemilik']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
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
                </div>
                <script src="../assets/js/script-rs.js"></script>
            </div>
        </div>
    </div>
    
</section>
<?php
include('../layout/footer.php');
?>