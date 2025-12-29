<?php
include "../connection.php";

// Check if form fields are set before using them
$id = isset($_POST['id']) ? $_POST['id'] : '';
$room_type = isset($_POST['roomtype']) ? $_POST['roomtype'] : '';  // Fix for the undefined "roomtype" key
$price = isset($_POST['price']) ? $_POST['price'] : '';
$bedroom = isset($_POST['bedroom']) ? $_POST['bedroom'] : '';
$bathroom = isset($_POST['bathroom']) ? $_POST['bathroom'] : '';
$balcony = isset($_POST['balcony']) ? $_POST['balcony'] : '';
$sofa = isset($_POST['sofa']) ? $_POST['sofa'] : '';
$roomimage = '';  // Initialize the image variable

// Handle file upload (same as before)
if (isset($_FILES['roomimage']) && $_FILES['roomimage']['error'] == 0) {
    $file_name = $_FILES['roomimage']['name'];
    $file_tmp = $_FILES['roomimage']['tmp_name'];
    $target_dir = "../Hotel/img/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($file_name);

    if (move_uploaded_file($file_tmp, $target_file)) {
        $roomimage = $file_name;
    }
}

// Update query logic (same as before)
if (!empty($roomimage)) {
    $qry = "UPDATE roomdetails SET roomtype='$room_type', price='$price', bedroom='$bedroom', bathroom='$bathroom', balcony='$balcony', sofa='$sofa', images='$roomimage' WHERE id='$id'";
} else {
    $qry = "UPDATE roomdetails SET roomtype='$room_type', price='$price', bedroom='$bedroom', bathroom='$bathroom', balcony='$balcony', sofa='$sofa' WHERE id='$id'";
}

if (mysqli_query($conn, $qry)) {
    echo "Room updated successfully!";
} else {
    echo "Error updating room: " . mysqli_error($conn);
}
?>
