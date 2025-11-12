<?php
$link = new mysqli('localhost', 'root', '', '5e_2_przewozy');

$f_task = $_POST['f_task'] ?? NULL;
$f_date = $_POST['f_date'] ?? NULL;

if($f_task && $f_date){
    $sql="INSERT INTO zadania
            (zadanie,data,osoba_id)
            Values
            ('$f_task','$f_date',1);";
    $result=$link->query($sql);
}

$id_task = $_GET['id_task'] ?? NULL;

if($id_task){
    $sql= "DELETE 
            FROM zadania
            WHERE id_zadania = $id_task;";
    $result = $link -> query($sql); 
}


$sql = "SELECT id_zadania,zadanie,data FROM zadania";
$result = $link -> query($sql);
$tasks = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>

    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>

    <main>
        <section class="left">
            <h2>Zadania do wykonania</h2>

            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                <!-- s1 -->
                <?php
                    foreach ($tasks as $t){
                        echo "
                            <tr>
                                <td>{$t['zadanie']}</td>
                                <td>{$t['data']}</td>
                                <td><a href='?id_task={$t['id_zadania']}'>Usuń</a></td>
                            </tr>";
                    }          
                ?>
<!-- 
                 <tr>
                    <td>[zadanie]</td>
                    <td>[data]</td>
                    <td><a href='?id_task=[id_zadania]'>Usuń</a></td>
                 </tr> -->
                <!-- s2 -->

            </table>

            <form action="" method="post">
                <label for="f_task">Zadanie do wykonania:</label>
                <input type="text" name="f_task" id="f_task"><br>
                <label for="f_date">Data realizacji</label>
                <input type="date" name="f_date" id="f_date">
                <button type="submit">Dodaj</button>
            </form>
            
        </section>

        <section class="right">
            <img src="auto.png" alt="auto firmowe">
            <h3>Nasza specjalnosc</h3>
            <ul>
                <li>Przeprowadzki:</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał:0002137</p>
    </footer>
</body>
</html>
<?php
$link -> close();
?>