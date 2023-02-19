<?php
include 'remainingseats.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <!-- <link rel="stylesheet" type="text/css" href="regpage.css"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Styles for the container */
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 2px solid #ccc;
            background-color: #f2f2f2;
        }

        /* Styles for the registration form */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Styles for the message element */
        .message {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 4px;
        }

        .success {
            background-color: #D4EDDA;
            color: #155724;
            border: 1px solid #C3E6CB;
        }

        .error {
            background-color: #F8D7DA;
            color: #721C24;
            border: 1px solid #F5C6CB;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-4"></div>
        <div class="col-4">
            <h1>Registration Form</h1>

            <?php if (isset($_GET['message']) && isset($_GET['class'])) : ?>
                <div id="message" class="<?php echo $_GET['class']; ?>">
                    <?php echo $_GET['message']; ?>
                </div>
            <?php endif; ?>

            <form action="regfunction.php" method="POST" onsubmit="return validateForm()">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" pattern="[0-9]+" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="timeSlot">Time Slot:</label>
                <select id="timeSlot" name="timeSlot" required>
                    <option value="">Please select a time slot</option>
                    <option value="10:00 - 12:00" data-remaining-seats="<?php echo $remainingSeats['10:00 - 12:00']; ?>">10:00 - 12:00 (<?php echo $remainingSeats['10:00 - 12:00']; ?> seats remaining)</option>
                    <option value="13:00 - 15:00" data-remaining-seats="<?php echo $remainingSeats['13:00 - 15:00']; ?>">13:00 - 15:00 (<?php echo $remainingSeats['13:00 - 15:00']; ?> seats remaining)</option>
                    <option value="16:00 - 18:00" data-remaining-seats="<?php echo $remainingSeats['16:00 - 18:00']; ?>">16:00 - 18:00 (<?php echo $remainingSeats['16:00 - 18:00']; ?> seats remaining)</option>
                    <option value="19:00 - 21:00" data-remaining-seats="<?php echo $remainingSeats['19:00 - 21:00']; ?>">19:00 - 21:00 (<?php echo $remainingSeats['19:00 - 21:00']; ?> seats remaining)</option>
                </select>


                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-4"></div>

    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Get the message element
        const message = document.getElementById('message');

        // Display the message
        message.style.display = 'block';

        // Set a timeout to make the message disappear after 5 seconds
        setTimeout(() => {
            message.style.display = 'none';
        }, 5000);
    </script>

    <script>
        // Get the selected option element
        const selectedOption = document.querySelector('#timeSlot option:checked');

        // Decrement the remaining seats
        const remainingSeats = selectedOption.dataset.remainingSeats - 1;
        selectedOption.dataset.remainingSeats = remainingSeats;

        // Update the text of the selected option to reflect the new remaining seats
        selectedOption.text = selectedOption.text.replace(/\d+ seats remaining/, remainingSeats + ' seats remaining');
    </script>

    <script>
        const timeSlot = document.getElementById('timeSlot');
        const options = timeSlot.getElementsByTagName('option');
        for (let i = 1; i < options.length; i++) { // Start at i = 1 to skip the first "Please select a time slot" option
            const remainingSeats = options[i].getAttribute('data-remaining-seats');
            if (remainingSeats === '0') {
                options[i].disabled = true;
            }
        }
    </script>

    <script>
        function validateForm() {
            const firstName = document.getElementById("firstName").value;
            const lastName = document.getElementById("lastName").value;
            const studentID = document.getElementById("studentID").value;
            const email = document.getElementById("email").value;

            if (firstName === "" || lastName === "" || studentID === "" || email === "") {
                alert("Please fill in all required fields");
                return false;
            }
        }
    </script>

    sc

    <!-- <script src="regpage.js"></script> -->
</body>

</html>