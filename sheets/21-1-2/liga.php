<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>piłka nożna</title>
        <link rel="stylesheet" href="styl2.css">
    </head>
    <body>
        <div id="banner">
            <h2>Reprezentacja polski w piłce nożnej</h2>
            <img src="obraz1.jpg" alt="reprezentacja">
        </div>
        <div id="left">
            <form action="" method="post">
                <select name="position" id="select">
                    <option value="bramkarz">Bramkarze</option>
                    <option value="obronca">Obrońcy</option>
                    <option value="pomocnik">Pomocnicy</option>
                    <option value="napastnik">Napastnicy</option>
                </select>
                <input type="submit" value="Zobacz">
            </form><br>
            <img src="zad2.png" alt="piłka"><br>
            <p>Autor: 213742069</p>
        </div>
        <div id="right">
            <ol>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "egzamin");
                    if (isset($_POST["position"])) {
                        $pos = $_POST["position"];
                        $query = mysqli_query($db, "SELECT imie, nazwisko FROM zawodnik JOIN pozycja ON zawodnik.pozycja_id = pozycja.id WHERE nazwa = '$pos';");
                        while ($row = mysqli_fetch_row($query)) echo "<li>$row[0] $row[1]</li>";
                        }
                ?>
            </ol>
        </div>
        <div id="main">
            <h3>Liga mistrzów</h3>
        </div>
        <div id="league">
            <?php
                $db = mysqli_connect("localhost", "root", "", "egzamin");
                $query = mysqli_query($db, "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;");
                while ($row = mysqli_fetch_row($query)) {
                    echo <<< EOS
                        <div class="info">
                            <h2>$row[0]</h2>
                            <h1>$row[1]</h1>
                            <p>grupa: $row[2]</p>
                        </div>
                        EOS;
                    }
                mysqli_close($db);
            ?>
        </div>
    </body>
</html>