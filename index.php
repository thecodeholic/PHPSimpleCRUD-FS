<?php
require_once __DIR__ . '/users/users.php';

$users = getUsers();

require_once 'partials/header.php';
?>

<!--Generate table-->
<div class="container">
    <br>
    <br>
    <p>
        <a href="create.php" class="btn btn-success">Create</a>
    </p>
    <!--    Draw table here-->
</div>
<!--/Generate table-->
<?php require_once 'partials/footer.php'; ?>

