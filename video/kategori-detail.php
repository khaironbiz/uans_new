<?php
$judul = 'Daftar Channel';
include '../layout/header.php';
include '../layout/menu.php';
if (isset($_GET['id'])) {
    $has = $_GET['id'];
    $sql_kategori = "SELECT * FROM video_kategori WHERE has_video_kategori='$has'";
    $kategori = mysqli_query($host, $sql_kategori);
    $data_kategori = mysqli_fetch_array($kategori);
    $id_video_kategori = $data_kategori['id_video_kategori'];
}
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2><?= $data_kategori['video_kategori'] ?></h2>
                <p>Kumpulan Video Kategori <?= $data_kategori[
                    'video_kategori'
                ] ?></p>
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
                Add Video
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Video</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                <div class="modal-body">
                                    
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?= $data_kategori[
                                                'video_kategori'
                                            ] ?>" readonly>
                                            <input type="text" class="form-control" name="id_video_kategori" value="<?= $data_kategori[
                                                'id_video_kategori'
                                            ] ?>"  readonly>
                                            <input type="text" class="form-control" name="has_video_kategori" value="<?= $data_kategori[
                                                'has_video_kategori'
                                            ] ?>"  readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Channel</label>
                                        <div class="col-sm-8">
                                            <select class="form-select" name="id_video_channel" required>
                                                <option value="">---Pilih Channel---</option>
                                                <?php
                                                $cari_channel =
                                                    'SELECT * FROM video_channel ORDER BY video_channel';
                                                $query_kat = mysqli_query($host,$cari_channel);
                                                while ($data_kat = mysqli_fetch_array($query_kat)) { ?>
                                                <option value="<?= $data_kat[
                                                    'id_video_channel'
                                                ] ?>"><?= $data_kat['video_channel'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Judul Video</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="video_judul" required>
                                        </div>
                                    </div> 
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">Deskripsi</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="4" name="video_deskripsi" required></textarea>
                                        </div>
                                    </div>   
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label">URL Video</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="url_video" required>
                                        </div>
                                    </div>    
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            <form>
                                <?php if (isset($_POST['id_video_channel'])) {
                                    $has_video_kategori =
                                        $_POST['has_video_kategori'];
                                    $id_video_channel =
                                        $_POST['id_video_channel'];
                                    $id_video_kategori =
                                        $_POST['id_video_kategori'];
                                    $video_judul = $_POST['video_judul'];
                                    $video_deskripsi =
                                        $_POST['video_deskripsi'];
                                    $url_video = $_POST['url_video'];
                                    $time = date('Y-m-d H:i:s');
                                    $has_video = md5(uniqid());
                                    $sql_url = "SELECT * FROM video WHERE url_video ='$url_video'";
                                    $validasi_url = mysqli_query(
                                        $host,
                                        $sql_url
                                    );
                                    $count_url = mysqli_num_rows($validasi_url);
                                    if ($count_url < 1) {
                                        $sql_input = "INSERT INTO video SET 
                                                            id_video_channel    ='$id_video_channel',
                                                            id_video_kategori   ='$id_video_kategori',
                                                            video_judul         ='$video_judul',
                                                            video_deskripsi     ='$video_deskripsi',
                                                            url_video           ='$url_video',
                                                            date_create         ='$time',
                                                            create_by           ='$user_check',
                                                            has_video           ='$has_video'";
                                        $tambah_data = mysqli_query(
                                            $host,
                                            $sql_input
                                        );
                                        if ($tambah_data) {
                                            echo "<script>document.location=\"kategori-detail.php?id=$has_video_kategori\"</script>";
                                        }
                                    } else {
                                        echo "<script> alert(\"Data menambahkan data\");
                                            </script>";
                                        echo "<script>document.location=\"channel.php\"</script>";
                                    }
                                } ?>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-2 " id="container">
                    <table class="table table-bordered text-white">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Channel</th>
                                <th>Kategori</th>
                                <th>HIT</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $batas = 10;
                            $halaman = isset($_GET['halaman'])
                                ? (int) $_GET['halaman']
                                : 1;
                            $halaman_awal =
                                $halaman > 1 ? $halaman * $batas - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query(
                                $host,
                                "SELECT * FROM video WHERE id_video_kategori='$id_video_kategori'"
                            );
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_channel = mysqli_query(
                                $host,
                                "SELECT * FROM video  
                                JOIN video_kategori on video.id_video_kategori=video_kategori.id_video_kategori
                                JOIN video_channel on video.id_video_channel=video_channel.id_video_channel
                                WHERE video.id_video_kategori='$id_video_kategori'
                                ORDER BY video.id_video limit $halaman_awal, $batas"
                            );
                            $nomor = $halaman_awal + 1;
                            while ($d = mysqli_fetch_array($data_channel)) { ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?= $d['video_judul'] ?></td>
                                    <td><?= $d['video_channel'] ?></td>
                                    <td><?= $d['video_kategori'] ?></td>
                                    <td><?= $d['hit'] ?></td>

                                    <td>
                                        <a class="btn btn-success btn-sm" href="detail.php?id=<?= $d[
                                            'has_video'
                                        ] ?>" role="button">Detail</a>
                                        
                                    </td>
                                </tr>
                                <?php }
                            ?>
                        </tbody>
                    </table>
                    <?php if ($total_halaman > $batas) { ?>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" <?php if ($halaman > 1) {
                                    echo "href='?halaman=$previous'";
                                } ?>>Previous</a>
                            </li>
                            <?php for ($x = 1; $x <= $total_halaman; $x++) { ?> 
                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x; ?>"><?php echo $x; ?></a></li>
                                <?php } ?>				
                            <li class="page-item">
                                <a  class="page-link" <?php if (
                                    $halaman < $total_halaman
                                ) {
                                    echo "href='?halaman=$next'";
                                } ?>>Next</a>
                            </li>
                        </ul>
                    </nav>
                    <?php } ?>
                </div>
                <script src="../assets/js/script.js"></script>
            </div>
        </div>
    </div>
    
</section>
<?php include '../layout/footer.php';
?>
