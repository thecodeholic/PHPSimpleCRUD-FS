<?php

require_once 'users/users.php';

require_once 'partials/header.php';

// Create empty $user variable for _form.php
$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];
?>

<div class="container">
    <?php require __DIR__ . "/_form.php" ?>
</div>

<?php require_once 'partials/footer.php'; ?>
