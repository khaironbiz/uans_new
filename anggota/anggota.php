<?php 
require_once('../layout/header.php');
require_once('../layout/menu.php');
if(!isset($_POST['cari'])){
    $sql_anggota    ="SELECT * FROM nira WHERE blokir='N' ORDER BY nama ASC";
    
}else{
    
    $keyword        = $_POST['keyword'];
    $sql_anggota    ="SELECT * FROM nira WHERE blokir='N' and nama LIKE '%$keyword%' ORDER BY nama ASC";
}

$query_anggota  = mysqli_query($host, $sql_anggota);
?>

    <div class="container mt-5">
        <div class="card mt-5">
            <div class="card-header bg-black">
                <div class="row justify-content-end">
                    <div class="col-md-10">
                        <h3>Daftar Anggota</h3>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-sm" 
                                name="keyword" id="keyword" placeholder="KeyWord" autofocus autocomplete="off">
                    </div>
                </div>
                
            </div>
            <div class="row">
                
                
            <div>
        </div>
        
        <div class="row">
            <did clas="col-md-12" id="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIRA</th>
                            <th>Email</th>
                            <th>Pendidikan</th>
                            <th>Ruangan</th>
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
                            <td><?=$data_anggota['nira']?></td>
                            <td><?=$data_anggota['email']?></td>
                            <td><?=$data_anggota['pendidikan']?></td>
                            <td><?=$data_anggota['ruangan']?></td>
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
            </div>
            <script src="../js/script.js"></script>
        </div>

    </div>
<?php
require_once('../layout/footer.php');
?>