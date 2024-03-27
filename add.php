<?php
require_once 'db.php';

if (!empty($_POST['name']) && !empty($_POST['content']) && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $content = $_POST['content'];
    $date = date('Y-m-d H:m:s');

    $sql = 'INSERT INTO articles (name, content, date) VALUES (?,?,?)';
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $content);
        $stmt->bindParam(3, $date);
        $stmt->execute();

        header('Location: index.php');
    }
}