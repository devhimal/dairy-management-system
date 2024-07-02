<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<h1>Products</h1>
<?php
if (isset($_GET['delete'], $_GET['id'])) {
    if ($current_user['role'] == 'Clerk') {
        echo "sorry Clerks are not allowed to access this module";
        exit();
    }
    $Id = (int) $_GET['id'];
    mysqli_query($conn, "DELETE FROM `products` WHERE `product_id` = '" . stripslashes($Id) . "' ");
    echo (mysqli_affected_rows($conn)) ? "You have successfully deleted the products.<br /> " : "Nothing deleted.<br /> ";
}
?>
<a class="btn btn-large btn-primary" href="add.php" style="padding: 20px; margin: 10px 0px;"><i class="icon-plus icon-white"></i>Add
    products</a><br /><br />
<table class="table table-hover table-striped table-condensed table-bordered" style="padding: 10px;">
    <thead class="">
        <th style="padding: 10px;">Product ID</th>
        <th style="padding: 10px;">Name</th>
        <th style="padding: 10px;">Manufacture</th>
        <th style="padding: 10px;">Rate per kg</th>
        <th style="padding: 10px;">Total Weights</th>
        <th style="padding: 10px;">Total Cost</th>
        <?php if ($current_user['role'] != 'Clerk') { ?><th style="text-align: center; padding: 10px; background-color:blue; color:white; font:bold;">
                Actions</th>
        <?php } ?>
    </thead>
    <tbody>
        <?php

        $qry =  mysqli_query($conn, "select * from products") or die("unable to fetch records" .  mysqli_error($conn));
        $i = 0;
        while ($row =  mysqli_fetch_array($qry)) {
            foreach ($row as $key => $value) {
                $row[$key] = stripslashes($value);
            }
            $i += 1;
            echo '<tr style="padding: 10px;">';
            echo '<td style="padding: 10px;">' . $row['product_id'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['name'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['manufacture'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['rate'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['weight'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['cost'] . '</td>';
            if ($current_user['role'] != 'Clerk') {
                echo '<td style="text-align: center; padding: 10px;">
                <a href="' . PAGE_URL . 'products/edit.php?edit=1&id=' . $row['product_id'] . '" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href="' . PAGE_URL . 'products/?delete=1&id=' . $row['product_id'] . '" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';
            }

            echo '</tr>';
        }
        ?>
    </tbody>
</table>

<?php
include '../incl/footer.incl.php';
?>