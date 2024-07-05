<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';

if ($current_user['role'] == 'Clerk') {
    echo "sorry Clerks are not allowed to access this module";
    exit();
}

?>
<div class="container" style="width: 90%; margin: auto;">
    <h1>Edit products</h1>
    <?php
    $Id = (int) $_GET['id'];
    if (isset($_POST['product_id'])) {
        $validation = validate_products($_POST['product_id'], $_POST['name'], $_POST['manufacture'], $_POST['rate'], $_POST['weight'], $_POST['cost'], $conn);
        if ($validation['valid'] == TRUE) {
            $sql = "UPDATE products SET  product_id =  '{$_POST['product_id']}' ,name =  '{$_POST['name']}' ,  manufacture =  '{$_POST['manufacture']}' , rate =  '{$_POST['rate']}' ,  weight =  '{$_POST['weight']}' ,  cost =  '{$_POST['cost']}'   WHERE product_id = '$Id' ";
            $rslt = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $Id =  $_POST['product_id'];
            echo (mysqli_affected_rows($conn)) ? " Product saved successfully.<br />" : "Nothing changed. <br />";
        } else {
            echo $validation['nulls'];
        }
    }
    $product_to_edit = mysqli_query($conn, "SELECT * FROM products WHERE product_id =" .  stripslashes($Id));
    $row = mysqli_fetch_array($product_to_edit);
    ?>
    <a href='index.php' class='btn btn-primary' style="margin: 20px 0px;">Back To Listing</a>
    <form action='' method='POST' class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="f_no"> Product Id</label>
            <div class="controls">
                <input class="input-xlarge" type="number" placeholder="CCF****" name='product_id'
                    value='<?php echo stripslashes($row['product_id']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_name"> Name of products:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Name.." name='name'
                    value='<?php echo stripslashes($row['name']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_locallity"> Manufacturer of products:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Area-X.." name='manufacture'
                    value='<?php echo stripslashes($row['manufacture']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_ac"> Products's rate</label>
            <div class="controls">
                <input class="input-xlarge" type="number" placeholder="Bank account number ******.." name='rate'
                    value='<?php echo stripslashes($row['rate']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_phone"> Weight</label>
            <div class="controls">
                <input class="input-xlarge" type="number" placeholder="+254******.." name='weight'
                    value='<?php echo stripslashes($row['weight']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="number"> Cost</label>
            <div class="controls">
                <input class="input-xlarge" type="number" placeholder="+254******.." name='cost'
                    value='<?php echo stripslashes($row['cost']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type='submit' value='Save' class="btn btn-success btn-large " />
                <input type='hidden' value='1' name='submitted' />
            </div>
        </div>
    </form>
</div>
<?php  //} 
?>