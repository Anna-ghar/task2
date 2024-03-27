<?php

require_once 'db.php';

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE login = :login";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':login' => $login));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $adminPassword = $row['password'];
        if (password_verify($password,$adminPassword)) {
            header("Location: index.php");
        }
    }

}
