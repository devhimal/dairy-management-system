<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

// Check if user is authorized
// if ($current_user['role'] != 'Manager') {
//     echo "Sorry, you are not allowed to access this module";
//     exit();
// }

$e_payroll_no = '';
if (isset($_POST['submitted'])) {
    // Sanitize input data
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }

    // Hash the password
    $hashed_pass = md5($_POST['e_pass']);  // Consider using password_hash() instead

    // Insert into database
    $sql = "INSERT INTO `employees` (`e_name`, `e_mail`, `e_pass`, `e_role`, `e_payroll_no`)
            VALUES ('{$_POST['e_name']}', '{$_POST['e_mail']}', '{$hashed_pass}', '{$_POST['e_role']}', '{$_POST['e_payroll_no']}')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $e_payroll_no = $_POST['e_payroll_no'];
        echo "Employee added<br />";
        echo "<a href='index.php'>Back To Employees</a>";
    } else {
        // Handle insertion error
        echo "Error: " . mysqli_error($conn);
    }
}

// Fetch the employee details after insertion (if needed)
if (!empty($e_payroll_no)) {
    $query = "SELECT * FROM `employees` WHERE `e_payroll_no` ='$e_payroll_no'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
}

// Include the form
include 'form.php';