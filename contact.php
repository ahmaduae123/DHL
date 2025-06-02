<?php include 'db.php'; $msg = ""; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <style>
    body { text-align: center; font-family: Arial; padding: 50px; }
    input, textarea { padding: 10px; width: 300px; margin: 5px; }
    input[type=submit] {
      background: #ba0c2f;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <h1>Contact DHL Clone</h1>
  <form method="post">
    <input type="email" name="email" placeholder="Your Email" required><br>
    <textarea name="message" placeholder="Your Message" required></textarea><br>
    <input type="submit" name="send" value="Send Message">
  </form>

  <div>
    <?php
      if (isset($_POST['send'])) {
        $email = $_POST['email'];
        $message = $_POST['message'];
        $sql = "INSERT INTO contacts (email, message) VALUES ('$email', '$message')";
        if ($conn->query($sql)) {
          echo "<p style='color:green'>Message Sent!</p>";
        } else {
          echo "<p style='color:red'>Error: " . $conn->error . "</p>";
        }
      }
    ?>
  </div>

</body>
</html>
