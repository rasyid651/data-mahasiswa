<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Login dulu dong');
    document.location.href = 'login.php';
    </script>";
}

// membatasi halaman sesuai user
if ($_SESSION['level'] != 1 and $_SESSION['level'] != 3){
    echo "<script>
    alert('Perhatian anda tidak punya hak akses!');
    document.location.href = 'akun.php';
    </script>";
}

$title = "Daftar Pegawai";
include 'layout/header.php';

$data_pegawai = select("SELECT * FROM pegawai ORDER BY id_pegawai DESC");
?>

<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
    <h1> <i class="fa fa-list-ul" style="font-size: 36px;"></i> Data Pegawai</h1>
    <hr>
    

    <table  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody id="live-data">
        </tbody>
    </table>
</div>
</section>
</div>

<script>
   $(document).ready(function () {
    getPegawai();
    setInterval(getPegawai, 2000);
    });

    function getPegawai(){
        $.ajax({
            url: "realtime-pegawai.php",
            type: "GET",
            success: function(response){
                $('#live-data').html(response)
            }
        });
    }
</script>

<?php include 'layout/footer.php' ?>