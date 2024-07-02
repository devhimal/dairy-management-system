<?php


function validate_products($product_id, $name, $manufacture, $rate, $weight, $cost, $conn)
{
    $errors = array('valid' => true, 'nulls' => '', 'id' => '', 'no' => '');
    $has_errors = FALSE;
    if ($product_id == '' || $name == '' || $manufacture == '' || $rate == '' || $weight == '' || $cost == '') {
        $errors['nulls'] = '<span class="error badge badge-warning"> All fields with * are requied</span>';
        $has_errors = TRUE;
    }
    $idresult =  mysqli_query($conn, "select * from products where product_id= '$product_id' ") or die("unable to fetch records" . mysqli_error($conn));
    if (mysqli_num_rows($idresult) > 1) {
        $errors['id'] = "<span class='error  badge badge-warning'>Product with id product_id:$product_id Has been registered already</span>";
        $has_errors = TRUE;
    } else {
        $errors['id'] = '';
    }
    $noresult = mysqli_query($conn, "select * from products where product_id= '$product_id' ") or die("unable to fetch records" . mysqli_error($conn));
    if (mysqli_num_rows($noresult) > 1) {
        $errors['no'] = "<span class='error  badge badge-warning'>Product no:$product_id Has already been issued</span>";
        $has_errors = TRUE;
    } else {
        $errors['no'] = '';
    }

    $errors['valid'] = !$has_errors;
    return $errors;
}
