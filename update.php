<?php
require_once 'users/users.php';
require_once 'partials/header.php';

if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}

$user = getUserById($_GET['id']);
if (!$user) {
    include "partials/not_found.php";
    exit;
}

?>

<div class="container">
    <?php require __DIR__ . "/_form.php" ?>
</div>

<?php require_once 'partials/footer.php'; ?>
