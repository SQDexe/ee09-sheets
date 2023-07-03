<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<title>Wędkujemy</title>
		<link rel="stylesheet" href="style_1.css">
	</head>
	<body>
		<div class="baner">
			<h1>Portal dla wędkarzy</h1>
		</div>
		<div class="lewy">
			<h2>Ryby drapieżne naszych wód</h2><br>
			<ul>
			<?php
				$db = mysqli_connect("localhost", "root", "", "wedkowanie");
				$query = mysqli_query($db, "SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;");
				while ($row = mysqli_fetch_row($query)) echo "<li>$row[0], wystepowanie: $row[1]</li>";
			?>
			</ul>
		</div>
		<div class="prawy">
			<img src="ryba1.jpg" alt="Sum"><br>
			<a href="kwerendy.txt" download>Pobierz kwerendy</a>
		</div>
		<footer>
			<p>Stronę wykonał: 2137420690</p>
		</footer>
	</body>
</html>