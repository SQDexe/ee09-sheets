<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <div id="banner">
            <h2>Światowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </div>
        <div id="matches">
            <?php
                $db = mysqli_connect("localhost", "root", "", "egzamin");
                $query = mysqli_query($db, "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG';");
                while ($row = mysqli_fetch_row($query)) {
                    echo <<< EOS
                        <div class="match-block">
                            <h3>$row[0] - $row[1]</h3>
                            <h4>$row[2]</h4>
                            <p>w  dniu: $row[3]</p>
                        </div>
                        EOS;
                    }
                mysqli_close($db);
            ?>
        </div>
        <div id="main">
            <h2>Reprezentacja Polski</h2>
        </div>
        <div id="left-block">
            <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
            <form action="" method="post">
                <input type="number" name="number" min=1 max=4 step=1 required>
                <input type="submit" value="Sprawdż">
            </form>
            <ul>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "egzamin");
                    if (isset($_POST["number"])) {       
                        $number = $_POST["number"]; 
                        $query = mysqli_query($db, "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $number;");
                        while ($row = mysqli_fetch_row($query)) echo "<li>$row[0] $row[1]</li>";
                        }
                    mysqli_close($db);
                ?>
            </ul>
        </div>
        <div id="right-block">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: 213742069</p>
        </div>
    </body> 
</html>