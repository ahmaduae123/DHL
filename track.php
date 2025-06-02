<?php include 'db.php'; $result = ""; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Track Shipment</title>
  <style>
    body { text-align: center; font-family: Arial; padding: 50px; }
    input { padding: 10px; width: 250px; }
    input[type=submit] {
      background: #ba0c2f;
      color: white;
      border: none;
      cursor: pointer;
    }
    .result { margin-top: 20px; font-weight: bold; }
  </style>
</head>
<body>

  <h1>Track Your Shipment</h1>
  <form method="post">
    <input type="text" name="track_no" placeholder="Enter Tracking Number" required>
    <input type="submit" name="submit" value="Track">
  </form>

  <div class="result">
    <?php
      if (isset($_POST['submit'])) {
        $track_no = $_POST['track_no'];
        $sql = "SELECT * FROM shipments WHERE tracking_number='$track_no'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
          $row = $res->fetch_assoc();
          echo "Status: " . $row['status'] . "<br>Destination: " . $row['destination'];
        } else {
          echo "No shipment found for this tracking number.";
        }
      }
    ?>
  </div>

</body>
</html>
