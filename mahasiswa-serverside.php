<?php
include 'config/database.php';
 
if ($_GET['action'] == "table_data") {
 
    $columns = array(
        0 => 'id_mahasiswa',
        1 => 'nama',
        2 => 'prodi',
        3 => 'jk',
        4 => 'telepon',
        5 => 'id_mahasiswa'
    );
 
    $querycount = $db->query("SELECT count(id_mahasiswa) as jumlah FROM mahasiswa");
    $datacount = $querycount->fetch_array();
 
    $totalData = $datacount['jumlah'];
 
    $totalFiltered = $totalData;
 
    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order = $columns[$_POST['order']['0']['column']];
    $dir = $_POST['order']['0']['dir'];
 
    if (empty($_POST['search']['value'])) {
        $query = $db->query("SELECT id_mahasiswa,nama,prodi,jk,telepon FROM mahasiswa ORDER BY $order $dir LIMIT $limit OFFSET $start");
 
    } else {
        $search = $_POST['search']['value'];
        $query = $db->query("SELECT id_mahasiswa,nama,prodi,jk,telepon FROM mahasiswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%' ORDER BY $order $dir LIMIT $limit OFFSET $start");
 
        $querycount = $db->query("SELECT count(id_mahasiswa) as jumlah FROM mahasiswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%'");
 
        $datacount = $querycount->fetch_array();
        $totalFiltered = $datacount['jumlah'];
    }
 
    $data = array();
    $json_data = [
        "draw"            => intval($_POST['draw']),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
    ];
 
    echo json_encode($json_data);
}
?>

  <?php $no = 1; ?>
            <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mahasiswa["nama"] ?></td>
                    <td><?= $mahasiswa["prodi"] ?></td>
                    <td><?= $mahasiswa["jk"] ?></td>
                    <td><?= $mahasiswa["telepon"] ?></td>
                    <td><?= $mahasiswa["email"] ?></td>

                    <td width="15%" class="text-center">
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-success btn-sm">Ubah</a>
                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus barang?');">Hapus</a>
                    </td>
                </tr>
   <?php endforeach; ?>