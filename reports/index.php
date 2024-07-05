<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>

<h1 style="margin-bottom: 40px; margin-left: 20px;">Reports</h1>

<div style="display: flex; gap: 20px; margin-left: 20px; margin-bottom:200px;">

    <div style="border: 1px solid blue; padding: 20px 10px; border-radius: 8px;">
        <a href="per_day_sales.php">
            <img src="../img/month.png" style="width: 100px; height: 100px;"><br />
            Per Day Sales Reports
        </a>
    </div>

    <div style="border: 1px solid blue; padding: 20px 10px; border-radius: 8px;">
        <a href="total_sales.php">
            <img src="../img/month.png" style="width: 100px; height: 100px;"><br />
            Total Sales Reports
        </a>
    </div>

</div>

<?php
include '../incl/footer.incl.php';
?>