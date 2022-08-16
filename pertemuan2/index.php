<?php
// komen
/*komen
yang bisa 
banyak
baris
*/

// Pertemuan 2 - PHP Dasar
// Sintaks PHP

// Standar Output
// echo, print 
// echo "Imam Haris"; print "Imam Haris";
// print_r print_r("Imam Haris");
// var_dump var_dump("Imam Haris");

// Penulisan sintaks PHP
// 1. PHP dalam HTML
// 2. HTML Dalam PHP

$nama = "Imam";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>

<body>
    <h1>Hallo, Selamat Datang <?php echo $nama; ?></h1>
    <p><?php echo "ini adalah paragraf"; ?></p>

    <?php echo "<h1>Hallo, Selamat Datang"; ?>
</body>

</html>