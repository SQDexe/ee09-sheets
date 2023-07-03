<?php
    $db = mysqli_connect("localhost", "root", "", "wedkarstwo");
    $lowsikoId = $_POST["lowisko-id"];
    $data = $_POST["data"];
    $sedzia = $_POST["sedzia"];
    mysqli_query($db, "INSERT INTO zawody_wedkarskie (Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia) VALUES (0, '$lowsikoId', '$data', '$sedzia');");
    mysqli_close($db);
?>