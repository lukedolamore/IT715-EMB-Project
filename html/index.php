
<!DOCTYPE html>
<html>
<head>
<meta content='width=device-width, initial-scale=1' name="viewport" charset="utf-8" />
<title>Luke RPI Data</title>
<style>
		table {
			border-collapse: collapse;
			width: 100%;
			color: #588c7e;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
			}
		th {
			background-color: #588c7e;
			color: white;
			}
		tr:nth-child(even) {background-color: #f2f2f2}
		* {
		  box-sizing: border-box;
		}
		
		body {
		  font-family: Arial, Helvetica, sans-serif;
		}
		
		/* Style the header */
		header {
		  background-color: #666;
		  padding: 30px;
		  text-align: center;
		  font-size: 35px;
		  color: white;
		}
		
		/* Create two columns/boxes that floats next to each other */
		nav {
		  float: left;
		  width: 30%;
		  background: #ccc;
		  padding: 20px;
		}
		
		/* Style the list inside the menu */
		nav ul {
		  list-style-type: none;
		  padding: 0;
		}
		
		article {
		  float: left;
		  padding: 20px;
		  width: 70%;
		  background-color: #f1f1f1;
		}
		
		/* Clear floats after the columns */
		section:after {
		  content: "";
		  display: table;
		  clear: both;
		}
		
		/* Style the footer */
		footer {
		  background-color: #777;
		  padding: 10px;
		  text-align: center;
		  color: white;
		}
	
		
	</style>
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
		
	<article>
	<h1>Sense Data Table</h1>
	<table>
			<tr>
				<th>Date & Time</th>
				<th>Temperature</th>
				<th>Humidity</th>
				<th>Pressure</th>
			</tr>
			<?php
$conn = mysqli_connect("localhost", "root", "", "sensor_data");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * from sense_data";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["dt"]. "</td><td>" . $row["temperature"] . "</td><td>"
. $row["humidity"]. "</td><td>" . $row["pressure"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>

	</article>
</section>
</body>
</html>