<?php
session_start();
include("../connection.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `admin_login` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $qry); // Execute the query

    // Check if the query executed successfully and returned a result
    if($result && mysqli_num_rows($result) > 0){
        $_SESSION['email'] = $email;
        header("location: index.php");
        exit(); // Ensure the script stops after redirection
    } else {
        echo '<script>alert("Invalid Email or Password")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- aos animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="flash.css">
    <title>Shree Hotel</title>

</head>

<body>
    <!--  carousel -->
    <section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./img/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./img/hotel2.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./img/hotel3.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./img/hotel4.jpg">
            </div>
        </div>
    </section>

    <!-- main section -->
    <section id="auth_section">

        <div class="mt-4">
            <h2 class="text-uppercase text-center"><img src="logomain.png" alt="" height="95px"></h2>
        </div>

        <div class="auth_container mt-3">
            <!--============ login =============-->

            <div id="Log_in">
                <h2 class="mt-5">Admin Login</h2>

                <form class="user_login authsection active mt-2" id="userlogin" action="" method="POST">
                    <div class="form-floating">
                        <input typuser_logine="email" class="form-control" name="email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <a href="header.php"><button name="login" class="auth_btn">Log in</button></a>

                    <div class="footer_line">
                        <h6>Don't have an account? <a href="register.php" class="text-decoration-none">Sign up</a></h6>
                        <h6> <a href="forgot_pass.php" class="text-decoration-none">Forgot Password</a></h6>
                    </div>
                </form>



            </div>


    </section>

</body>


<script src="./javascript/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- aos animation-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init();
</script>

</html>
