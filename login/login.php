<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../incl/conn.incl.php';
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT id, name, email, password FROM users WHERE name = 'sajani' || name = 'himani'";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $email, $password);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        if ($pass == $password) {
            $_SESSION['username'] = $name;
            echo "Login successful! Welcome, " . $_SESSION['username'];
            header("Location: /Dairy");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
    $conn->close();
}
