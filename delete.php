<?php
include 'partials/header.php';
require __DIR__ . '/users/users.php';


if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}
$userId = $_POST['id'];
deleteUser($userId);

header("Location: index.php");
