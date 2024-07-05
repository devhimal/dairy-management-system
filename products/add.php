<?php
include '../incl/header.incl.php';
include("../incl/conn.incl.php"); // include the connection settings
include 'validate.php';
?>
<div class="container" style="width: 90%; margin: auto;">
    <h1 style="padding: 10px;">Add products</h1>
    <?php
    $validation = array('valid' => true, 'nulls' => '', 'id' => '',);
    if (isset($_POST['product_id'])) {
        //    foreach ($_POST AS $key => $value) {
        //        $_POST[$key] = mysqli_real_escape_string($conn, $value);
        //    }
        $validation = validate_products($_POST['product_id'], $_POST['name'], $_POST['manufacture'], $_POST['rate'], $_POST['weight'], $_POST['cost'], $conn);
        if ($validation['valid'] == TRUE) {
            $sql = "INSERT INTO `products` ( `product_id` ,`name` , `manufacture` , `rate` ,  `weight` ,  `cost`  ) VALUES(  '{$_POST['product_id']}' ,'{$_POST['name']}', '{$_POST['manufacture']}' ,  '{$_POST['rate']}' ,  '{$_POST['weight']}','{$_POST['cost']}'  ) ";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo "You successfully added the product.<br />";
        } else {
            echo $validation['nulls'];
        }
    }
    ?>
    <a href='index.php' class='btn btn-primary' style="padding: 5px 10px; margin: 20px 10px; ">Back To products</a>
    <form action='' method='post' class="form-horizontal">

        <div class="control-group">
            <label class="control-label" for="f_id">ID</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="101" name='product_id' />
                <?php echo $validation['product_id'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_name"> Name of products:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Name.." name='name' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_locallity"> Manufacture of products:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="xyz" name="manufacture" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_ac"> products' s rate:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="NPR 100" name='rate' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_phone"> products weight</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="2kg" name='weight' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="f_phone">Cost of the product</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="NPR 2000" name='cost' />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type='hidden' value='1' name='submitted' />
                <input type='submit' value='Add products' class="btn btn-primary btn-large" />
            </div>
        </div>
    </form>
</div>

<?php
include '../incl/footer.incl.php';
?>