<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

// if ($current_user['role'] != 'Manager') {
//     echo "sorry you are not allowed to access this module";
//     exit();
// }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['submitted'])) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = mysqli_real_escape_string($conn, $value);
        }
        $hashed_pass = md5($_POST['password']);
        $sql = "UPDATE `users` SET `name` = '{$_POST['name']}', `email` = '{$_POST['email']}', `password` = '{$hashed_pass}', `salary` = '{$_POST['salary']}' WHERE `id` = '$id'";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
        echo (mysqli_affected_rows($conn)) ? "Changes Saved.<br />" : "Nothing changed. <br />";
        echo "<a href='index.php'>Back To Users</a>";
    }
    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `id` ='$id'");
    $row = mysqli_fetch_array($result);
?>
<div style="width: 90%; margin: auto;">
    <?php include 'form.php'; ?>
</div>
<?php
}
?>