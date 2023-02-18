<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="regpage.css">
</head>

<body>
    <h1>Registration Form</h1>
    <form id="registration-form" action="regfunction.php" method="post">
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
            <option value="1" data-remaining-seats="32">10:00am - 12:00pm (32 seats remaining)</option>
            <option value="2" data-remaining-seats="32">1:00pm - 3:00pm (32 seats remaining)</option>
            <option value="3" data-remaining-seats="32">4:00pm - 6:00pm (32 seats remaining)</option>
            <option value="4" data-remaining-seats="32">7:00pm - 9:00pm (32 seats remaining)</option>
        </select>

        <input type="submit" value="Submit">
    </form>

    <?php if(isset($_GET['message'])): ?>
        <div id="message">
            <?php echo $_GET['message']; ?>
        </div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="regpage.js"></script>
</body>

</html>