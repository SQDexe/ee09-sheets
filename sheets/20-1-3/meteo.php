<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prognoza pogody Poznań</title>
        <link rel="stylesheet" href="styl4.css">
    </head>
    <body>
        <div id="banner-right">
            <p>maj, 2019 r.</p>
        </div>
        <div id="banner-middle">
            <h2>Prognoza dla Poznania</h2>
        </div>
        <div id="banner-left">
            <img src="logo.png" alt="prognoza">
        </div>
        <div id="left">
            <a href="kwerendy.txt">Kwerendy</a>
        </div>
        <div id="right">
            <img src="obraz.jpg" alt="Polska, Poznań">
        </div>
        <div id="main">
            <table>
                <tr>
                    <th>Lp.</th>
                    <th>DATA</th>
                    <th>NOC - TEMPERATURA</th>
                    <th>DZIEŃ - TEMPERATURA</th>
                    <th>OPADY [mm/h]</th>
                    <th>CIŚNIENIE [hPa]</th>
                </tr>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "prognoza");
                    $query = mysqli_query($db, "SELECT * FROM pogoda WHERE miasta_id = 2 ORDER BY data_prognozy DESC;");
                    $i = 0;
                    while ($row = mysqli_fetch_row($query)) {
                        $i++;
                        echo "<tr><td>$i</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
                        } 
                    mysqli_close($db);
                ?>
            </table>
        </div>
        <div id="footer">
            <p>Stronę wykonał: 213742069</p>
        </div>
    </body>
</html>