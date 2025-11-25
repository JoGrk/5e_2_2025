<?php
$link=new mysqli('localhost', 'root', '', '5e_2_wykaz');

$filter = $_POST['filter'] ?? NULL;

if($filter){
    $sql="SELECT miasta.nazwa AS miasto,
            wojewodztwa.nazwa AS wojewodztwo
                FROM miasta
                JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id
                WHERE miasta.nazwa LIKE '$filter%'
                ORDER BY miasta.nazwa;";
    $result=$link->query($sql);
    $names=$result->fetch_all(1);
    // var_dump($names);
    // var_dump($filter);
}




?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka miast</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="png" href="fav.png">
</head>
<body>
    <section class="main">
        <header><img src="mapa_polski.jpg" alt="Polska"></header>
        <section class="left-top">
            <h4>Podaj początek nazwy miasta</h4>
            <form action="" method="POST">
                <input type="text" name="filter" id="filter">
                <button>Szukaj</button>
            </form>
        </section>
        <section class="right">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <!-- efekt -->
            
            <!-- <tr>
                <th>Miasto</th>
                <th>Wojewodztwo</th>
            </tr> -->
<!-- 
            <tr>
                <td>{['miasto']}</td>
                <td>{['wojewodztwo']}</td>
            </tr> -->

            <?php

                if($filter){
                    echo"<p class='prf'>$filter</p>";
                    
                    echo"<table>
                        <tr>
                            <th>Miasto</th>
                            <th>Wojewodztwo</th>
                        </tr>";
                    
                    foreach($names as $n){
                        echo"
                        <tr>
                            <td>{$n['miasto']}</td>
                            <td>{$n['wojewodztwo']}</td>
                        </tr>";
                    }
                    

                    echo"</table>";

                }
            
            ?>

         
           
        </section>
        <section class="left-down">
            <p>Egzamin INF.03</p>
            <p>Autor: Dorian Kwapich</p>
        </section>
    </section>
</body>
</html>