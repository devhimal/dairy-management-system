<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
$id = '';
if (isset($_POST['submitted'])) {
    // Sanitize input data
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }

    // Hash the password
    $hashed_pass = md5($_POST['password']);  // Consider using password_hash() instead

    // Insert into database
    $sql = "INSERT INTO `users` (`name`, `email`, `password`, `salary`)
            VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$hashed_pass}', '{$_POST['salary']}')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $id = mysqli_insert_id($conn);
        echo '<div style="margin-left: 60px;  padding: 20px 10px;">'; // Applying left margin
        echo "User added<br />";
        echo "<a href='index.php'>Back To Users</a>";
        echo '</div>';
    } else {
        // Handle insertion error
        echo '<div style="margin-left: 20px;">'; // Applying left margin
        echo "Error: " . mysqli_error($conn);
        echo '</div>';
    }
}

// Fetch the user details after insertion (if needed)
if (!empty($id)) {
    $query = "SELECT * FROM `users` WHERE `id` ='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
}
?>
<style>
    .container {
        width: 90%;
        margin: auto;
    }
</style>
<div class="container">
    <?php include 'form.php'; ?>
</div>
<?php
include '../incl/footer.incl.php';
?>