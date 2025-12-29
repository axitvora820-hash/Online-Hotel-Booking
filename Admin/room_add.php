<?php
session_start();

include("../connection.php");

if(isset($_POST['add'])){

    $image=$_FILES['roomimage']['name'];
    $tempname=$_FILES['roomimage']['tmp_name'];
    $folder="../img/".$image;

    $roomtype=$_POST['roomtype'];
    $price=$_POST['price'];
    $bedroom=$_POST['bedroom'];
    $bathroom=$_POST['bathroom'];
    $balcony=$_POST['balcony'];
    $sofa=$_POST['sofa'];

    $qry="INSERT INTO `roomdetails`( `images`, `roomtype`, `price`, `bedroom`, `bathroom`, `balcony`, `sofa`)
     VALUES ('$image','$roomtype','$price','$bedroom','$bathroom','$balcony','$sofa')";

     $res=mysqli_query($conn,$qry);

     if($res==1){
        header("location:roomadd.php");
     }


}



?>