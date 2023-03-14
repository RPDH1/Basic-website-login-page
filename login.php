<?php

// Initialize the session
session_start();

// Include the database connection file
require_once 'db_connect.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Prepare and execute the SQL query to retrieve the user with the given username and password
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($id, $username, $password);
    $stmt->fetch();
    
    // Check if the user was found
    if ($id) {
        
        // Set the session variables to remember the user
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        
        // Redirect to the dashboard page
        header('Location: dashboard.html');
        exit;
        
    } else {
        
        // Display an error message
        $error_message = "Invalid username or password.";
    }
}

?>
