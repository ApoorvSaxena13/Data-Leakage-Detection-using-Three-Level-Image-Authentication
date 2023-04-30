<?php
session_start(); //Start the session

if (!isset($_SESSION['name'])) {
	echo "Please Login";
	//$_SESSION['error'] = "Please Login First";
	echo "<script type=\"text/javascript\">" . " alert('Please Login'); " . "</script>";
}
if (!$_SESSION['name']) {
	echo  header("Location: http://localhost/data-leakage-detection/adminlogin.php");
} else {

	define('ADMIN', $_SESSION['name']); //Get the user name from the previously registered super global variable
	//if(!session_is_registered("admin")){ //If session not registered
	//header("location:login.php"); // Redirect to login.php page
	//}
	//else //Continue to current page
	header('Content-Type: text/html; charset=utf-8');
	include 'config.php';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Three Level Image Authentication</title>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="stylesheet.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="body">
	<?php
	if (!empty($_POST)) {
		$con = mysqli_connect("localhost", "root", "");
		if (!$con)
			echo ('Could not connect: ' . mysqli_error($con));
		else {
			if (file_exists("download/" . $_FILES["file"]["name"])) {
				echo '<script language="javascript">alert(" Sorry!! Filename Already Exists...")</script>';
			} else {
				move_uploaded_file(
					$_FILES["file"]["tmp_name"],
					"download/" . $_FILES["file"]["name"]
				);
				mysqli_select_db($con, "dataleakage");
				$sql = "INSERT INTO presentation(subject,topic,fname,time) VALUES ('" . $_POST["sub"] . "','" . $_POST["pre"] . "','" .
					$_FILES["file"]["name"] . "','" . date("d/m/Y") . "');";
				if (!mysqli_query($con, $sql))
					echo ('Error : ' . mysqli_error($con));
				else
					echo '<script language="javascript">alert("Thank You!! File Uploded")</script>';
			}
		}
		mysqli_close($con);
	}
	?>

	</head>

	<body>
		<header class="mainHeader">
			<nav>
				<ul>

					<li><a href="admin.php">Home</a></li>
					<li class="active"><a href="upload.php">Upload Article</a></li>
					<li><a href="view file.php">View File</a></li>
					<li><a href="leakfile.php">Leak User</a></li>
					<li><a href="sendkey.php">SendKey</a></li>


				</ul>
			</nav>
		</header>

		<div class="mainContent1">
			<div class="content">
				<article class="topcontent1">
					<header>
						<h2><a href="#" rel="bookmark" title="Permalink to this POST TITLE"> Upload Article</a></h2>
					</header>

					<footer>
						<p class="post-info">Upload the latest article. </p>
					</footer>

					<content>
						<p>



						<form id="form3" enctype="multipart/form-data" method="post" action="upload.php">
							<table width="552" height="200" style="border-radius: 10px; box-shadow: 0 0 2px 2px #888;
            	font-family:'Comic Sans MS';font-size: 14px;">



								<tr>
									<td> <label for="sub">Subject: </label> </td>
									<td> <input type="text" name="sub" id="sub" /> </td>
								</tr>
								<tr>
									<td valign="top" align="left">Key:</td>
									<td valign="top" align="left"><input type="text" name="pre" cols="50" rows="10" id="pre"></textarea></td>
								</tr>
								<tr>
									<td><label for="file">File:</label></td>
									<td><input type="file" name="file" id="file" /></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" name="upload" id="upload" value="Upload File" /></td>
								</tr>
							</table>
						</form>

			</div>
			<aside class="top-sidebar">
				<article>
					<h2>Welcome: <?php echo $_SESSION['name']/*Echo the username */ ?></h2>
					<li><a href="logout.php">Logout</a></li>

					<p> <?php {
							$row = "";
							$con = mysqli_connect("localhost", "root", "");
							if (!$con)
								echo ('Could not connect: ' . mysqli_error($con));
							else {
								mysqli_select_db($con, "dataleakage");
								$sql = 'SELECT * FROM register';
								$retval = mysqli_query($con, $sql);
								if (!$retval) {
									die('Could not get data: ' . mysqli_error($con));
								}
								while ($row = mysqli_fetch_assoc($retval)) {
									echo " UserName: {$row['username']} " .

										"<hr><br>";
								}
							}
							mysqli_close($con);
						}
						?> </p>
				</article>
			</aside>
		</div>


		</div>

		<footer class="mainFooter">
			<p></p>
		</footer>

	</body>

</html>