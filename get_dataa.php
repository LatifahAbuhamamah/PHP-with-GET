<?php
$conn = mysqli_connect("localhost", "root", '', "iot");

if (mysqli_connect_errno()) {
    die('Unable to connect to database ' . mysqli_connect_error());
}

header("Access-Control-Allow-Origin: *");
$qry = $conn->prepare("SELECT * FROM dht_sensor ORDER BY ID DESC LIMIT 1");

$qry->execute();
$qry->bind_result($id, $temperature, $humidity, $createdat);

while ($qry->fetch()) {
    $temp_temperature = $temperature;
    $temp_humidity = $humidity;
    $temp_createdat = $createdat;
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
    .data-container {
      width: 300px;
      padding: 30px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(142, 142, 142, 0.1);
      text-align:center ;
    }
    .data-label {
      font-size: 18px;
      margin-bottom: 10px;
    }
    .data-value {
      font-size: 24px;
      color: teal;
      margin-bottom: 20px;
    }
    .button-container {
      text-align: center;
      margin-top: 20px;
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
    .icon {
      font-size: 24px;
      margin-right: 10px;
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="data-container">
    <div class="data-label"><i class="fas fa-thermometer-half icon" style="color: #c71585;"></i> Temperature:</div>
    <div class="data-value"><?php echo $temp_temperature; ?>&deg; C</div>
    <div class="data-label"><i class="fas fa-tint icon" style="color: rgb(13, 180, 180)"></i> Humidity:</div>
    <div class="data-value"><?php echo $temp_humidity; ?>&percnt;</div>
    <div class="data-label"><i class="far fa-clock icon" style="color: #333;"></i> Created at:</div>
    <div class="data-value"><?php echo $temp_createdat; ?></div>
    <div class="button-container">
      <a href="index.php" class="button link-button">Back to Form</a>
    </div>
  </div>
</body>
</html>
