<?php
$judul = 'About Us';
include '../layout/header.php';
include '../layout/menu.php';
?>
<section id="event">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="<?= $site_url ?>/assets/img/slide/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="<?= $site_url ?>/assets/img/slide/2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="<?= $site_url ?>/assets/img/slide/3.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <h2>TENTANG KAMI</h2>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <h3>Sejarah Singkat</h3>
                <p align="justify">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut dolores temporibus blanditiis sunt eius praesentium at dolorum ut explicabo fugit similique veniam provident vitae ipsum, quo, architecto dolor quam, cumque distinctio! Dolorum odit ipsam perferendis mollitia magni qui labore ducimus eaque, dolorem asperiores! Eum veritatis at ipsa praesentium! Magnam totam harum quasi, odio porro modi! Distinctio quos reprehenderit voluptatum explicabo sed odit deleniti et architecto ipsa natus dicta consectetur possimus ratione blanditiis quam expedita voluptate voluptatibus maiores cumque, officia labore laudantium dolorem? Neque animi praesentium, unde doloribus, id explicabo eligendi vitae quae ratione saepe dolorum dolore quas cum, exercitationem enim!
                </p>
                <h4>Visi</h4>
                <p>
                   <mark> Menjadi pusat publikasi kegiatan pelatihan tenaga kesehatan di seluruh Indonesia pada tahun 2021 </mark>
                </p>
                <h4>Misi</h4>
                <ul>
                    <li>Meningkatkan jejaring media sosial </li>
                    <li>Meningkatkan optimalisasi website </li>
                    <li>Meningkatkan kerja sama dengan lintas sektoral </li>

                </ul>
                <h4>Struk Organisasi</h4>
                <table>
                    <tr>
                        <td>Komisaris</td>
                        <td>:</td>
                        <td>Khairon, S.Kep., Ners</td>
                    </tr>
                    <tr>
                        <td>Direktur Utama</td>
                        <td>:</td>
                        <td>Jusnawati, S.Kom</td>
                    </tr>
                    <tr>
                        <td>Direktur Keuangan</td>
                        <td>:</td>
                        <td>Fadhli</td>
                    </tr>
                    <tr>
                        <td>Direktur Operasional</td>
                        <td>:</td>
                        <td>M. Lukman</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</section>
<?php include '../layout/footer.php';
?>
