<?php

$link = new mysqli('localhost', 'root', '', '5e_2_obuwie');

$f_model = $_POST['f_model']?? NULL;
$f_size = $_POST['f_size']?? NULL;
$f_quantity = $_POST['f_quantity']?? NULL;

if($f_model && $f_size && $f_quantity){

    $sql = "SELECT nazwa,cena,kolor,kod_produktu,material,nazwa_pliku
        FROM buty
            JOIN produkt ON buty.model=produkt.model
        WHERE buty.model = '$f_model';";
    $result = $link -> query($sql);
    $product = $result -> fetch_array();

} 

   
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>

    <main>
        <h2>zamowienie</h2>
        <!-- skrypt 3 -->
         <!-- <img src="" alt="but męski">
         <h2>nazwa produktu</h2>
         <p>cena za LICZBAPAR par: WARTOŚĆCAŁKOWITA zł</p>
         <p>Szczegóły produktu: KOLOR, MATERIAL</p>
         <p>Rozmiar: ROZMIAR</p> -->
         <?php
          if($f_model && $f_size && $f_quantity){
            
                 $price=$f_quantity*$product['cena'];
                echo
                "
                <img src='{$product['nazwa_pliku']}' alt='but męski'>
                <h2>{$product['nazwa']}</h2>
                <p>cena za $f_quantity par:$price zł</p>
                <p>Szczegóły produktu: {$product['kolor']}, {$product['material']}</p>
                <p>Rozmiar:$f_size</p>
                ";
          } 
         ?>
         <a href="index.php">strona glowna</a>
    </main>

    <footer>
        <p>Autor strony:0000000</p>

    </footer>
</body>
</html>


<?php
    $link -> close();
?>