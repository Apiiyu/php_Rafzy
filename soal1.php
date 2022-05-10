<?php
error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['submit'])) {
    $rowTotal = $_POST['rowTotal'];
    $columnTotal = $_POST['columnTotal'];

    $data = $_POST['value'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafi Khoirulloh - Soal 1</title>
    <link rel="stylesheet" href="resource/css/styles.css">
</head>

<body>

    <section id="form">
        <div class="container">
            <form action="soal1.php" method="post">
                <?php if (!$rowTotal && !$columnTotal) : ?>
                    <div class="d-flex">
                        <label for="rowTotal">Inputkan Jumlah Baris :</label>
                        <input id="rowTotal" type="number" name="rowTotal">
                    </div>

                    <div class="d-flex" style="display: flex; margin-top: 1rem; justify-content: center; align-items: center;">
                        <label for="columnTotal">Inputkan Jumlah Kolom :</label>
                        <input id="columnTotal" type="number" name="columnTotal">
                    </div>
                <?php else : ?>
                    <?php for ($indexRow = 1; $indexRow <= $rowTotal; $indexRow++) : ?>
                        <div class="d-flex output" style="margin-top: 1rem;">
                            <?php for ($indexColumn = 1; $indexColumn <= $columnTotal; $indexColumn++) : ?>
                                <label for="value"><?= $indexRow ?> . <?= $indexColumn ?></label>
                                <input id="value" type="text" name="value[<?= $indexRow ?>][<?= $indexColumn ?>]">
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>

                <center>
                    <button class="btn-submit" type="submit" name="submit">Submit</button>
                </center>
            </form>
        </div>
    </section>

    <section id="output">
        <div class="container">
            <center>
                <?php if (isset($data) && is_array($data)) : ?>
                    <?php foreach ($data as $firstIndex => $items) : ?>
                        <?php foreach ($items as $secondIndex => $item) : ?>
                            <b><?= $firstIndex ?>.<?= $secondIndex ?> : <?= $item ?></b> <br>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </center>
        </div>
    </section>

    <script src="resource/js/script.js"></script>
</body>

</html>