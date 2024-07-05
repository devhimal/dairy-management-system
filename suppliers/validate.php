<?php
function validate_suppliers($id, $name, $phone, $product, $cost, $payment, $conn)
{
    $errors = array('valid' => true, 'nulls' => '', 'id' => '',);
    $has_errors = false;

    // Check for empty fields
    if (empty($name) || empty($phone)) {
        $errors['nulls'] = '<span class="error badge badge-warning"> All fields with * are required</span>';
        $has_errors = true;
    }

    // Validate uniqueness of ID
    if (!empty($id)) {
        $idresult = mysqli_query($conn, "SELECT * FROM supplier WHERE id = '$id'");
        if (mysqli_num_rows($idresult) > 0) {
            $errors['id'] = "<span class='error badge badge-warning'>Supplier with ID $id already exists</span>";
            $has_errors = true;
        }
    }

    // Validate uniqueness of Phone Number
    if (!empty($phone)) {
        $phoneresult = mysqli_query($conn, "SELECT * FROM supplier WHERE phone = '$phone'");
        if (mysqli_num_rows($phoneresult) > 0) {
            $errors['phone'] = "<span class='error badge badge-warning'>Supplier with Phone Number $phone already exists</span>";
            $has_errors = true;
        }
    }

    $errors['valid'] = !$has_errors;
    return $errors;
}
