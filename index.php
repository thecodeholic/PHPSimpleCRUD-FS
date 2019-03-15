<?php
require_once __DIR__ . '/users/users.php';

$users = getUsers();
//echo '<pre>';
//var_dump($users);
//echo '</pre>';

require_once 'partials/header.php';
?>

<!--Generate table-->
<div class="container">
    <br>
    <br>
    <p>
        <a href="create.php" class="btn btn-primary">Create</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td>
                    <a target="_blank" href="http://<?php echo $user['website'] ?>">
                        <?php echo $user['website'] ?>
                    </a>
                </td>
                <td style="white-space: nowrap">
                    <a class="btn btn-sm btn-outline-primary" href="view.php?id=<?php echo $user['id'] ?>">View</a>
                    <a class="btn btn-sm btn-outline-info" href="update.php?id=<?php echo $user['id'] ?>">Update</a>
                    <!-- Create form with method=POST as far as making a get request for data deletion is not safe -->
                    <form method="POST" action="delete.php" style="display: inline-block">
                        <!--Create hidden input field with value current user id, so that this user id will be posted to backend
                        When delete button will be clicked-->
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!--/Generate table-->
<?php require_once 'partials/footer.php'; ?>

