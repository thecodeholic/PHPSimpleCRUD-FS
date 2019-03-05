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
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['website'] ?></td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="<?php echo 'view.php?id=' . $user['id'] ?>">View</a>
                    <a class="btn btn-sm btn-secondary" href="<?php echo 'update.php?id=' . $user['id'] ?>">Update</a>
                    <a class="btn btn-sm btn-secondary" href="<?php echo 'delete.php?id=' . $user['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!--/Generate table-->
<?php require_once 'partials/footer.php'; ?>

