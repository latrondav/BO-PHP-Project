<?php
include 'lecturerfunction.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registered Users by Slot</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            border-collapse: collapse;
            margin: 20px 0;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 40px;
        }

        @media only screen and (max-width: 600px) {
            table {
                font-size: 12px;
            }
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 20px;
            text-decoration: none;
            color: #FFFFFF;
            background-color: #0070C0;
            border-radius: 5px;
            transition: background-color 0.2s ease-in-out;
        }

        .btn:hover {
            background-color: #004EA2;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>Registered Users by Slot</h2>
        <?php foreach ($data as $timeSlot => $users) : ?>
            <h2><?php echo $timeSlot; ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['studentID']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>

        <a href="regpage.php" class="btn">Register for Another Time Slot</a>
    </div>
</body>

</html>