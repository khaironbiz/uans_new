<?php 
require_once('../auth/koneksi.php');
require_once('../auth/site.php');
$keyword        = $_GET['keyword'];
$sql_anggota    = "SELECT * FROM pasien_db WHERE nama LIKE '%$keyword%' ORDER BY nama ASC LIMIT 5";
$query_anggota  = mysqli_query($host, $sql_anggota);
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NRM</th>
            <th>Jenis Kelamin</td>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $count  = mysqli_num_rows($query_anggota);
        $no=1;
        if($count >0){
            while($data_anggota =mysqli_fetch_array($query_anggota)){
            //agama
            $id_agama   = $data_anggota['agama'];
            $sql_agama  = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_agama'");
            $agama      = mysqli_fetch_array($sql_agama);
            //jenis kelamin
            $id_sex     = $data_anggota['sex'];
            $sql_sex    = mysqli_query($host, "SELECT * FROM db_sub_master WHERE id='$id_sex'");
            $sex        = mysqli_fetch_array($sql_sex);
            ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$data_anggota['nama']?></td>
            <td><?=$data_anggota['nrm']?></td>
            <td><?=$sex['nama_submaster']?></td>
            <td><?=$data_anggota['tgl_lahir']?></td>
            <td><?=$agama['nama_submaster'] ?></td>
            <td><a href="" class="btn btn-success btn-sm">Pilih</a></td>
        </tr>
        <?php
        $no++;
        }
    }else{
        ?>
        <tr>
            <td colspan="7"> DATA TIDAK DITEMUKAN</td>
            </tr>
        <?php
        }
    ?>
    </tbody>
</table>
