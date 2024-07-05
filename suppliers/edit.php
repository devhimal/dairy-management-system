<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php'; // Assuming validate.php contains the validate_suppliers function

?>
<div class="container" style="width: 90%; margin: auto;">
    <h1>Edit Suppliers</h1>
    <?php
    // Check if ID is provided via GET
    if (isset($_GET['id'])) {
        $id = (int) $_GET['id'];

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

                // Prepare SQL query to update supplier details
                $sql = "UPDATE supplier SET  
                        id = '$id', 
                        name = '$name', 
                        phone = '$phone', 
                        product = '$product', 
                        cost = '$cost', 
                        payment = '$payment' 
                        WHERE id = $id";

                // Execute SQL query
                $result = mysqli_query($conn, $sql);

                // Check if update was successful
                if ($result) {
                    echo "Supplier details saved successfully.<br />";
                } else {
                    echo "Error updating supplier details: " . mysqli_error($conn) . "<br />";
                }
            } else {
                echo $validation['nulls']; // Display validation errors
            }
        }

        // Fetch supplier details to pre-fill the form
        $supplier_to_edit = mysqli_query($conn, "SELECT * FROM supplier WHERE id = $id");
        $row = mysqli_fetch_array($supplier_to_edit);
    } else {
        echo "Supplier ID not provided.";
    }
    ?>
    <a href='index.php' class='btn btn-primary'>Back To Listing</a>
    <form action='' method='POST' class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="id"> ID:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Supplier ID" name='id'
                    value='<?php echo isset($row['id']) ? htmlspecialchars($row['id']) : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="name"> Name:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Supplier Name" name='name'
                    value='<?php echo isset($row['name']) ? htmlspecialchars($row['name']) : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="phone"> Phone:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Supplier Phone" name='phone'
                    value='<?php echo isset($row['phone']) ? htmlspecialchars($row['phone']) : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="product"> Product:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Product" name='product'
                    value='<?php echo isset($row['product']) ? htmlspecialchars($row['product']) : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cost"> Cost:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Cost" name='cost'
                    value='<?php echo isset($row['cost']) ? htmlspecialchars($row['cost']) : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="payment"> Payment:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" placeholder="Payment" name='payment'
                    value='<?php echo isset($row['payment']) ? htmlspecialchars($row['payment']) : '' ?>' />
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type='submit' value='Save' class="btn btn-success btn-large" />
                <input type='hidden' value='1' name='submitted' />
            </div>
        </div>
    </form>
</div>
<?php
include '../incl/footer.incl.php';
?>