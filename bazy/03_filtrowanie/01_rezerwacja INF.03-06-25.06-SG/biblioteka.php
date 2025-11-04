<?php
$link = new mysqli('localhost','root','','5e_2_biblio');

$id_liryc = $_POST['id_liryka'] ?? NULL;
$id_epic = $_POST['id_epika'] ?? NULL;
$id_drama = $_POST['id_dramat'] ?? NULL;

if($id_liryc){
    $sql="SELECT tytul
        FROM ksiazka
        WHERE id='$id_liryc';";
    $result=$link->query($sql);
    $tittle=$result->fetch_array();
    $sql="UPDATE ksiazka
         SET rezerwacja=1
         WHERE id=$id_liryc;";
    $result=$link->query($sql);
}



$sql="SELECT id, tytul
FROM ksiazka
WHERE gatunek = 'liryka';";
$result=$link->query($sql);
$lirics=$result->fetch_all(1);


$sql="SELECT id, tytul
FROM ksiazka
WHERE gatunek = 'epika';";
$result=$link->query($sql);
$epics=$result->fetch_all(1);


$sql="SELECT id, tytul
FROM ksiazka
WHERE gatunek = 'dramat';";
$result=$link->query($sql);
$dramacs=$result->fetch_all(1);



?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <!-- skrypt 1 -->
         <?php
         for ($i=0; $i <20 ; $i++) { 
            echo"<img src='obraz.png' alt=''>";
         }
         ?>
    </header>

    <main>
        <section>
            <h2>Liryka</h2>
            <form action="" method="Post">
                <select name="id_liryka" id="">
                    <!-- skrypt 2 -->
                <?php
                    foreach($lirics as $liric){
                        echo"<option value='{$liric['id']}'>{$liric['tytul']}</option>";
                    }
                ?>
                <!-- <option value=""></option> -->
                </select>
                <button>Rezerwuj</button>
                
                 
            </form>
            <!-- skrypt 3 -->
             <!-- <p></p> -->
             <?php
               if($id_liryc){
                echo"
                <p>{$tittle['tytul']}</p>;
                ";
               }
             ?>
        </section>

        <section>
            <h2>Epika</h2>
            <form action="" method="Post">
                <select name="id_epika" id="">
                    <!-- skrypt 2 -->
                     <?php
                    foreach($epics as $epic){
                        echo"<option value='{$epic['id']}'>{$epic['tytul']}</option>";
                    }
                ?>
                </select>
                <button>Rezerwuj</button>
                <!-- skrypt 3 -->
            </form>
        </section>

        <section>
            <h2>Dramat</h2>
            <form action="" method="Post">
                <select name="id_dramat" id="">
                    <!-- skrypt 2 -->
                     <?php
                    foreach($dramacs as $drama){
                        echo"<option value='{$drama['id']}'>{$drama['tytul']}</option>";
                    }
                ?>
                </select>
                <button>Rezerwuj</button>
                <!-- skrypt 3 -->

            </form>
        </section>

        <section>
            <h2>Zaległe książki</h2>
            <ul>
                <!-- skrypt4 -->
                 <?php
                    $sql = "SELECT tytul, id_cz, data_odd
                    FROM ksiazka
                    JOIN wypozyczenia ON wypozyczenia.id_ks=ksiazka.id
                    ORDER BY data_odd
                    LIMIT 15";
                    $result = $link -> query($sql);
                    $list = $result -> fetch_all(1);
                    foreach($list as $li){
                        echo
                        "
                        <li>{$li['tytul']} {$li['id_cz']} {$li['data_odd']}</li>
                        ";
                    }
                 ?>
            </ul>

        </section>
    </main>

    <footer>
        <p><strong>Autor:0000</strong></p>
    </footer>
</body>
</html>
<?php
$link -> close();
?>