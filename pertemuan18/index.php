<?php

//cek session
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

//pagination
$jumlahDataPerHalaman = 2;

//menentukkan banyak data
$jumlahData = count(query("SELECT * FROM mahasiswa"));

//menentukkan banyak halaman
$jumlahHalaman =  $jumlahData / $jumlahDataPerHalaman;

//Bulatkan jumlah halaman keatas
$jumlahHalaman = ceil($jumlahHalaman);

//halaman aktif
if (isset($_GET['halaman'])) {
    $halamanAktif = $_GET['halaman'];
} else {
    $halamanAktif = 1;
}

//menentukan awal indeks tiap halaman
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT *FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

// if (!$result) {
//     echo mysqli_error($db);
// }

// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN</title>
</head>

<body>
    <a href="logout.php">logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>


    <!--navigasi pagination-->

    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i ?>"><?= $i; ?></a>
        <?php endif; ?>

    <?php endfor; ?>

    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>

    <br>


    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?= $no++; ?>
        <?php endforeach ?>

    </table>

</body>

</html>