
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
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
		<h1>Sense Hat</h1>
		<?php
			if ($_GET){
			$temp = exec('sudo python3 /home/pi/sendMeg.py '.$_GET[data]);
			}
		?>
		<FORM NAME ="sense" Method="GET">
		Send: <input type="text" name="data"/>
		<button name ="sens">Send</button><br /><br />
		Temperature:<?php echo $temp;?> &deg;C<br>
		</form>
	<article>
	

	</article>
</section>
</body>
</html>