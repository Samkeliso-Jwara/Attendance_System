<?php
date_default_timezone_set('Africa/Johannesburg');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "att_system";

// connection creation
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$id_number = $_POST['id_number'];
$group = $_POST['group'];

$att_date = date("Y-m-d H:i:s");

$signature = isset($_POST['signature-pad']) ? $_POST['signature-pad'] : null;
$encodedSignature = base64_encode($signature);

$sql = $conn->prepare("INSERT INTO att_records (name, surname, id_number, group_name, att_date, signature) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss", $name, $surname, $id_number, $group, $att_date, $encodedSignature);

if ($sql->execute()) {
    echo '<div style="background-color: #dff0d8; color: #3c763d; border: 1px solid #3c763d; padding: 10px; margin-bottom: 15px;">';
    echo '<h2>Attendance marked successfully!</h2>';
    echo '</div>';} else {
    echo "Error: " . $sql->error;
}

$sql->close();
$conn->close();
?>
