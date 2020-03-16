<?PHP
session_start();

?>
		<?php
		
	 $UName=$_SESSION["UName"];	

$servername = "localhost";
$username = "root";

$dbname = "xcompany";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,name,image,UName FROM images where UName='$UName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
$_SESSION["Iid"]= $row["id"];
$_SESSION["Iname"]= $row["name"];
$image= $row["image"];
$_SESSION["IUName"]=$row["UName"];
    				 echo $image;

    }
} else {
    echo "0 results";
}

$conn->close();
		
		?>


<!DOCTYPE html>
<html>

<head>

	<title>xCompany</title>
	<link rel="stylesheet" type="text/css" href="homepage.css">

</head>

<body>

	<section class="sec-index">
	
		<img src="Capture.PNG" alt="xCompany" class="logo-img">

		<div class="right-float">

			<p>Logged in as <u><?php echo $_SESSION["name"]; ?></u> | <a href=""><u>Logout</u></a></p>

		</div>

		<h3>Welcome to xCompany</h3>

		<div class="account">
			
			<p><strong>Account</strong></p>
			
			<ul>

				<li><a href=""><u>Dashboard</u></a></li>
				<li><a href="ViewProfile.php"><u>View Profile</u></a></li>
				<li><a href="ProfileEdit.php"><u>Edit Profile</u><a/></li>
				<li><a href=""><u>Change Profile Picture</u></a></li>
				<li><a href="ChangePass.php"><u>Change Password</u></a></li>
				<li><a href="login.html"><u>Logout</u></a></li>

			</ul>

		</div>

		<div class="vertical-line"></div>

		<div class="welcome-name">


			
			<p><strong>PROFILE</strong><p>
				<ul>
				<li>Name: <?php echo $_SESSION["name"]; ?> </li> 
				<li>Email: <?php echo $_SESSION["email"]; ?> </li>
				<li>Gender: <?php print_r($_SESSION["gender"]); ?></li>
				<li>Date of Birth: <?PHP echo $_SESSION["dob"]; ?> </li>
				
				<?php echo $image ?>
				<img src='<?php echo $image;  ?>' >
				
				<li><a href="editProfile.php">Edit Profile</a></li>
					</ul>

		</div>

		</section>
</body>
</html>


		<p class="copyright">Copyright &copy; 2017<p>

	