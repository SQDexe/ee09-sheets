<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Twój wskaźnik BMI</title>
        <link rel="stylesheet" href="styl4.css">
    </head>
    <body>
        <div id="banner">
            <h2>Oblicz wskaźnik BMI</h2>
        </div>
        <div id="logo">
            <img src="wzor.png" alt="liczymy BMI">
        </div>
        <div id="left">
            <img src="rys1.png" alt="zrzuć kalorie!">
        </div>
        <div id="right">
            <form action="" method="post">
                <label for="weight">Waga:</label>
                <input type="number" name="weight" min=1 required><br>
                <label for="height">Wzrost [cm]:</label>
                <input type="number" name="height" min=1 required><br>
                <input type="submit" value="Licz BMI i zapisz wynik">
            </form>
            <span>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "egzamin");
                    if (isset($_POST["weight"]) && isset($_POST["height"])) {
                        $weight = $_POST["weight"];
                        $height = $_POST["height"];
                        $bmi = $weight / ($height * $height) * 10000;
                        echo "Twoja waga: $weight; Twój wzrost: $height<br>BMI wynosi: $bmi";
                        $roundbmi = round($bmi);
                        $bmiid = mysqli_fetch_row(mysqli_query($db, "SELECT id FROM bmi WHERE wart_min <= $roundbmi AND $roundbmi <= wart_max;"))[0];
                        $date = date("Y-m-d");
                        mysqli_query($db, "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($bmiid, '$date', $bmi);");
                        }
                ?>
            </span>
        </div>
        <div id="main">
            <table>
                <tr>
                    <th>lp.</th>
                    <th>Interpretacja</th>
                    <th>zaczyna się od...</th>
                </tr>
                <?php
                    $query = mysqli_query($db, "SELECT id, informacja, wart_min FROM bmi;");
                    while ($row = mysqli_fetch_row($query)) {
                        echo <<< EOS
                            <tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                            </tr>
                            EOS;
                        }
                    mysqli_close($db);
                ?>
            </table>
        </div>
        <footer>
            Autor: 213742069
            <a href="kw2.jpg" download>Wynik działania kwerendy 2</a>
        </footer>
    </body>
</html>