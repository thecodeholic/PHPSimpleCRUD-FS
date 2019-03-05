<?php

require_once 'users/users.php';

$userId = $_GET['id'];
$user = getUserById($userId);

//echo '<pre>';
//var_dump($user);
//echo '</pre>';

require_once 'partials/header.php';
?>

    <div class="container">
        <!--        Draw your form here-->
    </div>

<?php require_once 'partials/footer.php'; ?>