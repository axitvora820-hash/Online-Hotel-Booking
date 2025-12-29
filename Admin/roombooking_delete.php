<?php

include '../connection.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM reservation WHERE id = $id";

$result = mysqli_query($conn, $deletesql);

header("Location:roombooking.php");

?>