<?php

include '../connection.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM roomdetails WHERE id = $id";

$result = mysqli_query($conn, $deletesql);

header("Location:roomdetails.php");

?>