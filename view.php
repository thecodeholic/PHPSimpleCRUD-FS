<?php
require_once 'users/users.php';
require_once 'partials/header.php';

$userId = $_GET['id'];
$user = getUserById($userId);

echo '<pre>';
var_dump($user);
echo '</pre>';
?>

<div class="container">
    <!--    Draw user details here-->
</div>

<?php require_once 'partials/footer.php'; ?>
