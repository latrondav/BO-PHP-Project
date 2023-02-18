<?php
    // Import the dbconnection.php file
    require_once('dbconnection.php');

    // Retrieve the form data sent using AJAX
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract the form data
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $studentID = $data['studentID'];
    $email = $data['email'];
    $timeSlot = $data['timeSlot'];

    // Create a database connection
    $conn = createConnection();

    // Prepare the SQL statement to insert the form data into the database
    $stmt = $conn->prepare("INSERT INTO regtable (firstName, lastName, studentID, email, timeSlot) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $studentID, $email, $timeSlot);

    // Execute the SQL statement
    $stmt->execute();

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Send a success response back to the client
    echo "success";

?>