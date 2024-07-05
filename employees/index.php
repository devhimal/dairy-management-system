<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

// if ($current_user['role'] != 'Manager') {
//     echo "sorry you are not allowed to access this module";
//     exit();
// }
?>
<style>
    .container {
        width: 90%;
        margin: auto;
    }

    table.table {
        margin-bottom: 20px;
    }

    table.table td,
    table.table th {
        padding: 10px;
    }
</style>
<div class="container">
    <a class="btn btn-large btn-primary" href="add.php"><i class="icon-plus icon-white"></i>New User</a><br /><br />
    <table class='table table-hover table-striped table-condensed table-bordered'>
        <thead>
            <tr>
                <!-- <th>Id</th> -->
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `users`") or trigger_error(mysqli_error($conn));
            while ($row = mysqli_fetch_array($result)) {
                foreach ($row as $key => $value) {
                    $row[$key] = stripslashes($value);
                }
                echo "<tr>";
                //echo "<td>" . nl2br($row['id']) . "</td>";
                echo "<td>" . nl2br($row['name']) . "</td>";
                echo "<td>" . nl2br($row['email']) . "</td>";
                //echo "<td>" . nl2br($row['password']) . "</td>";
                echo "<td>" . nl2br($row['salary']) . "</td>";
                echo "<td><a href=edit.php?id={$row['id']}>Edit</a> | <a href=delete.php?id={$row['id']} style=color:red>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include '../incl/footer.incl.php';
?>