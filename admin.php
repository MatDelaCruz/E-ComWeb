<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    
    <link href="css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
</head>
<center>
<body background="Photos/food.jpg">
    <h1>Admin Panel</h1>
    <h3> Registered Client </h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th>Date</th>
            <th>Time</th>
           
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
        $sql = "SELECT * FROM register";
        $result = mysqli_query($conn, $sql);

        // Display the fetched data in HTML table rows
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Type'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['Time'] . "</td>";
                
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </table>
    <th><a href="concern.php">Concerns</a></th>
    </center>
</body>
</html>
