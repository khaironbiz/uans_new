<?php
$judul  = "Detail Video";
include('../layout/header.php');
include('../layout/menu.php');
$time     = date('Y-m-d H:i:s');
$has_video=$_GET['id'];
$sql_video  = "SELECT * FROM video 
            JOIN video_kategori on video.id_video_kategori=video_kategori.id_video_kategori
            JOIN video_channel on video.id_video_channel=video_channel.id_video_channel
            WHERE video.has_video='$has_video'";
$query_video= mysqli_query($host,$sql_video);
$data_vid   = mysqli_fetch_array($query_video);
$id_video   = $data_vid['id_video'];
$has_video_hit  = md5(uniqid());
$sql_hit_history="INSERT INTO video_hit SET
                    id_video        ='$id_video',
                    date_hit        ='$time',
                    id_perawat      ='$user_check',
                    has_video_hit   ='$has_video_hit'";
$insert_hit = mysqli_query($host,$sql_hit_history);
if($insert_hit){
    $hit_baru   = $data_vid['hit']+1;
    if($hit_baru){
        $sql_update = "UPDATE video SET 
                        hit         ='$hit_baru',
                        date_hit    = '$time'
                        WHERE 
                        has_video   ='$has_video'";
        $update_data=mysqli_query($host,$sql_update);
        }
    }
?>
<section id="event">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col">
                <h2><?= $data_vid['video_judul']?></h2>
                
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col">
                    <div class="card h-100 ">
                        <iframe height="500" src="<?= $data_vid['url_video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title"><?= $data_vid['video_channel']?></h6>
                            <p class="card-text" style="font-size: 11px;"><?= $data_vid['video_judul']?></p>
                            <p><?= $data_vid['video_deskripsi']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffff" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,133.3C384,117,480,139,576,128C672,117,768,75,864,53.3C960,32,1056,32,1152,69.3C1248,107,1344,181,1392,218.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</section>
<?php
include('../layout/footer.php');

?>