<?php

// If $_POST is not empty
if (!empty($_POST)) {
//    // @todo validate all fields
//    // When validation passes

    // Save user in JSON or update depending if $_POST['id'] exists or not
    if ($_POST['id']) {
        updateUser($_POST, $_POST['id']);
    } else {
        // Create user and save the returned $user
        $user = createUser($_POST);
    }

    // If files were uploaded save it
    if (!empty($_FILES)) {
        // ===================================================================
        // Even if this is UPDATE, $user variable still exists here from update.php LINE 10
        // ===================================================================

        // Get the file extension from the filename
        $fileName = $_FILES['picture']['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);
        // Save the file to the file system giving "$userId.$extension" as the name
        move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . "/users/images/${user['id']}.$extension");

        // If user has image, save the file extension in JSON also
        $_POST['extension'] = $extension;
        updateUser($_POST, $_POST['id']);
    }

    // Redirect user to index.page
    header('Location: index.php');
}
?>

<div class="card">
    <div class="card-header">
        <h3>
            <!--If $user variable has id show update user title-->
            <?php if ($user['id']): ?>
                Update user <b><?php echo $user['name'] ?></b>
            <?php else: ?>
                Create new user
            <?php endif; ?>
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <!--    Hidden field for saving id and submitting it to determine if we need to create user or updated it-->
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
            <div class="form-group">
                <label>Name</label>
                <input name="name" value="<?php echo $user['name'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input name="username" value="<?php echo $user['username'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" value="<?php echo $user['email'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Website</label>
                <input name="website" value="<?php echo $user['website'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input name="picture" type="file" class="form-control-file">
            </div>

            <button class="btn btn-success">Submit</button>
        </form>

    </div>
</div>
