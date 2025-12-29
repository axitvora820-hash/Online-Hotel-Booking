<?php
// Database connection
include('../connection.php');

// Get the booking ID from the URL and sanitize it
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if ID is valid
if ($id <= 0) {
    die("Invalid booking ID.");
}

// Query to fetch booking details
$sql = "SELECT * FROM payment WHERE id = $id";
$result = mysqli_query($conn, $sql);

// Check for SQL errors
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($result);

// Check if data was found
if (!$data) {
    die("No booking found with ID $id.");
}

// Extract relevant data
$mealType = $data['meal'];
$roomType = $data['RoomType'];
$no_of_rooms = $data['NoofRoom'];
$roomtotal = $data['roomtotal'];
$bedtotal = $data['bedtotal'];
$mealtotal = $data['mealtotal'];
$finaltotal = $data['finaltotal'];

$currentDate = date("d-m-Y");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">


    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            background-color: #000;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .header img {
            max-width: 150px;
        }

        .contact-info {
            text-align: center;
            margin-top: 20px;
        }

        .contact-info p {
            margin: 0;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice-details .customer-info {
            text-align: left;
        }

        .invoice-details .invoice-info {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .total, .amount-paid, .balance-due {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
     

        
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <!-- <img src="logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> -->
                    <img src="logomain.png" alt="" height="60px">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="download.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="roombooking.php" class="nav-link ">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    Room Booking

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="payment.php" class="nav-link active">
                                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                <p>
                                    Payment


                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="roomadd.php" class="nav-link">
                                <i class="nav-icon fas fa-hotel"></i>
                                <p>
                                    Add Rooms

                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="users.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="roomdetails.php" class="nav-link">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    Room Details

                                </p>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        <div class="invoice-container">
        <header>
        <h1 style="background-color: black; text-align: center; color: white;">Invoice</h1>
        <address id="address">
          <img alt="" src="logomain.png" height="70px" class="float-right">

            <p>
            <h6>Patel HOTEL</h6>
            </p>
            <p>(+91) 9601406503</p>
        </address>
    </header>
        <div class="invoice-details">
            <div class="customer-info">
                <h3><?php echo htmlspecialchars($data['Name']); ?></h3>
            </div>
            <div class="invoice-info">
                <p>Invoice #: <?php echo htmlspecialchars($data['id']); ?></p>
                <p>Date: <?php echo $currentDate; ?></p>
            </div>
        </div>
        <table>
            <tr>
                <th>Item</th>
                <th>No of Days</th>
                <th>Rate</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>Single Room</td>
                <td>1</td>
                <td>₹<?php echo number_format($roomtotal, 2); ?></td>
                <td><?php echo htmlspecialchars($no_of_rooms); ?></td>
                <td>₹<?php echo number_format($roomtotal * $no_of_rooms, 2); ?></td>
            </tr>
            <tr>
                <td>Single Bed</td>
                <td>1</td>
                <td>₹<?php echo number_format($bedtotal, 2); ?></td>
                <td>1</td>
                <td>₹<?php echo number_format($bedtotal, 2); ?></td>
            </tr>
            <tr>
                <td>Meal</td>
                <td>1</td>
                <td>₹<?php echo number_format($mealtotal, 2); ?></td>
                <td>1</td>
                <td>₹<?php echo number_format($mealtotal, 2); ?></td>
            </tr>
            
            <tr>
                <th colspan="4" class="text-right amount-paid">Amount Paid</th>
                <td>₹0.00</td>
            </tr>
            <tr>
                <th colspan="4" class="text-right total">Total</th>
                <td>₹<?php echo number_format($finaltotal, 2); ?></td>
            </tr>
            <!-- <tr>
                <th colspan="4" class="text-right balance-due">Balance Due</th>
                <td>₹<?php echo number_format($finaltotal, 2); ?></td>
            </tr> -->
        </table>
        <div class="text-center">
            <button onclick="window.print()">Print Invoice</button>
        </div>
        <aside>
            
            <div class="m-3">
                <p align="center">Email :- PatellHotel145@gmail.com || Web :-<a href="../home.php">www.Patelhotel.com </a>  || Phone :- +91 8182425353
                </p>
            </div>
        </aside>
    
    </div>
    </div>


        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io"></a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Patel Hotel</b>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>

    <script>
    window.onload = function() {
        // Get all forms
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            // Get the status input field
            const status = form.querySelector('input[name="status"]').value;
            // If status is confirmed, disable the confirm button
            if (status === 'confirmed') {
                const confirmButton = form.querySelector('button[name="confirm"]');
                confirmButton.disabled = true;
                confirmButton.classList.remove('btn-success');
                confirmButton.classList.add('btn-secondary');
                confirmButton.innerText = 'Confirmed';
            }
        });
    }
    </script>

    <!-- Include necessary scripts -->
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/bootstrap.bundle.min.js"></script>
    <script src="path/to/adminlte.min.js"></script>
    
</body>

</html>