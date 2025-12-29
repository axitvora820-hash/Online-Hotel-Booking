<?php
include("../connection.php");

$reservation_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($reservation_id > 0) {
    // Fetch the existing reservation details
    $qry = $conn->prepare("SELECT * FROM reservation WHERE id = ?");
    $qry->bind_param("i", $reservation_id);
    $qry->execute();
    $res = $qry->get_result();
    $row = $res->fetch_assoc();
    $qry->close();

    if (!$row) {
        echo "No reservation found for the given ID.";
        exit();
    }
} else {
    echo "Invalid reservation ID.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get updated values from the form
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $mobilenumber = $_POST['mobileno'];
    $room_type = $_POST['roomtype'];
    $bed = $_POST['bed'];
    $number_of_room = $_POST['noofroom'];
    $meal = $_POST['meal'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    // Update the reservation in the database
    $update_qry = $conn->prepare("UPDATE reservation SET 
                    name = ?, 
                    email = ?, 
                    mobilenumber = ?, 
                    room_type = ?, 
                    bed = ?, 
                    number_of_room = ?, 
                    meal = ?, 
                    check_in = ?, 
                    check_out = ? 
                    WHERE id = ?");
    $update_qry->bind_param("sssssssssi", $name, $email, $mobilenumber, $room_type, $bed, $number_of_room, $meal, $check_in, $check_out, $reservation_id);

    if ($update_qry->execute()) {
        echo "Reservation updated successfully!";
        header("Location: roombooking.php"); // Redirect to the main page after updating
        exit();
    } else {
        echo "Error: " . $update_qry->error;
    }

    $update_qry->close();
}

$conn->close();
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
    /* ===== Google Font Import - Poppins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url(images/bg.jpg);
        background-repeat: no-repeat;
    }

    .container {
        position: relative;
        max-width: 900px;
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .container header {
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }

    .container header::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }

    .container form {
        position: relative;
        margin-top: 16px;
        min-height: 490px;
        background-color: #fff;
        overflow: hidden;
    }

    .container form .form {
        position: absolute;
        background-color: #fff;
        transition: 0.3s ease;
    }

    .container form .form.second {
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }

    form.secActive .form.second {
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }

    form.secActive .form.first {
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }

    .container form .title {
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }

    .container form .fields {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    form .fields .input-field {
        display: flex;
        width: calc(100% / 3 - 15px);
        flex-direction: column;
        margin: 4px 0;
    }

    .input-field label {
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }

    .input-field input,
    select {
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }

    .input-field input :focus,
    .input-field select:focus {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
    }

    .input-field select,
    .input-field input[type="date"] {
        color: #707070;
    }

    .input-field input[type="date"]:valid {
        color: #333;
    }

    .container form button,
    .backBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }

    .container form .btnText {
        font-size: 14px;
        font-weight: 400;
    }

    form button:hover {
        background-color: #265df2;
    }

    form button i,
    form .backBtn i {
        margin: 0 6px;
    }

    form .backBtn i {
        transform: rotate(180deg);
    }

    form .buttons {
        display: flex;
        align-items: center;
    }

    form .buttons button,
    .backBtn {
        margin-right: 14px;
    }

    @media (max-width: 750px) {
        .container form {
            overflow-y: scroll;
        }

        .container form::-webkit-scrollbar {
            display: none;
        }

        form .fields .input-field {
            width: calc(100% / 2 - 15px);
        }
    }

    @media (max-width: 550px) {
        form .fields .input-field {
            width: 100%;
        }
    }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
    
        <!-- /.navbar -->

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
                            <a href="roombooking.php" class="nav-link active">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>
                                    Room Booking

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="payment.php" class="nav-link">
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
        
        <div class="container">
        <header><img src="images/patellogonew.png" alt="" height="70px"> RESERVATION FORM</header>

        <form method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name="uname"  value="<?php echo htmlspecialchars($row['name']); ?>" required>
                        </div>


                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" placeholder="Enter your email" name="uemail"   value="<?php echo htmlspecialchars($row['email']); ?>" >
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="text" placeholder="Enter mobile number" name="mobileno"   value="<?php echo htmlspecialchars($row['mobilenumber']); ?>"  >
                        </div>


                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Reservation Details</span>

                    <div class="fields">
                        <!-- <div class="input-field">
                            <label>Room Type</label>
                            <select name="roomtype" class="selectinput">
                                <option value selected>Type Of Room</option>
                                <option value="Simple Room">SIMPLE ROOM</option>
                                <option value="Deluxe Room">DELUXE ROOM</option>
                                <option value="Super Room">SUPER ROOM</option>

                            </select>

                        </div> -->

                        
                        <div class="input-field">
                            <label>Room Type</label>
                            

                            <input type="text" name="roomtype" value="<?php echo htmlspecialchars($row['room_type']); ?>">
                        </div>


                        <div class="input-field">
                            <label>Bed </label>
                            <select name="bed" class="selectinput" value="<?php echo htmlspecialchars($row['bed']); ?>">
                                <option value selected>Bedding Type</option>
                                <option value="Single">Single</option>
                                <option value="Double">Double</option>
                                <option value="Triple">Triple</option>
                                <option value="Quad">Quad</option>
                                <option value="None">None</option>
                            </select>

                        </div>

                        <div class="input-field">
                            <label>Number of Room</label>
                            <select name="noofroom" class="selectinput" value="<?php echo htmlspecialchars($row['noofroom']); ?>">
                                <option value selected>No of Room</option>
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                            </select>

                        </div>

                        <div class="input-field">
                            <label>Meal</label>
                            <select name="meal" class="selectinput" value="<?php echo htmlspecialchars($row['meal']); ?>">
                                <option value selected>Meal</option>
                                <option value="Room only">Room only</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Half Board">Half Board</option>
                                <option value="Full Board">Full Board</option>
                            </select>
                        </div>




                        <div class="input-field">
                            <label>Check-In</label>
                            <input type="date" placeholder="Enter your issued date" name="check_in" value="<?php echo htmlspecialchars($row['check_in']); ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Check-Out</label>
                            <input type="date" placeholder="Enter expiry date" name="check_out" value="<?php echo htmlspecialchars($row['check_out']); ?>" required>
                        </div>
                    </div>
                    <button type="submit" name="reservation">reservation </button>
                </div>
            </div>
        </form>
    
            <!-- /.content -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024-2025 <a href="https://adminlte.io"></a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Harshil Faldu</b>
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
    <script src="script.js"></script>

</body>

</html>