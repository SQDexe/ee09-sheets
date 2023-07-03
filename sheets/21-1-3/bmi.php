<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Twoje BMI</title>
        <link rel="stylesheet" href="styl3.css">
    </head>
    <body>
        <div id="logo">
            <img src="wzor.png" alt="wzór BMI">
        </div>
        <div id="banner">
            <h1>Oblicz sowje BMI</h1>
        </div>
        <div id="main">
            <table>
                <tr>
                    <th>Interpretacja  BMI</th>
                    <th>Wartość  minimalna</th>
                    <th>Wartość maksymalna</th>
                </tr>
                <?php
                    $db = mysqli_connect("localhost", "root", "", "egzamin");
                    $query= mysqli_query($db, "SELECT informacja, wart_min, wart_max FROM bmi;");
                    while ($row = mysqli_fetch_row($query)) {
                        echo "<tr>";
                        for ($i = 0; $i < mysqli_num_fields($query); $i++) echo "<td>$row[$i]</td>";
                        echo "</tr>";
                        }
                ?>
            </table>
        </div>
        <div id="left">
            <h2>Podaj wagę i wzrost</h2>
            <form action="" method="post">
                <label for="weight">Waga</label>
                <input type="number" name="weight" min=1 required><br>
                <label for="height">Wzrost w cm</label>
                <input type="number" name="height" min=1 required><br>
                <input type="submit" value="Oblicz i zapamiętaj">
            </form>
            <span>
                <?php
                    if (isset($_POST["weight"]) && isset($_POST["height"])) {
                        $weight = $_POST["weight"];
                        $height = $_POST["height"];
                        $bmi = $weight / pow($height, 2) * 10000;
                        if ($bmi >= 100) $bmi = 100;
                        echo "Twoja waga: $weight; Twój wzrost: $height<br>BMI wynosi: $bmi";
                        $bmi = round($bmi);
                        $query = mysqli_query($db, "SELECT id FROM bmi WHERE wart_min <= $bmi AND $bmi <= wart_max;");
                        $bmiid = mysqli_fetch_row($query)[0];
                        $date = date("Y-m-d");
                        $query = mysqli_query($db, "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($bmiid, '$date', $bmi);");
                        }
                    mysqli_close($db);
                ?>
            </span>
        </div>
        <div id="right">
            <img src="rys1.png" alt="ćwiczenia">
        </div>
        <footer>
            Autor: 213742069
            <a href="kwerendy.txt" download>Zobacz kwerendy</a>
        </footer>
    </body>
</html>