<?php
$judul="Kumpulan Video";
include('../layout/header.php');
include('../layout/menu.php');
?>
<section id="event">
    <div class="container-fluid">
        <div class="row text-center text-white">
            <div class="col">
                <h2>Kumpulan Video</h2>
                <p>Berikut beberapa kumpulan video yang wajib dipelajari bagi mahasiswa Informatika untuk membantu proses pembelajaran</p>
            </div>
        </div>
        <div class="row">
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
                <div class="col">
                    <div class="card h-100">
                        <iframe src="https://www.youtube.com/embed/9ed3b0tSRvI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title"><a href="detail.php">Programmer Zaman Now</a></h6>
                            <p class="card-text" style="font-size: 11px;">Belajar Rest API Full</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <iframe src="https://www.youtube.com/embed/92Rjzrq4oIg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title">Programmer Zaman Now</h6>
                            <p class="card-text" style="font-size: 11px;">Belajar HTTP (Bahasa Indonesia)</p>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card h-100">
                        <iframe src="https://www.youtube.com/embed/TaBWhb5SPfc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title">Programmer Zaman Now</h6>
                            <p class="card-text" style="font-size: 11px;">Tutorial PHP Dasar</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <iframe src="https://www.youtube.com/embed/SDROba_M42g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title">Programmer Zaman Now</h6>
                            <p class="card-text" style="font-size: 11px;">Tutorial javascript (Bahasa Indonesia)</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <iframe src="https://www.youtube.com/embed/xYBclb-sYQ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title">Programmer Zaman Now</h6>
                            <p class="card-text" style="font-size: 11px;">Tutorial MYSQL (Bahasa Indonesia)</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <iframe src="https://www.youtube.com/embed/3PMLwe_C-F0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body">
                            <h6 class="card-title">Programmer Zaman Now</h6>
                            <p class="card-text" style="font-size: 11px;">Alur Kerja Pembuatan Aplikasi</p>
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