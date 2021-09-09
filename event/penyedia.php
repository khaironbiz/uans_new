<?php
$judul  = "Penyedia Event";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2>DAFTAR PENYEDIA EVENT</h2>
                <p>Melihat seluruh penyedia yang terdaftar</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2"> 
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="KeyWord" autofocus autocomplete="off">
            </div>
        <div>
        <div class="row justify-content-center"> 
            <div class="col-md-12">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Penyedia
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Penyedia</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Nama Penyedia</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="event_penyedia">
                                        </div>
                                    </div>  
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Pemilik</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="pemilik">
                                        </div>
                                    </div>  
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>  
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">HP</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="hp">
                                        </div>
                                    </div>    
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Website</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="web">
                                        </div>
                                    </div>    
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            <form>
                                <?php
                                if(isset($_POST['event_penyedia'])){
                                    $event_penyedia     = $_POST['event_penyedia'];
                                    $pemilik            = $_POST['pemilik'];
                                    $hp                 = $_POST['hp'];
                                    $email              = $_POST['email'];
                                    $web                = $_POST['web'];
                                    $time               = date('Y-m-d H:i:s');
                                    $has_event_penyedia = md5(uniqid());
                                    $sql_url            = "SELECT * FROM event_penyedia 
                                                            WHERE email ='$email'";
                                    $validasi_url       = mysqli_query($host,$sql_url);
                                    $count_url          = mysqli_num_rows($validasi_url);
                                    if($count_url<1){
                                        $sql_channel    = "INSERT INTO event_penyedia SET 
                                                            event_penyedia      ='$event_penyedia',
                                                            pemilik             ='$pemilik',
                                                            hp                  ='$hp',
                                                            email               ='$email',
                                                            web                 ='$web',
                                                            date_create         ='$time',
                                                            create_by           ='$user_check',
                                                            has_event_penyedia  ='$has_event_penyedia'";
                                        $tambah_data    = mysqli_query($host,$sql_channel);
                                        if($tambah_data){
                                        echo "<script>document.location=\"penyedia.php\"</script>";
                                        }
                                    }else{
                                            echo "<script> alert(\"Data menambahkan data\");
                                            </script>";
                                            echo "<script>document.location=\"penyedia.php\"</script>";
                                        }
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-2 " id="container">
                    <table class="table table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Penyedia</th>
                                <th>Pemilik</th>
                                <th>Email</th>
                                <th>HP</th>
                                <th>Web</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $batas = 10;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
            
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                            
                            $data = mysqli_query($host,"SELECT * FROM event_penyedia");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
            
                            $data_channel = mysqli_query($host,"SELECT * FROM event_penyedia  ORDER BY event_penyedia limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_channel)){
                                ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?= $d['event_penyedia']; ?></td>
                                    <td><?= $d['pemilik']; ?></td>
                                    <td><?= $d['hp']; ?></td>
                                    <td><?= $d['email']; ?></td>
                                    <td><?= $d['web']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="channel-detail.php?id=<?= $d['has_video_channel']?>" role="button">Detail</a>
                                        
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    
                    if($total_halaman>$batas){
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
                <script src="../assets/js/script.js"></script>
            </div>
        </div>
    </div>
    
</section>
<?php
include('../layout/footer.php');
?>