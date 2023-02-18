<?php
    // Function to create a MySQL database connection
    function createConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "BOdb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("CONNECTION FAILED: " . $conn->connect_error);
        }
        echo "CONNECTION SUCCESSFUL";
        return $conn;
    }

?>