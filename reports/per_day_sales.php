<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>

<div style="width: 90%; margin: auto; padding: 20px 0;">
    <h1>Daily Sales </h1>
    <div id="printable">
        <table class="table table-hover table-striped table-condensed table-bordered">
            <thead class="">
                <th>#</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Supplier</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Remarks</th>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM `sales`") or trigger_error(mysqli_error($conn));

                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                    foreach ($row as $key => $value) {
                        $row[$key] = stripslashes($value);
                    }
                    $i += 1;
                    echo "<tr style='padding: 10px;'>";
                    echo '<td style="padding: 10px;">' . $i . '</td>';
                    echo "<td style='padding: 10px; vertical-align: top;'>" . nl2br($row['name']) . "</td>";
                    echo "<td style='padding: 10px; vertical-align: top;'>" . nl2br($row['weight']) . "</td>";
                    echo "<td style='padding: 10px; vertical-align: top;'>" . nl2br($row['supplier']) . "</td>";
                    echo "<td style='padding: 10px; vertical-align: top;'>" . nl2br($row['cost']) . "</td>";
                    echo "<td style='padding: 10px; vertical-align: top;'>" . nl2br($row['status']) . "</td>";
                    echo "<td style='padding: 10px; vertical-align: top;'>" . nl2br($row['remarks']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <a id="print" class="btn btn-success">Print</a>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#print').on('click', function() {
                printDiv('printable');
            });
        });

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</div>

<?php include '../incl/footer.incl.php'; ?>