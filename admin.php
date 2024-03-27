<?php
session_start();

$_SESSION['adminName'] = 'Admin1';

require_once 'db.php';

$stmt = $conn->query('SELECT COUNT(*) FROM admin');
$adminCount = $stmt->fetchColumn();

if ($adminCount == 0) {

    $pass = password_hash('pass123', PASSWORD_DEFAULT);

    $sql = 'INSERT INTO admin (login, password) VALUES (?,?)';
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(1, $_SESSION["adminName"]);
        $stmt->bindParam(2, $pass);
        $stmt->execute();
    }


}