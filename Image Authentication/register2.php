<!DOCTYPE html>
<html>

<head>
    <title>Sequence Registration</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            margin: 20px;
        }

        .dot {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 10px;
            cursor: pointer;
        }

        .red-dot {
            background-color: red;
        }

        .green-dot {
            background-color: green;
        }

        .blue-dot {
            background-color: blue;
        }

        .submit-button {
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Sequence Registration</h1>
    <form method="POST" action="register2.php">
        <input type="hidden" name="uname" value="<?php echo $uname; ?>">
        <div class="container">
            <div class="dot red-dot" onclick="selectDot('red')"></div>
            <div class="dot green-dot" onclick="selectDot('green')"></div>
            <div class="dot blue-dot" onclick="selectDot('blue')"></div>
        </div>
        <input type="hidden" id="sequence" name="sequence">
        <button type="submit" class="submit-button">Register</button>
    </form>

    <script>
        var selectedDots = [];

        function selectDot(color) {
            if (selectedDots.includes(color)) {
                selectedDots = selectedDots.filter(function(item) {
                    return item !== color;
                });
            } else {
                selectedDots.push(color);
            }
            document.getElementById('sequence').value = selectedDots.join(',');
        }
    </script>
</body>

</html>
<?php

session_start();
require("includes/conn.php");

// Get the username and selected color sequence from the form data
// if (!isset($_POST['username']) || !isset($_POST['color-sequence']) || empty($_POST['username']) || empty($_POST['color-sequence'])) {
//     die('Invalid input');
// }
if (!isset($_SESSION['uname'])) {
    // redirect the user back to the registration form if the username is not set in the session
    header("Location: register2.php");
    exit();
}

// Get the selected colout sequence from the form data
if (!isset($_POST['sequence']) || empty($_POST['sequence'])) {
    die('');
}

// $username = mysqli_real_escape_string($conn, $_POST['username']);
$uname = $_SESSION['uname'];
$colorSequence = mysqli_real_escape_string($conn, $_POST['sequence']);

// Insert the data into the table
$sql = "INSERT INTO user_color_sequence (user_name, color_sequence) VALUES ('$uname', '$colorSequence')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Registration successful!";
} else {
    echo "Error: " . mysqli_error($conn);
}
unset($_SESSION['username']);
mysqli_close($conn);
header("Location: register1.php");

?>