<?php
include 'remainingseats.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="regpage.css">
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

            <form action="regfunction.php" method="POST">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" required>

                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email" required>

                <label for="timeSlot">Time Slot:</label>
                <select id="timeSlot" name="timeSlot" required>
                    <option value="">Please select a time slot</option>
                    <option value="1" data-remaining-seats="<?php echo $remainingSeats['1']; ?>">10:00am - 12:00pm (<?php echo $remainingSeats['1']; ?> seats remaining)</option>
                    <option value="2" data-remaining-seats="<?php echo $remainingSeats['2']; ?>">1:00pm - 3:00pm (<?php echo $remainingSeats['2']; ?> seats remaining)</option>
                    <option value="3" data-remaining-seats="<?php echo $remainingSeats['3']; ?>">4:00pm - 6:00pm (<?php echo $remainingSeats['3']; ?> seats remaining)</option>
                    <option value="4" data-remaining-seats="<?php echo $remainingSeats['4']; ?>">7:00pm - 9:00pm (<?php echo $remainingSeats['4']; ?> seats remaining)</option>
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

    <!-- <script src="regpage.js"></script> -->
</body>

</html>