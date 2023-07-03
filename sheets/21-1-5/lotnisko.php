<?php
    setcookie("visted", "", time() + 60 * 60 * 2);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Port Lotniczy</title>
        <link rel="stylesheet" href="styl5.css">
    </head>
    <body>
        <div id="banner-first">
            <img src="zad5.png" alt="logo lotnisko">
        </div>
        <div id="banner-second">
            <h1>Przyloty</h1>
        </div>
        <div id="banner-third">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt" target="_blank">Pobierz...</a>
        </div>
        <div id="main">
            <table>
                <tr>
                    <th>czas</th>
                    <th>kierunek</th>
                    <th>numer rejsu</th>
                    <th>status</th>
                </tr>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "egzamin");
                    $query = mysqli_query($db, "SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;");
                    while ($row = mysqli_fetch_row($query)) echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
                    mysqli_close($db);
                ?>
            </table>
        </div>
        <footer id="footer-first">
            <p>
                <?php
                    if (isset($_COOKIE["visted"])) echo "Witaj ponownie na stronie lotniska";
                    else echo "Dzień dobry! Strona lotniska używa ciasteczek";
                ?>
            </p>
        </footer>
        <footer id="footer-second">Autor: 213742069</footer>
    </body>
</html>