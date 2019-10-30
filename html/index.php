<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta content='width=device-width, initial-scale=1' name="viewport" charset="utf-8" />
<title>Luke RPI Data</title>
</head>
<body>
<header>
<h2>Luke RPI Sense Data</h2>
</header>
<section>
	<nav>
		<ul>
		<li><a href="index.php">Home Page</a></li>
		<li><a href="hat.php">Sense Hat</a></li>
		</nav>		
	<h1>Sense Data Table</h1>
	<div style="overflow-x:auto;">
	<table class="center">
			<tr>
				<th>Date & Time</th>
				<th>Temperature</th>
				<th>Humidity</th>
				<th>Pressure</th>
			</tr>
<?php $conn = mysqli_connect("localhost", "root", "", "sensor_data");
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error); }
	$sql = "SELECT * from sense_data";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	echo "<tr><td>" . $row["dt"]. "</td><td>" . $row["temperature"] . "</td><td>"
	. $row["humidity"]. "</td><td>" . $row["pressure"] . "</td></tr>"; }	
	echo "</table>";
	} else { echo "0 results"; }
	$conn->close(); ?>
	</table>
	</div>
</section>
</body>
</html>
