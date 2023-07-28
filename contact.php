<?php
// Assuming you have a database setup and a table to store the contact form data
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "battlefield";
// Establish database connection (Replace 'db_username', 'db_password', 'db_name', and 'db_host' with your actual credentials)
$connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare SQL query (Replace 'table_name' with your actual table name)
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

// Execute query
if ($connection->query($sql) === TRUE) {
    // If the query executed successfully, return a 200 HTTP response code
    http_response_code(200);
} else {
    // If an error occurred, return a 500 HTTP response code
    http_response_code(500);
}

// Close the database connection
$connection->close();
