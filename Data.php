<!DOCTYPE html>
<html>
<head>
    <title>Seller's Panel</title>
    
    <link href="css/data.css" rel="stylesheet">
    <link rel="stylesheet" href="css/data.css">
</head>
<center>
<body background="Photos/food.jpg">
    <h1>Panel Orders</h1>
    <h3><a href="login_form.php">LOGOUT</a></h3>
    <table>
        <tr>
            <th>OrderID</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Coordinates</th>
            <th>Mode of Payment</th>
            <th>Phone Number</th>
            <th>Food</th>
            <th>Date & Time</th>
            
        </tr>
        <?php
        // Connect to the database (replace with your own details)
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "food";

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Fetch data from the database (replace with your own query)
        $sql = "SELECT * FROM order_form";
        $result = mysqli_query($conn, $sql);

        // Display the fetched data in HTML table rows
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['order_id'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['City'] . "</td>";
                echo "<td>" . $row['Coordinates'] . "</td>";
                echo "<td>" . $row['Payment'] . "</td>";
                echo "<td>" . $row['Phone_Number'] . "</td>";
                echo "<td>" . $row['Food'] . "</td>";
                echo "<td>" . $row['Date_Time'] . "</td>";
                
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </table>
    </center>
    <center>
    <form id="search-form">
        <input type="text" id="coordinates" placeholder="Enter coordinates (latitude, longitude)" required>
        <input type="submit" value="Search">
    </form>
</center>

<script>
    // JavaScript code
    document.getElementById("search-form").addEventListener("submit", function(event) {
        event.preventDefault();

        var coordinates = document.getElementById("coordinates").value;
        var trimmedCoordinates = coordinates.trim();

        if (isValidCoordinates(trimmedCoordinates)) {
            var url = "https://www.google.com/maps/search/" + encodeURIComponent(trimmedCoordinates);
            window.open(url);
        } else {
            alert("Invalid coordinates. Please enter in the format: latitude, longitude");
        }
    });

    function isValidCoordinates(coordinates) {
        var pattern = /^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/;
        return pattern.test(coordinates);
    }
</script>

</body>
</html>
