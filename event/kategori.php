<?php
$judul  = "Kategori Event";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2>KATEGORI EVENT</h2>
                <p>Melihat seluruh Kategori Event</p>
            </div>
        </div>
        
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Kategori
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="event_kategori">
                                        </div>
                                    </div>  
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            <form>
                                <?php
                                if(isset($_POST['event_kategori'])){
                                    $event_kategori     = $_POST['event_kategori'];
                                    $time               = date('Y-m-d H:i:s');
                                    $has_event_kategori = md5(uniqid());
                                    $sql_event_kategori = "SELECT * FROM event_kategori 
                                                            WHERE event_kategori ='$event_kategori'";
                                    $validasi           = mysqli_query($host,$sql_event_kategori);
                                    $count              = mysqli_num_rows($validasi);
                                    if($count<1){
                                        $sql_input      = "INSERT INTO event_kategori SET 
                                                            event_kategori      ='$event_kategori',
                                                            date_create         ='$time',
                                                            create_by           ='$user_check',
                                                            has_event_kategori  ='$has_event_kategori'";
                                        $tambah_data    = mysqli_query($host,$sql_input);
                                        if($tambah_data){
                                        echo "<script>document.location=\"kategori.php\"</script>";
                                        }
                                    }else{
                                            echo "<script> alert(\"Data menambahkan data\");
                                            </script>";
                                            echo "<script>document.location=\"kategori.php\"</script>";
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
                                <th>Kategori</th>
                                <th>Penyedia</th>
                                <th>Event</th>
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
                            
                            $data = mysqli_query($host,"SELECT * FROM event_kategori");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
            
                            $data_channel = mysqli_query($host,"SELECT * FROM event_kategori  
                                            ORDER BY event_kategori 
                                            limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_channel)){
                                ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?= $d['event_kategori']; ?></td>
                                    <td></td>
                                    <td></td>
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
            </div>
        </div>
    </div>
    
</section>
<?php
include('../layout/footer.php');
?>