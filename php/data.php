<!DOCTYPE html>
<html>
<head>
    <title>Retrieved Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Retrieved Data</h1>

    <?php
    // Your database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "att_system";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select data from the database and order by 'att_date'
    $sql = "SELECT * FROM att_records ORDER BY att_date";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>#</th><th>Name</th><th>Surname</th><th>ID Number</th><th>Group Name</th><th>Attendance Date</th><th>Signature</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id"] . '</td>';
            echo '<td>' . $row["name"] . '</td>';
            echo '<td>' . $row["surname"] . '</td>';
            echo '<td>' . $row["id_number"] . '</td>';
            echo '<td>' . $row["group_name"] . '</td>';
            echo '<td>' . $row["att_date"] . '</td>';
            echo '<td><a href="data:image/jpeg;base64,' . base64_encode($row["signature"]) . '" download>Download Signature</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
