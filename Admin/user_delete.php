<?php

include '../connection.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM register WHERE id = $id";

$result = mysqli_query($conn, $deletesql);

header("Location:users.php");

?>