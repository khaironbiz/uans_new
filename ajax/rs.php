<?php 
require_once('../auth/koneksi.php');
$keyword        = $_GET['keyword'];
$sql_anggota    = "SELECT * FROM rs WHERE nama_rs LIKE '%$keyword%' ORDER BY nama_rs ASC LIMIT 50";
$query_anggota  = mysqli_query($host, $sql_anggota);
?>

<table class="table table-bordered">
    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rumah Sakit</th>
                            <th>Provinsi</th>
                            <th>Kelas</th>
                            <th>Pemilik</th>
                        </tr>
                        <?php
                        $count  = mysqli_num_rows($query_anggota);
                        $no=1;
                        if($count >0){
                        while($data_anggota =mysqli_fetch_array($query_anggota)){
                        ?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $data_anggota['nama_rs']; ?></td>
                            <td><?= $data_anggota['wilayah']?></td>
                            <td><?= $data_anggota['kelas']?></td>
                            <td><?= $data_anggota['pemilik']?></td>
                        </tr>
                        <?php
                        $no++;
                            }
                        }else{
                        ?>
                            <tr>
                            <td colspan="6"> DATA TIDAK DITEMUKAN</td>
                        </tr>
                        <?php
                        }
                        ?>
                    <thead>
</table>
