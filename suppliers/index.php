<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<div class="container" style="width: 90%; margin: auto;">
    <h1>Suppliers</h1>
    <?php
    if (isset($_GET['delete'], $_GET['id'])) {
        if ($current_user['role'] == 'Clerk') {
            echo "Sorry, Clerks are not allowed to access this module";
            exit();
        }
        $id = (int) $_GET['id'];
        mysqli_query($conn, "DELETE FROM `supplier` WHERE `id` = '" . $id . "'");
        echo (mysqli_affected_rows($conn)) ? "You have successfully deleted the supplier.<br /> " : "Nothing deleted.<br /> ";
    }
    ?>
    <?php if ($current_user['role'] != 'Clerk') { ?>
        <a class="btn btn-large btn-primary" href="add.php" style="padding: 20px; margin: 10px 0px;"><i class="icon-plus icon-white"></i>Add suppliers</a><br /><br />
    <?php } ?>
    <table class="table table-hover table-striped table-condensed table-bordered" style="padding: 10px;">
        <thead class="">
            <tr>
                <!-- <th style="padding: 10px;">#</th> -->
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Phone</th>
                <th style="padding: 10px;">Product</th>
                <th style="padding: 10px;">Cost</th>
                <th style="padding: 10px;">Payment</th>
                <?php if ($current_user['role'] != 'Clerk') { ?>
                    <th style="text-align: center; padding: 10px; background-color:blue; color:white; font:bold;">Actions
                    </th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $qry = mysqli_query($conn, "SELECT * FROM `supplier`") or die("Unable to fetch records" . mysqli_error($conn));
            $i = 0;
            while ($row = mysqli_fetch_assoc($qry)) {
                $i++;
                echo '<tr>';
                echo '<td style="padding: 10px;">' . $row['id'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['name'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['phone'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['product'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['cost'] . '</td>';
                echo '<td style="padding: 10px;">' . $row['payment'] . '</td>';
                if ($current_user['role'] != 'Clerk') {
                    echo '<td style="text-align: center; padding: 10px;">
                        <a href="' . PAGE_URL . 'suppliers/edit.php?edit=1&id=' . $row['id'] . '" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                        <a href="' . PAGE_URL . 'suppliers/?delete=1&id=' . $row['id'] . '" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a>
                    </td>';
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include '../incl/footer.incl.php';
?>