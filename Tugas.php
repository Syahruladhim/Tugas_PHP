<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a new database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS mydatabase";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the created database
$conn->select_db("mydatabase");

// Create a new table
$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert data into the table
$sql_insert_data = "INSERT INTO users (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";
if ($conn->query($sql_insert_data) === TRUE) {
    echo "Data inserted successfully<br>";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Update data in the table
$sql_update_data = "UPDATE users SET lastname='Smith' WHERE id=1";
if ($conn->query($sql_update_data) === TRUE) {
    echo "Data updated successfully<br>";
} else {
    echo "Error updating data: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
