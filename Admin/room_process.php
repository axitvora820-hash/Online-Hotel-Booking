<?php
include "../connection.php";

if (isset($_POST['confirm'])) {
    $reservation_id = $_POST['reservation_id'];

    // Check if payment entry already exists
    $check_payment_qry = "SELECT * FROM payment WHERE id = ?";
    $stmt = $conn->prepare($check_payment_qry);
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Entry already exists, handle accordingly
        echo "<script>
                alert('Payment already confirmed for this reservation.');
                window.location.href = 'roombooking.php';
              </script>";
    } else {
        // Fetch the reservation details
        $qry = "SELECT * FROM reservation WHERE id = ?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("i", $reservation_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $reservation = $result->fetch_assoc();

        if ($reservation) {
            // Define room, bed, and meal costs
            $room_costs = [
                "Super Room" => 3000,
                "Deluxe Room" => 2000,
                "Guest House" => 1500,
                "Simple Room" => 1000
            ];
            $bed_costs = [
                "Single" => 200,
                "Double" => 400,
                "Triple" => 600,
                "Quad" => 800,
                "None" => 0
            ];
            $meal_costs = [
                "Room only" => 0,
                "Breakfast" => 300,
                "Half Board" => 500,
                "Full Board" => 800
            ];

            // Retrieve reservation details
            $room_type = $reservation['room_type'];
            $bed_type = $reservation['bed'];
            $meal_type = $reservation['meal'];
            $num_rooms = $reservation['number_of_room'];

            // Debugging output
            echo "Room Type: $room_type<br>";
            echo "Bed Type: $bed_type<br>";
            echo "Meal Type: $meal_type<br>";
            echo "Number of Rooms: $num_rooms<br>";

            // Debug cost values
            echo "Room Cost: " . ($room_costs[$room_type] ?? 0) . "<br>";
            echo "Bed Cost: " . ($bed_costs[$bed_type] ?? 0) . "<br>";
            echo "Meal Cost: " . ($meal_costs[$meal_type] ?? 0) . "<br>";

            // Calculate totals
            $roomtotal = ($room_costs[$room_type] ?? 0) * $num_rooms;
            $bedtotal = ($bed_costs[$bed_type] ?? 0) * $num_rooms;
            $mealtotal = ($meal_costs[$meal_type] ?? 0) * $num_rooms;
            $finaltotal = $roomtotal + $bedtotal + $mealtotal;

            // Debug total values
            echo "Room Total: $roomtotal<br>";
            echo "Bed Total: $bedtotal<br>";
            echo "Meal Total: $mealtotal<br>";
            echo "Final Total: $finaltotal<br>";

            // Insert into payment table
            $insert_payment_qry = "INSERT INTO payment (id, Name, Email, RoomType, Bed, NoofRoom, cin, cout, meal, roomtotal, bedtotal, mealtotal, finaltotal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_payment_qry);
            $stmt->bind_param("issssssssdddd", 
                $reservation['id'], 
                $reservation['name'], 
                $reservation['email'], 
                $room_type, 
                $bed_type, 
                $num_rooms, 
                $reservation['check_in'], 
                $reservation['check_out'], 
                $meal_type, 
                $roomtotal, 
                $bedtotal, 
                $mealtotal, 
                $finaltotal
            );

            if ($stmt->execute()) {
                echo "<script>
                        alert('Payment confirmed and record inserted into payment table.');
                        window.location.href = 'roombooking.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error: " . $stmt->error . "');
                        window.location.href = 'roombooking.php';
                      </script>";
            }
        }
    }

    $stmt->close();
    $conn->close();
}
?>
