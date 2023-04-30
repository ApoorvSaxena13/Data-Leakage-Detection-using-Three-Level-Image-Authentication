<?php
// Start a session for error reporting
session_start();
// Call our connection file
require("includes/conn.php");



// Get our POSTed variables
$uname = $_POST['uname'];
$uid = $_POST['uid'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$_SESSION['uname'] = $_POST['uname'];


$uname = mysqli_real_escape_string($conn, $uname);
$uid = mysqli_real_escape_string($conn, $uid);


// NOTE: This is where a lot of people make mistakes.
// We are *not* putting the pass into the database; we are putting a reference to the file's location on the server
$sql = "insert into register ( username, userid, password, emailid) values ('$uname', '$uid','$pass', '$email')";
$result = mysqli_query($conn, $sql) or die("Could not insert data into DB: " . mysqli_error($conn));
$sql = "insert into leaker ( id, name, probability) values ('$uid', '$uname', 0.0)";
$result = mysqli_query($conn, $sql) or die("Could not insert data into DB: " . mysqli_error($conn));
// header("Location:userlogin.php");
// header("Location:register1.php");
header("Location: register2.php");



exit();
