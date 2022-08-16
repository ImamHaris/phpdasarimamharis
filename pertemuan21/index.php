<?php

//cek session
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$mahasiswa = query("SELECT *FROM mahasiswa");

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

    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 120px;
            left: 180;
            z-index: -1;
            display: none;
        }

        @media print {

            .logout,
            .tambah,
            .form-cari,
            .aksi {
                display: none;
            }
        }
    </style>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <a href="logout.php" class="logout">logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="tambah">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post" class="form-cari">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian..." autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/loader.gif" class="loader">
    </form>
    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="aksi">Aksi</th>
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
                    <td class="aksi">
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
    </div>
</body>

</html>