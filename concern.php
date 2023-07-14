<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    
    <link href="css/concern.css" rel="stylesheet">
    <link rel="stylesheet" href="css/concern.css">
</head>
<center>
<body background="Photos/food.jpg">
    <h1>Admin Panel</h1>
    <h3> Registered Client </h3>
    <table>
        <tr>
            <th>Type_Query</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone_Number</th>
            <th>Message</th>
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
        $sql = "SELECT * FROM contact_form";
        $result = mysqli_query($conn, $sql);

        // Display the fetched data in HTML table rows
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Type_Query'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Phone_Number'] . "</td>";
                echo "<td>" . $row['Message'] . "</td>";
                echo "<td>" . $row['Date_Time'] . "</td>";
                
                
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </table>
    <th><a href="admin.php">Registered Client</a></th>
    </center>
</body>
</html>
