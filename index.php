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
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(142, 142, 142, 0.1);
    }
    h2 {
      font-size: 22px;
      margin-bottom: 20px;
    }
    .icon {
      font-size: 24px;
      margin-right: 10px;
    }
    .input-container {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }
    .input-field {
      flex: auto;
      padding: 6px 10px;
      border: 1px solid #313131;
      border-radius: 8px;
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
      font-size: 15px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Temperature and Humidity Data</h2>
    <form action="store_data.php" method="get">
      <div class="input-container">
        <i class="fas fa-thermometer-half icon" style="color: #c71585;"></i>
        <input type="number" id="temperature" name="temperature" step="0" class="input-field" placeholder="Temperature (&deg;C)" required>
      </div>
      <div class="input-container">
        <i class="fas fa-tint icon" style="color: rgb(13, 180, 180)"></i>
        <input type="number" id="humidity" name="humidity" step="0" class="input-field" placeholder="Humidity (%)" required>
      </div>
      <div class="button-container">
        <button type="submit" name="submit" class="button">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
