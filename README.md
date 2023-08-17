# PHP-with-GET

**Step 1: Create Data Entry Form (`index.php`)**

This step involves creating a form that allows users to input temperature and humidity data.

```html
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
```
- The HTML structure includes necessary meta tags and stylesheet links for styling and responsiveness.
- Inside the form are input fields for temperature and humidity, each represented by an input element with appropriate attributes like type, id, name, and placeholder.
- A "Submit" button is included at the end of the form to trigger the data submission.

![1](https://github.com/LatifahAbuhamamah/PHP-with-GET/blob/main/Screenshots/1.png)
![2](https://github.com/LatifahAbuhamamah/PHP-with-GET/blob/main/Screenshots/2.png)


**Step 2: Store Data in Database (`store_data.php`)**
This step involves receiving the data from the form submission and storing it in the database.

```php
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
```
- The PHP script checks if the form has been submitted (isset($_GET['submit'])).
- It retrieves the temperature and humidity values from the submitted form data using $_GET['temperature'] and $_GET['humidity'].
- A database connection is established using mysqli_connect().
- A SQL query is constructed to insert the data into the dht_sensor table.
- The mysqli_query() function is used to execute the SQL query and store the data in the database.

![3](https://github.com/LatifahAbuhamamah/PHP-with-GET/blob/main/Screenshots/3.png)
![4](https://github.com/LatifahAbuhamamah/PHP-with-GET/blob/main/Screenshots/4.png)





**Step 3: Display Latest Data (`display_data.php`)**

Explanation: This step involves retrieving the latest data from the database and displaying it.

```php
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

```

- A database connection is established using mysqli_connect().
- A prepared statement is used to retrieve the latest data from the dht_sensor table, ordered by ID in descending order (to get the most recent entry).
- The data is fetched using bind_result() and stored in variables.
- On the web page, the latest temperature, humidity, and creation timestamp are displayed using appropriate HTML elements.
- A link/button is provided to return to the data entry form (index.php)

![5](https://github.com/LatifahAbuhamamah/PHP-with-GET/blob/main/Screenshots/5.png)


