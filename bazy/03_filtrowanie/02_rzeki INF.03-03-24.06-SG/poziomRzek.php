<?php
$link = new mysqli ('localhost','root','','5e_2_rzeki');

$water_level = $_POST['water_level'] ?? NULL ;
// var_dump($water_level);
if ($water_level=='warning'){
    $sql="SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
FROM wodowskazy
    JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id
WHERE dataPomiaru = '2022-05-05' AND stanWody > stanOstrzegawczy;";
}
else if ($water_level=='alarm'){
    $sql="SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
FROM wodowskazy
    JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id
WHERE dataPomiaru = '2022-05-05' AND stanWody > stanAlarmowy;";
}
else {
    $sql = "SELECT nazwa, rzeka, stanOstrzegawczy, stanAlarmowy, stanWody
FROM wodowskazy
    JOIN pomiary ON wodowskazy.id=pomiary.wodowskazy_id
WHERE dataPomiaru = '2022-05-05';";
}
$result = $link -> query($sql);
$levels = $result -> fetch_all(1); 


?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

    <header>
        <section class="left_h">
            <img src="obraz1.png" alt="Mapa Polski">
        </section>

        <section class="right_h">
            <h1>Rzeki w województwie dolnośląskim</h1>
        </section>
    </header>

    <nav>
        <form action="" method="post">
        
            <input type="radio" name="water_level" id="all" value="all">
            <label for="all">wszystkie</label>
            <input type="radio" name="water_level" id="warning" value="warning">
            <label for="warning">Ponad stan ostrzegawczy</label>
            <input type="radio" name="water_level" id="alarm" value="alarm">
            <label for="alarm">Ponad stan alarmowy</label>
            <button>Pokaż</button>
        </form>
    </nav>

    <main>
        <section class="left_m">
            <h3>Stany na dzień 2022-05-05</h3>
            <table>
                <tr>
                    <th>Wodomierz</th>
                    <th>Rzeka</th>
                    <th>Ostrzegawczy</th>
                    <th>Alarmowy</th>
                    <th>Aktualny</th>
                </tr>
                <!-- skrypt -->
                <?php
                echo 
                ?>

            </table>
        </section>

        <section class="right_m">
            <h3>Informacje</h3>
            <ul>
                <li>Brak ostrzeżeń o burzach z gradem</li>
                <li>Smog w mieście Wrocław</li>
                <li>Silny wiatr w Karkonoszach</li>
            </ul>
            
            <h3>Średnie stany wód</h3>
            <!-- skrypt2 -->
                <a href="https://komunikaty.pl">Dowiedz się więcej</a>
                <img src="obraz2.jpg" alt="rzeka">               
        </section>
    </main>

    <footer>
          <p>Stronę wykonał:</p>
    </footer>

</body>
</html>
<?php
$link -> close();
?>