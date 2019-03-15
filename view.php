<?php
require_once 'users/users.php';
require_once 'partials/header.php';


if (!isset($_GET['id'])) {
    include "partials/not_found.php";
    exit;
}

$user = getUserById($_GET['id']);

//echo '<pre>';
//var_dump($user);
//echo '</pre>';
?>

<div class="container">
    <?php if ($user): ?>
        <!--
        Check bootstrap cards if you want to know more about it
        https://getbootstrap.com/docs/4.3/components/card/
        -->
        <div class="card">
            <div class="card-header">
                <h3>User <b><?php echo $user['name'] ?></b> details</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-info" href="update.php?id=<?php echo $user['id'] ?>">Update</a>
                <!-- Create form with method=POST as far as making a get request for data deletion is not safe -->
                <form method="POST" action="delete.php" style="display: inline-block">
                    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
            <div>
                <table class="table">
                    <tbody>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $user["name"] ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $user["username"] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $user["email"] ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?php echo $user["phone"] ?></td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td>
                            <a target="_blank" href="http://<?php echo $user["website"] ?>">
                                <?php echo $user["website"] ?>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            <h3>User was not found</h3>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'partials/footer.php'; ?>
