
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset="utf-8" />
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
		<h1>Sense Hat</h1>
		<?php
			if (isset($_GET['temp'])){#get the current temperature
			$temp1 = exec('sudo python3 /home/pi/gettemp.py');
			}
			elseif (isset($_GET['data'])){#send a message
			$temp2 = exec('sudo python3 /home/pi/sendMeg.py '.$_GET[data]);
			}			

		?>
		<FORM NAME ="sense" Method="GET">
		Send a Message: <input type="text" name="data" />
		<button name ="send">Send</button><br /><br />
		</form>
		<br>
		<FORM NAME ="getTemp" method="GET">
		<button name="temp">Get Temp</button><br /><br />
		Temperature:<?php echo $temp1;?> &deg;C<br> 
		</form>
	<article>
	

	</article>
</section>
</body>
</html>
