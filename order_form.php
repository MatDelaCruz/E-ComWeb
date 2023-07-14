<!DOCTYPE html>
<html>
<head>
    <title>Order</title>
    <link href="css/order_form.css" rel="stylesheet">
    <link rel="stylesheet" href="css/order_form.css">
</head>
<body background="Photos/food.jpg">
    <div class="format">
        <center>
            <h1>Thank You</h1>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "food");

            if ($conn === false) {
                die("INVALID " . mysqli_connect_error());
            }

            $Name = $_REQUEST['name'];
            $Address = $_REQUEST['address'];
            $City = $_REQUEST['city'];
            $Coordinates = $_REQUEST['cord'];
            $Payment = $_REQUEST['payment'];
            $Number = $_REQUEST['number'];
            $Food = $_REQUEST['food_select'];
            $Date_Time = $_REQUEST['date_time'];

            $sql = "INSERT INTO order_form (name, address, city, coordinates, payment, phone_number, food, date_time) VALUES ('$Name', '$Address', '$City', '$Coordinates', '$Payment', '$Number', '$Food', '$Date_Time')";

            if (mysqli_query($conn, $sql)) {
                echo "<h2>Submitted to DATABASE</h2>";
            } else {
                echo "INVALID $sql. " . mysqli_error($conn);
            }

            mysqli_close($conn);
            ?>

            <button type="submit"><a href="Homepage.html">Home</a></button>
        </center>
    </div>
</body>
</html>
