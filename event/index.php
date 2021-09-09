<?php
$judul  = "Home";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-center text-white">
            <div class="col">
                <h2>Event Mendatang</h2>
                <p>Pilih dan catat tanggalnya acara yang kamu suka kemuan pesan</p>
            </div>
        </div>
        <div class="row">
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
                <?php
                    $x=1;
                    while($x<=10){
                    ?>
                <div class="col">
                    <div class="card h-100">
                        <a href="<?=$site_url;?>/event/detail.php"><img src="../assets/img/event/2.jpg" class="card-img-top" alt="..."></a>
                        <div class="card-header text-center">
                            <span style="font-size: 0.7rem; color: Tomato;">
                                <i class="bi bi-calendar-minus-fill"></i> 20-03-2021
                                <i class="bi bi-people-fill"></i> 200
                                <i class="fas fa-file"> 3 SKP</i>
                            </span>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Webinar</h6>
                            <p class="card-text" style="font-size: 11px;">Webinar Tatalaksana Vaksinasi Covid-19 Bagi Perawat</p>
                        </div>
                    </div>
                </div>
                <?php
                $x++;
                    }
                    ?>
            </div>
            
        </div>
</section>
<?php
include('../layout/footer.php');

?>