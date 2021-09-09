<?php
$judul = 'Registrasi Anggota';
include '../layout/header.php';
?>

<section id="event">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col">
                <h2>Registrasi Member</h2>
                <p>Pastikan data yang anda masukkan sesuai, kami berkomitmen untuk menjaga kerahasiaan data anda</p>
            </div>
        </div>
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">No KTP</label>
                            <input type="number" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Nama Asli</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">HP / Whatsapp</label>
                            <input type="number" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Provinsi</label>
                            <script type="text/javascript" src="ajax_kota.js"></script>
                            <select name="prop" id="prop" onchange="ajaxkota(this.value)" class="form-select" required>
                                <option value="">--Pilih Provinsi--</option>
                                <?php
                                $sql_prov = mysqli_query(
                                    $host,
                                    'SELECT * FROM id_desa where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama'
                                );
                                while (
                                    $dataProvinsi = mysqli_fetch_array(
                                        $sql_prov
                                    )
                                ) {
                                    echo '<option value="' .
                                        $dataProvinsi['lokasi_propinsi'] .
                                        '">' .
                                        $dataProvinsi['lokasi_nama'] .
                                        '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kabupaten / Kota</label>
                            <select name="kota" id="kota" onchange="ajaxkec(this.value)" class="form-select" required>
                                <option value="">--pilih--</option>
                            </select>
                            
                            
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Desa / Kelurahan</label>
                            <select id="inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                            </select>
                        </div>                        
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Jalan</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        
                        <div class="col-12">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>


<?php include '../layout/footer.php';

?>
