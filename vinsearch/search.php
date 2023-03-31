<html>
<head>
    <title>VIN Search Tool</title>
</head>
<body>
    <form action="search.php" method="POST">
        <label for="vin">Enter VIN:</label>
        <input type="text" id="vin" name="vin">
        <input type="submit" value="Search">
    </form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the VIN from the form submission
    $vin = $_POST['vin'];

    // Connect to the MySQL database
    $host = '158.120.255.100';
    $username = 'root';
    $password = 'ashish';
    $database = 'vehicle_inventory';
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    // Construct the SQL query
    $query = "SELECT * FROM vehicle_listings WHERE vin = '$vin'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there are any matching results
    if (mysqli_num_rows($result) > 0) {
        // Output the results in a table
        echo '<table>';
        $query = "SELECT * FROM vehicle_listings WHERE vin = '$vin'";
    }
    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if there are any matching results
    if (mysqli_num_rows($result) > 0) {
        // Output the results in a table
        echo '<table>';
        echo '<tr><th>Make</th><th>Model</th><th>Year</th><th>Price</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>VIN:</td><td>".$row["vin"]."</td>";
            echo "<td>Make:</td><td>".$row["make"]."</td>";
            echo "<td>Model:</td><td>".$row["model"]."</td>";
            echo "<td>Year:</td><td>".$row["year"]."</td>";
            echo "<td>Price:</td><td>".$row["price"]."</td>";
            echo "<td>Miles:</td><td>".$row["miles"]."</td>";
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo 'No matching results found.';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
