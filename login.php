<?php
session_start();

$users = [
    'username' => 'user13',
    'password' => 'FLORET'
];

$admins = [
    'username' => 'admin13',
    'password' => 'BERRIESSS'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === $users['username'] && $password === $users['password']) {
        header("Location: user_page.php");
        exit();
    } elseif ($username === $admins['username'] && $password === $admins['password']) {
        header("Location: admin_page.php");
        exit();
    } else {
        header("Location: lostPAGE.php");
        exit();
    }
}
?>
