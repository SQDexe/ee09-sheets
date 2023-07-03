<?php
        setcookie("visted", 0, time() + 60 * 60);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Odloty samolotów</title>
        <link rel="stylesheet" href="styl6.css">
    </head>
    <body>
        <div id="banner-first">
            <h2>Odloty z lotniska</h2>
        </div>
        <div id="banner-second">
            <img src="zad6.png" alt="logotyp">
        </div>
        <div id="main">
            <table>
                <tr>
                    <th>lp.</th>
                    <th>numer rejsu</th>
                    <th>czas</th>
                    <th>kierunek</th>
                    <th>status</th>
                </tr>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "egzamin");
                    $query = mysqli_query($db, "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC;");
                    while ($row = mysqli_fetch_row($query)) echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
                    mysqli_close($db);
                ?>
            </table>
        </div>
        <div id="footer-first">
            <a href="kw1.jpg" target="_blank">Pobierz obraz</a>
        </div>
        <div id="footer-second">
            <p>
                <?php
                    if (isset($_COOKIE["visted"])) echo "Miło nam, że nas znowu odwiedziłeś";
                    else echo "Dzień dobry! Sprawdź regulamin naszej strony";
                ?>
            </p>
        </div>
        <div id="footer-third">Autor: 213742096</div>
    </body>
</html>