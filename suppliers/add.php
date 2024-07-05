<?php
include '../incl/header.incl.php';
include "../incl/conn.incl.php"; // include the connection settings
include 'validate.php';

?>
<div class="container" style="width: 90%; margin: auto;">
    <h1 style="padding: 10px;">Add Suppliers</h1>
    <?php
    // Initialize validation array
    $validation = array('valid' => true, 'nulls' => '', 'id' => '', 'name' => '');

    // Check if form is submitted
    if (isset($_POST['submitted'])) {
        // Validate form input
        $validation = validate_suppliers($_POST['id'], $_POST['name'], $_POST['phone'], $_POST['product'], $_POST['cost'], $_POST['payment'], $conn);

        if ($validation['valid']) {
            // Sanitize input for SQL query (if needed)
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $product = mysqli_real_escape_string($conn, $_POST['product']);
            $cost = mysqli_real_escape_string($conn, $_POST['cost']);
            $payment = mysqli_real_escape_string($conn, $_POST['payment']);

            // Prepare SQL query to insert supplier details
            $sql = "INSERT INTO `supplier` (`id`, `name`, `phone`, `product`, `cost`, `payment`)
                    VALUES ('$id', '$name', '$phone', '$product', '$cost', '$payment')";

            // Execute SQL query
            if (mysqli_query($conn, $sql)) {
                echo "You successfully added the supplier.<br />";
            } else {
                echo "Error: " . mysqli_error($conn) . "<br />";
            }
        } else {
            echo $validation['nulls']; // Display validation errors
        }
    }
    ?>
    <a href='index.php' class='btn btn-primary'>Back To Supplier</a>
    <form action='' method='post' class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="id"> ID:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Supplier ID" name='id' value='<?php echo isset($_POST['id']) ? $_POST['id'] : '' ?>' />
                <?php echo $validation['id'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="name"> Supplier's Name:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Supplier Name" name='name' value='<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>' />
                <?php echo $validation['name'] ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="phone"> Phone:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Supplier Phone" name='phone' value='<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="product"> Product:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Product" name='product' value='<?php echo isset($_POST['product']) ? $_POST['product'] : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cost"> Cost:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Cost" name='cost' value='<?php echo isset($_POST['cost']) ? $_POST['cost'] : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="payment"> Payment:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Payment" name='payment' value='<?php echo isset($_POST['payment']) ? $_POST['payment'] : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type='hidden' value='1' name='submitted' />
                <input type='submit' value='Add Supplier' class="btn btn-success btn-large" />
            </div>
        </div>
    </form>
</div>

<?php
include '../incl/footer.incl.php';
?>