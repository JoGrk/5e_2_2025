<?php
$link = new mysqli ('localhost','root','','5e_2_gry');

$id_game=$_POST['id_game'] ?? NULL;
if($id_game){
    $sql="select nazwa, left(opis, 100) AS opis, punkty, cena
from gry
where id=$id_game;";
    $result=$link->query($sql);
    $desc_game=$result->fetch_array();

}

$name=$_POST['name'] ?? NULL;
$description=$_POST['description'] ?? NULL;
$price=$_POST['price'] ?? NULL;
$image=$_POST['image'] ?? NULL;
if($name){
    $sql="INSERT INTO gry 
        (nazwa,opis,punkty,cena,zdjecie)
        VALUES (
            '$name',
            '$description',
            0,
            $price,
            $image'
        );";
    $link->query($sql);    
}

$sql = "select nazwa, punkty
from gry
order by punkty DESC
LIMIT 5;";
$result = $link -> query($sql);
$games = $result -> fetch_all(1);

$sql="select id, nazwa, zdjecie
from gry;";
$result = $link -> query($sql);
$games1 = $result -> fetch_all(1);


?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>

    <main>
        <section class="left">
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                <!-- skrypt 1 -->
                <?php
                    foreach($games as $game){
                        echo
                        "
                        <li>{$game['nazwa']} <span class='points'>{$game['punkty']}</span></li>
                        ";
                    }
                ?>
                 <!-- <li>[nazwa] <span class="points">[punkty]</span></li> -->
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>000</p>
        </section>

        <section class="mid">
            <!-- skrypt 2 -->
             <section class="games">
                <img src="krokodyl.jpg" alt="nazwa" title="[id]">
                <p>[zdjecie]</p>
             </section>
             <?php
                foreach($games1 AS $game1){
                    echo"
                        <section class='games'>
                            <img
                             src='{$game1['zdjecie']}' 
                             alt='{$game1['nazwa']}' 
                             title='{$game1['id']}'
                             >
                            <p>{$game1['zdjecie']}</p>
                        </section>
                    ";
                }
             ?>
        </section>

        <section class="right">
            <h3>Dodaj nową grę</h3>
            <form action="" method="post">
                <label for="name">Nazwa</label> <br>
                <input type="text" name="name" id="name"><br>
                <label for="description">opis</label> <br>
                <input type="text" name="description" id="description"><br>
                <label for="price">cena</label> <br>
                <input type="text" name="price" id="price"><br>
                <label for="image">zdjęcie</label> <br>
                <input type="text" name="image" id="image"> <br>
                <button>Dodaj</button>
            </form>
        </section>
    </main>
    
    <footer>
        <form action="" method="post">
            <input type="text" name="id_game" id="id_game">
            <button>Pokaż opis</button>
        </form>
        <!-- skrypt3 -->
         <!-- <h2>[nazwa], [punkty] punktów, [cena] zł</h2>
         <p>[opis]</p> -->
         <?php
        if($id_game){
            echo"         
         <h2>{$desc_game['nazwa']}, {$desc_game['punkty']} punktów,
          {$desc_game['cena']} zł</h2>
         <p>{$desc_game['opis']}</p>";
        }
         ?>

    </footer>
</body>
</html>
<?php
$link -> close();
?>