<?php
if (isset($_GET['submit'])) {
    $temperature = $_GET['temperature'];
    $humidity = $_GET['humidity'];

    $conn = mysqli_connect("localhost", "root", "", "iot");
    $query = "INSERT INTO dht_sensor (temperature, humidity) VALUES ('$temperature', '$humidity')";
    mysqli_query($conn, $query);
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <style>
    html {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }
    .form-container {
      width: 350px;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(142, 142, 142, 0.1);
      text-align: center;
      
    }
    h2 {
      font-size: 22px;
      margin-bottom: 20px;

    }
    .button-container {
      text-align: center;
      margin-top: 30px;
    }
    .button {
      background-color: rgb(27, 132, 153);
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 8px;
      cursor: pointer;
    }
    .link-button {
      text-decoration: none;
      color: white;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Data Stored</h2>
    <p>Data has been stored successfully.</p>
    <div class="button-container">
      <a href="index.php" class="button link-button">Back to Form</a>
    </div>
  </div>
</body>
</html>



