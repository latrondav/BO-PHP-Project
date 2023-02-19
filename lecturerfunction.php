<?php
    // Include the database connection file
    require_once 'dbconnection.php';

    // Create a database connection
    $conn = createConnection();

    // Define the SQL query to retrieve the data
    $sql = "SELECT studentID, firstName, lastName, email, timeSlot FROM regtable ORDER BY timeSlot";

    // Execute the query and get the results
    $result = mysqli_query($conn, $sql);

    // Initialize an array to store the data
    $data = array();

    // Loop through the results and group the data by time slot
    while ($row = mysqli_fetch_assoc($result)) {
        $timeSlot = $row['timeSlot'];
        $name = $row['firstName'] . ' ' . $row['lastName'];
        $email = $row['email'];
        $studentID = $row['studentID'];
        if (!isset($data[$timeSlot])) {
            $data[$timeSlot] = array();
        }
        $data[$timeSlot][] = array('name' => $name, 'email' => $email, 'studentID' => $studentID);
    }

    // Close the database connection
    mysqli_close($conn);
?>