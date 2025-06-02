<?php
// Show errors clearly
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to database
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Book Shipment</title>
  <style>
    body { font-family: Arial; text-align: center; padding: 50px; }
    input { padding: 10px; margin: 5px; width: 250px; }
    input[type=submit] {
      background-color: #ba0c2f;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <h1>Book Your Shipment</h1>

  <form method="post" action="">
    <input type="text" name="tracking_number" placeholder="Tracking Number" required><br>
    <input type="text" name="sender_name" placeholder="Sender Name" required><br>
    <input type="text" name="destination" placeholder="Destination City" required><br>
    <input type="number" name="weight" placeholder="Weight (kg)" step="0.1" required><br>
    <input type="submit" name="submit" value="Book Shipment">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    // Get form values safely
    $tracking_number = $conn->real_escape_string($_POST['tracking_number']);
    $sender_name = $conn->real_escape_string($_POST['sender_name']);
    $destination = $conn->real_escape_string($_POST['destination']);
    $weight = (float)$_POST['weight'];

    // SQL query
    $sql = "INSERT INTO shipments (tracking_number, sender_name, destination, weight)
            VALUES ('$tracking_number', '$sender_name', '$destination', '$weight')";

    if ($conn->query($sql)) {
      echo "<p style='color:green'>✅ Shipment booked successfully!</p>";
    } else {
      echo "<p style='color:red'>❌ Error: " . $conn->error . "</p>";
    }
  }
  ?>

</body>
</html>
