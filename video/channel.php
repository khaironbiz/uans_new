<?php
$judul  = "Daftar Channel";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2>DAFTAR CHANNEL YOUTUBE</h2>
                <p>Melihat seluruh channel Youtube</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2"> 
                <input type="text" class="form-control" name="keyword" id="keyword" placeholder="KeyWord" autofocus autocomplete="off">
            </div>
        <div>
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Channel
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Channel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Nama Channel</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="video_channel">
                                        </div>
                                    </div>  
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Pemilik Channel</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="pemilik_channel">
                                        </div>
                                    </div>    
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">URL Channel</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="url_youtube">
                                        </div>
                                    </div>    
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            <form>
                                <?php
                                if(isset($_POST['video_channel'])){
                                    $video_channel      = $_POST['video_channel'];
                                    $pemilik_channel    = $_POST['pemilik_channel'];
                                    $url_youtube        = $_POST['url_youtube'];
                                    $time               = date('Y-m-d H:i:s');
                                    $has_video_channel  = md5(uniqid());
                                    $sql_url            = "SELECT * FROM video_channel 
                                                            WHERE url_youtube ='$url_youtube'";
                                    $validasi_url       = mysqli_query($host,$sql_url);
                                    $count_url          = mysqli_num_rows($validasi_url);
                                    if($count_url<1){
                                        $sql_channel    = "INSERT INTO video_channel SET 
                                                            video_channel       ='$video_channel',
                                                            pemilik_channel     ='$pemilik_channel',
                                                            url_youtube         ='$url_youtube',
                                                            date_create         ='$time',
                                                            create_by           ='$user_check',
                                                            has_video_channel   ='$has_video_channel'";
                                        $tambah_data    = mysqli_query($host,$sql_channel);
                                        if($tambah_data){
                                        echo "<script>document.location=\"channel.php\"</script>";
                                        }
                                    }else{
                                            echo "<script> alert(\"Data menambahkan data\");
                                            </script>";
                                            echo "<script>document.location=\"channel.php\"</script>";
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
                                <th>Nama Channel</th>
                                <th>Pemilik Channel</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $batas = 10;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
            
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
                            
                            $data = mysqli_query($host,"SELECT * FROM video_channel ORDER BY video_channel");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
            
                            $data_channel = mysqli_query($host,"SELECT * FROM video_channel  ORDER BY video_channel limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_channel)){
                                ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?= $d['video_channel']; ?></td>
                                    <td><?= $d['pemilik_channel']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="channel-detail.php?id=<?= $d['has_video_channel']?>" role="button">Detail</a>
                                        <a class="btn btn-warning btn-sm" href="<?= $d['url_youtube']; ?>" role="button" target=_blank>View</a>
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