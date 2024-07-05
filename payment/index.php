<?php
// Include necessary files or initialize connections
include '../incl/header.incl.php';
include '../incl/conn.incl.php';  // Assuming this file contains your database connection code

// SQL query to fetch data from the payment table
$sql = "SELECT * FROM payment";
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    echo '<div style="width: 90%; margin: auto;">';
    echo '<h1>Payment List</h1>';
    echo '<table class="table table-hover table-striped table-condensed table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>#</th>';
    echo '<th>Supplier</th>';
    echo '<th>Amount</th>';
    echo '<th>Date</th>';
    echo '<th>Check</th>';
    echo '<th>Remarks</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output data of each row
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $i++;
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        echo '<td>' . htmlspecialchars($row['supplier']) . '</td>';
        echo '<td>' . htmlspecialchars($row['amount']) . '</td>';
        echo '<td>' . htmlspecialchars($row['date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['check']) . '</td>';
        echo '<td>' . htmlspecialchars($row['remarks']) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "0 results";
}

// Close connection
mysqli_close($conn);

// Include footer or other necessary files
include '../incl/footer.incl.php';