<!DOCTYPE html>
<html>

<head>
    <title>Image Sequence Registration</title>
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            margin: 20px;
        }

        .container img {
            width: 100%;
            height: auto;
            cursor: pointer;
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
    <h1>Image Sequence Registration</h1>
    <form method="POST" action="register1.php">
        <input type="hidden" name="uname" value="<?php echo $uname; ?>">
        <div class="container">
            <img src="image1.jpg" alt="Image 1" onclick="selectImage(this)">
            <img src="image2.jpg" alt="Image 2" onclick="selectImage(this)">
            <img src="image3.jpg" alt="Image 3" onclick="selectImage(this)">
            <img src="image4.jpg" alt="Image 4" onclick="selectImage(this)">
            <img src="image5.jpg" alt="Image 5" onclick="selectImage(this)">
            <img src="image6.jpg" alt="Image 6" onclick="selectImage(this)">
            <img src="image7.jpg" alt="Image 7" onclick="selectImage(this)">
            <img src="image8.jpg" alt="Image 8" onclick="selectImage(this)">
            <img src="image9.jpg" alt="Image 9" onclick="selectImage(this)">
        </div>
        <input type="hidden" id="image-sequence" name="image-sequence">
        <button type="submit" class="submit-button">Register</button>
    </form>

    <script>
        var selectedImages = [];

        function selectImage(img) {
            if (selectedImages.includes(img.alt)) {
                selectedImages = selectedImages.filter(function(item) {
                    return item !== img.alt;
                });
                img.style.border = '';
            } else {
                selectedImages.push(img.alt);
                img.style.border = '2px solid #007bff';
            }
            document.getElementById('image-sequence').value = selectedImages.join(',');
        }
    </script>
</body>

</html>

<?php

session_start();
require("includes/conn.php");

// Get the username from the session or form data
if (!isset($_SESSION['uname'])) {
    // redirect the user back to the registration form if the username is not set in the session
    header("Location: register1.php");
    exit();
}

// Get the selected image sequence from the form data
if (!isset($_POST['image-sequence']) || empty($_POST['image-sequence'])) {
    die('');
}

// use the username from the session to insert the image authentication data
$uname = $_SESSION['uname'];
$imageSequence = mysqli_real_escape_string($conn, $_POST['image-sequence']);

// Insert the data into the table
$sql = "INSERT INTO image_authentication (user_name, image_sequence) VALUES ('$uname', '$imageSequence')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Image sequence registration successful!";
} else {
    echo "Error: " . mysqli_error($conn);
}
// clear the username from the session after the data is inserted
unset($_SESSION['username']);
mysqli_close($conn);
header("Location:userlogin.php");
?>