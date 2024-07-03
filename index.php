<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Management System</title>
    <link rel="stylesheet" href="/css/main.css" />
    <style>
        #wrapper1 {
            display: flex;
            z-index: 50px;
            gap: 20px;
            position: relative !important;
            min-height: 100vh;
            width: 100%;
            height: fit-content;
            overflow: hidden;
            /* border: 2px solid red; */
            margin-top: -20px !important;
            margin-left: -60px !important;
        }


        #navigation {
            border: 1px solid grey;
            border-radius: 8px;
            padding: 10px 10px;
            overflow: hidden;
            width: 20%;
            background-color: #2F3645;
        }

        .nav-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
        }

        .nav-container li {
            list-style: none;
            border-bottom: 1px solid grey;
            padding: 18px 0px;
            color: white !important;

        }

        .nav-container li a {
            color: white;
            font-size: 20px;
        }

        .container1 {
            width: 80%;
            grid-column: span 1;
            /* border: 2px solid blue; */
            padding: 0px !important;
            margin: 0px !important;
        }

        .container1 .span {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            width: 100%;
            padding: 0px !important;
            margin: 0px !important;

        }

        .span .span-3 {
            box-sizing: border-box;
            margin-bottom: 20px !important;
            margin: 0px;
            padding: 0px;
            border: 1px solid gray;
            padding: 10px;
            border-radius: 8px;
        }

        .span .span-3:hover {
            box-shadow: 0px 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .span .span-3 img {
            height: 150px;
            width: 100%;
            object-fit: fill;
        }



        @media (max-width: 968px) {
            .container1 .span {
                grid-template-columns: 1fr 1fr 1fr;
            }

            .span .span-3 {
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .container1 .span {
                grid-template-columns: 1fr 1fr;
            }

            .span .span-3 {
                height: auto;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include("incl/header.incl.php");
    ?>

    <div id="wrapper1">
        <div id="navigation" class="navbar pull-right">
            <div>
                <h2 style="text-align: start;color:white; padding:0px 20px; padding-bottom:20px;border-bottom:1px solid lightblue; ">
                    Dashboard</h2>
            </div>
            <ul class="nav-container">
                <li><a href="<?php echo Page_Url(); ?>">Home</a></li>
                <li><a href="<?php echo Page_Url(); ?>products/index.php">Products</a></li>
                <li><a href="<?php echo Page_Url(); ?>supliers/index.php">Supliers</a></li>
                <li><a href="<?php echo Page_Url(); ?>employees/index.php">Employees</a></li>
                <li><a href="<?php echo Page_Url(); ?>payment/index.php">Payments</a></li>
                <li><a href="<?php echo Page_Url(); ?>reports/index.php">Reports</a></li>
            </ul>
        </div>
        <div class="container1">
            <div class="span">
                <div class="span-3">
                    <a href='products/index.php'>
                        <img src="img/icons/product1.png" alt="product"><br />
                        <strong>Products</strong>
                    </a>
                </div>
                <div class="span-3">
                    <a href='supliers/index.php'>
                        <img src="img/icons/suplier.png" alt="supliers"><br />
                        <strong>Supliers</strong>
                    </a>
                </div>
                <div class="span-3">
                    <a href='employees/index.php'>
                        <img src="img/icons/people.svg" alt="Employees"><br />
                        <strong>Employees</strong>
                    </a>
                </div>

                <div class="span-3">
                    <a href='reports/index.php'>
                        <img src="img/icons/report.png" alt="Reports"><br />
                        <strong>Reports</strong>
                    </a>
                </div>
                <div class="span-3">
                    <a href='payment/index.php'>
                        <img src="img/icons/image.png" alt="Payments"><br />
                        <strong>Payments</strong>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <?php
    // include("incl/footer.incl.php");
    ?>
</body>

</html>