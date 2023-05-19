<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
</head>
<body>
    <?php  
        $a = 5;
        $b = 3;
        $c = 10;
        $d = 12;
        $e = 8;
    ?>
    <h3>Keterangan</h3>
    <p style="margin-top:-15px">
        <?= $a  ?> <br>
        <?= $b  ?> <br>
        <?= $c  ?> <br>
        <?= $d  ?> <br>
        <?= $e  ?> <br>
    </p>

    <h3>Soal 1</h3>
    <p style="margin-top:-15px">((<?= $a ?>+<?= $b ?>)/(<?= $c ?>*<?= $d ?>))-<?= $e ?></p>
    <p style="margin-top:-15px">
        <?= (($a+$b)/($c*$d))-$e ?>
    </p>

    <?php
        function sumNum($a, $b) {
            echo "Hasil dari ".$a." + ".$b.": ".$a+$b;
        }

        function subNum($a, $b) {
            echo "Hasil dari ".$a." - ".$b.": ".$a-$b;
        }

        function multiply($a, $b) {
            echo "Hasil dari ".$a." * ".$b.": ".$a*$b;
        }

        function divide($a, $b) {
            echo "Hasil dari ".$a." / ".$b.": ".$a/$b;
        }

        function modulo($a, $b){
            echo "Hasil dari ".$a." % ".$b.": ".$a%$b;
        }
    ?>

    <h3>Soal 2</h3>
    <p style="margin-top: -15px;">
        Penjumlahan dan Pengurangan : <br>
        <?= sumNum($a, $b); ?> <br>
        <?= subNum($b, $c); ?> <br>
    </p>
    <p>
        Perkalian: <br>
        <?= multiply($a, $b); ?> <br>
        <?= multiply($b, $c); ?> <br>
    </p>
    <p>
        Pembagian : <br>
        <?= divide($a, $b); ?> <br>
        <?= divide($b, $c); ?> <br>
    </p>
    <p>
        Modulo : <br>
        <?= modulo($b, $c); ?> <br>
        <?= modulo($a, $b); ?> <br>
        <?= modulo($c, $d); ?> <br>
    </p>
</body>
</html>