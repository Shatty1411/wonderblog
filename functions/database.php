<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "wondablog";

global $conn;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


/*
echo $adventureID;
$tray = $make_sql["adventureID"] . $make_sql["adventureTitle"];



$sql = "ALTER TABLE Adventures ADD FOREIGN KEY (userID) REFERENCES USERS (userID)";
$run_sql = mysqli_query($conn, $sql);

if ($run_sql) {
    echo "foreign key successfully added";
};*/