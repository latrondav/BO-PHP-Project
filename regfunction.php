<?php
    // Import the dbconnection.php file
    require_once('dbconnection.php');
    include 'remainingseats.php';

    // Retrieve the form data sent using POST
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $timeSlot = $_POST['timeSlot'];

    // Create a database connection
    $conn = createConnection();

    // Prepare the SQL statement to insert the form data into the database
    $stmt = $conn->prepare("INSERT INTO regtable (firstName, lastName, studentID, email, timeSlot) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $studentID, $email, $timeSlot);

    // Execute the SQL statement
    $success = $stmt->execute();

    // Close the database connection
    $stmt->close();
    $conn->close();

    // Send a response back to the client
    // Set the appropriate message and CSS class based on the result of the registration
    if ($success) {
        // Update remaining seats
        $remainingSeats[$_POST['timeSlot']] -= 1;
        $configString = "<?php\n\n\$remainingSeats = " . var_export($remainingSeats, true) . ";\n\n?>";
        file_put_contents('remainingseats.php', $configString);

        $message = "Registration successful";
        $cssClass = "success";
    } else {
        $message = "Registration failed";
        $cssClass = "error";
    }
    // Redirect back to regpage.php with the message and CSS class as URL parameters
    header("Location: regpage.php?message=$message&class=$cssClass");
    exit;

?>