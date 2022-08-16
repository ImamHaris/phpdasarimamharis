<?php
$db = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $db;

    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES
                ('','$nama','$nim','$email','$jurusan','$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tdk ada gambar yg diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu')
            </script>";
        return false;
    }

    //cek apakah yang diupload gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    //jika tidak termasuk dalam ekstensi yg valid
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar')
            </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran file terlalu besar')
            </script>";
        return false;
    }

    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lolos, gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $db;

    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($db);
}

function ubah($data)
{
    global $db;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $gambarLama =  htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
                nim = '$nim',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id

                ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE
    nama LIKE '%$keyword%' OR
    nim LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'
    ";
    return query($query);
}
