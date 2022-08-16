<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan1</title>
    <style>
        .kotak {
            width: 30px;
            height: 30px;
            background-color: salmon;
            text-align: center;
            line-height: 30px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <?php
    $angka1 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    $angka2 = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
    ?>

    <?php foreach ($angka1 as $a1) : ?>
        <div class="kotak"><?= $a1; ?></div>

    <?php endforeach ?>
    <div class="clear"></div>
    <br>

    <?php echo $angka2[1][2]; ?>
    <div class="clear"></div>
    <br>

    <?php foreach ($angka2 as $a2) : ?>
        <?php foreach ($a2 as $b2) : ?>
            <div class="kotak"><?= $b2; ?></div>
        <?php endforeach ?>
        <div class="clear"></div>

    <?php endforeach ?>

</body>

</html>