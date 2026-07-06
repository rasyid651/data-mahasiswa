<?php

// fungsi menampilkan data 
function select($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data
function create_barang($post)
{
    global $koneksi;

    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    // query tambah
    $query = "INSERT INTO barang VALUES(null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi menupdate data
function update_barang($post)
{
    global $koneksi;

    $id_barang = $post['id_barang'];
    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    // query update
    $query = "UPDATE barang SET nama ='$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function delete_barang($id_barang)
{
    global $koneksi;

    // query hapus
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
