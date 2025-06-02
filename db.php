<?php
$servername = "localhost"; // ya hosting ke instructions me koi aur ho to use that
$username = "urnrgaote95vf";
$password = "tgk9ztof7xb1";
$dbname = "dbcq4kbhtiqu0b";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("❌ Connection failed: " . $conn->connect_error);
} else {
  // Connection success message (optional)
  // echo "✅ Connected successfully to database!";
}
?>
