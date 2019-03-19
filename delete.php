<?php
require_once 'partials/header.php';

// Check if "id" exists in $_POST and redirect to index.php page if it does not exist
if (!isset($_POST['id'])) {
    include "partials/not_found.php";
    exit;
}

require "users/users.php";

// Uncomment this if you want to see what data comes in $_POST when delete button is clicked in table
/*
echo '<pre>';
var_dump($_POST);
echo '</pre>';
exit;
*/


// At this point we know that id was sent
$userId = $_POST['id'];
$user = getUserById($userId);

deleteUser($userId);

// Check if the user has image delete this image also
if (file_exists(__DIR__."/users/images/$userId.${user['extension']}")){
    unlink(__DIR__."/users/images/$userId.${user['extension']}");
}

header('Location: index.php');

