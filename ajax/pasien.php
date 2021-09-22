<?php 
require_once('../auth/koneksi.php');
$keyword        = $_GET['keyword'];
$sql_anggota    = "SELECT * FROM pasien_db WHERE nama LIKE '%$keyword%' ORDER BY nama ASC LIMIT 5";
$query_anggota  = mysqli_query($host, $sql_anggota);
?>

<table class="table table-bordered">
    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIRA</th>
                            <th>Pendidikan</th>
                        </tr>
                        <?php
                        $count  = mysqli_num_rows($query_anggota);
                        $no=1;
                        if($count >0){
                        while($data_anggota =mysqli_fetch_array($query_anggota)){
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data_anggota['nama']?></td>
                            <td><?=$data_anggota['nrm']?></td>
                            <td><?=$data_anggota['pendidikan']?></td>
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
