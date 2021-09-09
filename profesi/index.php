<?php
$judul  = "Daftar Profesi Kesehatan";
include("../layout/header.php");
include("../layout/menu.php");
?>

<section id="event">
    <div class="container-fluid">
        <div class="row text-white">
            <div class="col text-center ">
                <h2>DAFTAR PROFESI KESEHATAN DI INDONESIA</h2>
                <p>Melihat seluruh profesi tenaga kesehatan dari sisi admin</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary btn-sm" href="http://ppni.rspon.net/profesi/add" role="button">Tambah Profesi</a>
                <div class="table-responsive">
                    <table class="table table-responsive text-white" style="font-size: smaller;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Profesi</th>
                                <th scope="col">Organisasi Profesi</th>
                                <th scope="col">Ketua OP</th>
                                <th scope="col">Website</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                                                            <tr>
                                    <th scope="row">1</th>
                                    <td>Perawat</td>
                                    <td>Persatuan Perawat Nasional Indonesia (PPNI)</td>
                                    <td>DR. Ns. Harif Fadilah, S.Kep., M.Kep., MH</td>
                                    <td>www.ppni.or.id</td>
                                    <td>dppppni@gmail.com</td>
                                    <td><a class="btn btn-success btn-sm" href="http://ppni.rspon.net/profesi/detail/d9a6132e8eabbf370640a449abee0d97" role="button">Detail</a></td>
                                </tr>
                                                            <tr>
                                    <th scope="row">2</th>
                                    <td>Fisioterapi</td>
                                    <td>Ikatan Fisioterapi Indonesia (IFI)</td>
                                    <td>Moh. Ali Imron, SMPh, S.Sos, M.Fis</td>
                                    <td>https://www.ifi.or.id</td>
                                    <td>pp_ifi@yahoo.co.id</td>
                                    <td><a class="btn btn-success btn-sm" href="http://ppni.rspon.net/profesi/detail/98742638cb5243b42ea7586d0d49e276" role="button">Detail</a></td>
                                </tr>
                                                            <tr>
                                    <th scope="row">3</th>
                                    <td>Dokter</td>
                                    <td>Ikatan Dokter Indonesia (IDI)</td>
                                    <td>dr. Daeng M. Faqih, SH, MH</td>
                                    <td>http://www.idionline.org/</td>
                                    <td>pbidi@idionline.org</td>
                                    <td><a class="btn btn-success btn-sm" href="http://ppni.rspon.net/profesi/detail/6f78ee1466fff4b7109f4f319124a044" role="button">Detail</a></td>
                                </tr>
                                                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffff" fill-opacity="1" d="M0,192L48,213.3C96,235,192,277,288,250.7C384,224,480,128,576,117.3C672,107,768,181,864,176C960,171,1056,85,1152,69.3C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
</section>

<?php
include("../layout/footer.php");
?>