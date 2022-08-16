<?php

$mahasiswa = [
    [
        "nama" => "Imam Haris",
        "nim" => "14116138",
        "jurusan" => "IF",
        "foto" => "1.png"
    ],
    [
        "nama" => "Syafaat",
        "nim" => "13116138",
        "jurusan" => "EL",
        "foto" => "2.png"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan1</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <a href="latihan2.php?foto=<?= $mhs["foto"] ?>&nama=<?= $mhs["nama"]; ?>
                &nim=<?= $mhs["nim"] ?>&jurusan=<?= $mhs["jurusan"] ?>"><?= $mhs["nama"]; ?></a>
            </li>
        <?php endforeach ?>
    </ul>


</body>

</html>