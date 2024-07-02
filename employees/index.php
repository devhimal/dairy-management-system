<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

// if ($current_user['role'] != 'Manager') {
//     echo "sorry you are not allowed to access this module";
//     exit();
// }
?>
<style>
table.table {
    margin-bottom: 20px;
}

table.table td,
table.table th {
    padding: 10px;
}
</style>
<a class="btn btn-large btn-primary" href="add.php"><i class="icon-plus icon-white"></i>New Employee</a><br /><br />
<table class='table table-hover table-striped table-condensed table-bordered'>
    <thead>
        <tr>
            <!-- //<th>Id</th>";  -->
            <th> Name</th>
            <th> Mail</th>
            <!-- //<th> Pass</th>";  -->
            <th> Role</th>
            <th> Salary</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `employees`") or trigger_error(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            foreach ($row as $key => $value) {
                $row[$key] = stripslashes($value);
            }
            echo "<tr>";
            //echo "<td>" . nl2br( $row['id']) . "</td>";  
            echo "<td>" . nl2br($row['e_name']) . "</td>";
            echo "<td>" . nl2br($row['e_mail']) . "</td>";
            //echo "<td>" . nl2br( $row['e_pass']) . "</td>";  
            echo "<td>" . nl2br($row['e_role']) . "</td>";
            echo "<td>" . nl2br($row['e_payroll_no']) . "</td>";
            echo "<td><a href=edit.php?e_payroll_no={$row['e_payroll_no']}>Edit</a> | <a href=delete.php?e_payroll_no={$row['e_payroll_no']} style=color:red>Delete</a></td> ";
            echo "</tr>";
        }
        echo "</tbody></table>";
        include '../incl/footer.incl.php';
        ?>