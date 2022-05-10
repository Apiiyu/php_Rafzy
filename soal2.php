<?php
include 'config/function.php';

error_reporting(E_ERROR | E_PARSE);

$queryRelationTable = createRelationshipTable('ALTER TABLE hobi ADD CONSTRAINT FOREIGN KEY(person_id) REFERENCES person(id);');
if ($queryRelationTable) {
    $items = getData('SELECT hobi, COUNT(*) AS total_person FROM hobi GROUP BY hobi');
}

if (isset($_POST['submit'])) {
    $keywords = $_POST['search'];
    if (!$keywords) {
        $items = getData('SELECT hobi, COUNT(*) AS total_person FROM hobi GROUP BY hobi');
    } else {
        $items = searchData("SELECT hobi, COUNT(*) AS total_person FROM hobi WHERE hobi LIKE '%$keywords%'");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafi Khoirulloh - Soal 2</title>
    <link rel="stylesheet" href="resource/css/styles.css">
</head>

<body>
    <section id="table">
        <div class="container">

            <div class="box-heading">
                <h1 class="title">
                    Report data Hobby
                </h1>

                <div class="box-search">
                    <form action="soal2.php" method="post">
                        <input type="text" name="search" placeholder="Search by hobi...">
                        <button type="submit" name="submit">Search</button>
                    </form>
                </div>
            </div>

            <table class="table" border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Hobi</th>
                        <th>Jumlah Person</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($items) && is_array($items)) : ?>
                        <?php foreach ($items as $item) : ?>
                            <?php if ($selectedData && is_array($selectedData)) : ?>
                                <tr>
                                    <td><?= $item['hobi'] ?></td>
                                </tr>
                            <?php endif; ?>
                            <!-- if not selected data -->
                            <tr>
                                <td><?= $item['hobi'] ?></td>
                                <td><?= $item['total_person'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>