<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <div class="form1">
        <form action="add.php" method="post">
            <label for="i1">Article title</label><br>
            <input id="i1" name="name" type="text" class="i1" value=""><br>
            <label for="i2">content</label><br>
            <textarea id="i2" name="content" rows="6" cols="70" value=""></textarea><br><br>
            <input type="submit" name="submit" class="submit">
        </form>
        </div>
            <?php
            session_start();
            require_once 'db.php';

            $sql = 'SELECT * FROM articles';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            ?>

        <ul>
            <?php foreach ($rows as $row): ?>
                <div class="article">
                    <li>
                        <h4><?= $row['name'] ?> ---- <?= $_SESSION['adminName'] ?></h4>
                        <p><?= $row['content'] ?></p>
                    </li>
                </div>
            <?php endforeach; ?>
        </ul>



    </body>
</html>
