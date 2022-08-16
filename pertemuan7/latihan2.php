<?php
if (
    !isset($_GET["nama"]) ||
    !isset($_GET["nim"]) ||
    !isset($_GET["jurusan"]) ||
    !isset($_GET["foto"])
) {
    header("Location: latihan1.php");
    exit;
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>

<body>
    <h1>Detail Mahasiswa</h1>

    <ul>
        <li><img src="img/<?= $_GET["foto"]; ?>"></li>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["nim"]; ?></li>
        <li><?= $_GET["jurusan"]; ?></li>
    </ul>

    <a href="latihan1.php">Kembali</a>

</body>

</html>