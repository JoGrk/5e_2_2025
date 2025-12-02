<?php

    $link = new mysqli('localhost','root','','spr_rzeki');

    $search_f = $_POST['search_f'] ?? NULL;
   




    if($search_f){
        $sql = "SELECT miasta.nazwa, wojewodztwa.nazwa
                FROM wojewodztwa
                INNER JOIN miasta ON wojewodztwa.id = miasta.id_wojewodztwa
                WHERE miasta.nazwa LIKE '$search_f%'
                ORDER BY miasta.nazwa;";

$result = $link -> query($sql);
$searchs = $result -> fetch_all(1);
    }
  

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
</head>
<body>
    
    <header>
        <img src="baner.jpg" alt="Polska">
    </header>

    <section class="left">
        <h4>Podaj początek nazwy miasta</h4>
        <form action="" method="post" >
            <input type="text" id="search_f">
            <button>Szukaj</button>
        </form>
    </section>

    <section class="right">
        <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
        <?php
    if($search_f){
                echo"<p>$search_f</p>";
                    foreach($searches as $l){
        echo"   
                <table>
                <tr>
                    <th>Miasto</th>
                    <th>Wojewodztwo</th>
                </tr>
                <tr>
                    <td>{$list['miasto']}</td>
                    <td>{$list['wojewodztwo']}</td>
                </tr>
        
                </table>";
    }
    
    }






        ?>





    </section>


    <section class="left_d">
        <p><a>Egzamin INF.03</a></p>
        <p>Autor:00000000</p>
    </section>

    

</body>
</html>


<?php
$link -> close();
?>