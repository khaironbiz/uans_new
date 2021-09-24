<?php
session_start();
$user_check=$_SESSION['login_user'];
if(!$user_check){
    echo "<script>document.location=\"$site_url\"</script>";
}
$sql_anggota    = mysqli_query($host, "SELECT * FROM nira WHERE nira='$user_check'");
$anggota        = mysqli_fetch_array($sql_anggota);
?>
<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="http://ppni.rspon.net/assets/img/logo.png" alt="" width="50" class="d-inline-block align-top">
               <?= $nama_web; ?>            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-white fw-bold">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="<?= $site_url?>/event">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="<?= $site_url?>/about">About</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Video
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= $site_url?>/video">List</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/video/kategori.php">Kategori</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/video/channel.php">Channel</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pasien
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= $site_url?>/pasien/data-base.php">Data Base Pasien</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/pasien/daftar.php">Pasien dirawat</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/video/channel.php">Channel</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Event
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= $site_url?>/event">List</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/event/kategori.php">Kategori</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/event/penyedia.php">Penyedia</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/event/event.php">Event</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= $site_url?>/rs">Rumah Sakit</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/profesi">Profesi</a></li>
                            <li><a class="dropdown-item" href="<?= $site_url?>/anggota">Anggota</a></li>
                        </ul>
                    </li>
                    <?php
                        if($user_check !=""){
                        ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= $site_url?>/video"><?= $anggota['nama']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= $site_url?>/auth/logout.php">Logout</a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>