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

    $nama = strip_tags($post['nama']);
    $jumlah = strip_tags($post['jumlah']);
    $harga = strip_tags($post['harga']);

    // query tambah
    $query = "INSERT INTO barang VALUES(null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi menupdate data
function update_barang($post)
{
    global $koneksi;

    $id_barang = strip_tags($post['id_barang']);
    $nama = strip_tags($post['nama']);
    $jumlah = strip_tags($post['jumlah']);
    $harga = strip_tags($post['harga']);

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

// function mahasiswa
function create_mahasiswa($post)
{
    global $koneksi;

    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $email = strip_tags($post['email']);
    $foto = upload_file();

    // cek upload foto
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES(null, '$nama','$prodi', '$jk', '$telepon', '$email', '$foto')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fugnsi upload file
function upload_file()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // check file yang di upload
    $extensiFileValid = ['jpg', 'jpeg', 'png'];
    $extensiFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    // cek format/extensi file
    if (!in_array($extensiFile, $extensiFileValid)) {
        // pesan gagal
        echo "<script>
    alert('Format File Tidak Valid');
    document.location.href = 'tambah-mahasiswa.php';
    </script>";
        die();
    }

    // cek ukuran file 2mb
    if ($ukuranFile > 2048000) {
        echo "<script>
    alert('Ukuran foto maksimal 2 MB');
    document.location.href = 'tambah-mahasiswa.php';
    </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid() . '.' . $extensiFile;

    // pindahkan ke folder baru
    move_uploaded_file($tmpName, 'assets/' . $namaFileBaru);
    return $namaFileBaru;
}

function update_mahasiswa($post)
{
    global $koneksi;

    $id_mahasiswa = strip_tags($post['id_mahasiswa']);
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $email = strip_tags($post['email']);
    $fotoLama = $post['fotoLama'];

    // cek upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
        // hapus foto lama
        if (file_exists("assets/" . $fotoLama)) {
            unlink("assets/" . $fotoLama);
        }
    }

    // query update
    $query = "UPDATE mahasiswa SET nama = '$nama', prodi = '$prodi', jk = '$jk', 
    telepon = '$telepon', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function delete_mahasiswa($id_mahasiswa)
{
    global $koneksi;

    // ambil foto yang sesuai data yang dipilih
    $foto = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    unlink("assets/" . $foto['foto']);

    // query hapys
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function create_akun($post){
    global $koneksi;

    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // enkripsi pw
    $password = password_hash($password,PASSWORD_DEFAULT);

    $query = "INSERT INTO akun VALUES(null, '$nama','$username','$email','$password','$level')";

    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}

function delete_akun($id_akun)
{
    global $koneksi;

    // query hapus
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi menupdate data
function update_akun($post)
{
    global $koneksi;

    $id_akun = strip_tags($post['id_akun']);
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $password = strip_tags($post['password']);
    $level = strip_tags($post['level']);

    // query update
    $query = "UPDATE akun SET nama ='$nama', username = '$username', email = '$email', 
    password = '$password', level = '$level'
    WHERE id_akun = $id_akun";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}