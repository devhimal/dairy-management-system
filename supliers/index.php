<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<h1>Supliers</h1>
<?php
if (isset($_GET['delete'], $_GET['id'])) {
    if ($current_user['role'] == 'Clerk') {
        echo "sorry Clerks are not allowed to access this module";
        exit();
    }
    $f_no = (int) $_GET['id'];
    mysqli_query($conn, "DELETE FROM `supliers` WHERE `f_no` = '" . stripslashes($f_no) . "' ");
    echo (mysqli_affected_rows($conn)) ? "You have successfully deleted the supliers.<br /> " : "Nothing deleted.<br /> ";
}
?>
<a class="btn btn-large btn-primary" href="add.php" style="padding: 20px; margin: 10px 0px;"><i class="icon-plus icon-white"></i>Add
    supliers</a><br /><br />
<table class="table table-hover table-striped table-condensed table-bordered" style="padding: 10px;">
    <thead class="">
        <th style="padding: 10px;">#</th>
        <th style="padding: 10px;">supliers NO:</th>
        <th style="padding: 10px;">ID NO:</th>
        <th style="padding: 10px;">Name:</th>
        <th style="padding: 10px;">Locality</th>
        <th style="padding: 10px;">Account No:</th>
        <th style="padding: 10px;">Phone No:</th>
        <?php if ($current_user['role'] != 'Clerk') { ?><th style="text-align: center; padding: 10px; background-color:blue; color:white; font:bold;">
                Actions</th>
        <?php } ?>
    </thead>
    <tbody>
        <?php

        $qry =  mysqli_query($conn, "select * from supliers") or die("unable to fetch records" .  mysqli_error($conn));
        $i = 0;
        while ($row =  mysqli_fetch_array($qry)) {
            foreach ($row as $key => $value) {
                $row[$key] = stripslashes($value);
            }
            $i += 1;
            echo '<tr style="padding: 10px;">';
            echo '<td style="padding: 10px;">' . $i . '</td>';
            echo '<td style="padding: 10px;">' . $row['f_no'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['f_id'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['f_name'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['f_locallity'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['f_ac'] . '</td>';
            echo '<td style="padding: 10px;">' . $row['f_phone'] . '</td>';
            if ($current_user['role'] != 'Clerk') {
                echo '<td style="text-align: center; padding: 10px;">
                <a href="' . PAGE_URL . 'supliers/edit.php?edit=1&id=' . $row['f_no'] . '" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href="' . PAGE_URL . 'supliers/?delete=1&id=' . $row['f_no'] . '" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
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