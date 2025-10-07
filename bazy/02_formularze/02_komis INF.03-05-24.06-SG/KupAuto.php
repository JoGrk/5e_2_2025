<?php
$link = new mysqli('localhost','root','','5e_2_komis');



$f_brand=$_POST['f_brand'] ?? NULL;
var_dump($f_brand);

if($f_brand){
    $sql="SELECT nazwa, model, cena, zdjecie
          FROM samochody
            JOIN marki ON samochody.marki_id=marki.id
            WHERE nazwa ='$f_brand';";
    $result=$link->query($sql);
    $selected_cars=$result->fetch_all(1);

}




$sql="SELECT model, rocznik, przebieg, paliwo, cena, zdjecie
FROM samochody
WHERE id = 10;";
$result = $link ->query($sql);
$car = $result -> fetch_array();


$sql="SELECT nazwa, model, rocznik, cena, zdjecie
FROM samochody
    JOIN marki ON samochody.marki_id=marki.id
WHERE wyrozniony=1
LIMIT 4;";
$result = $link ->query($sql);
$cars = $result -> fetch_all(1);

$sql="SELECT nazwa
FROM marki;";
$result = $link ->query($sql);
$brands = $result ->fetch_all(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><em>KupAuto!</em> Internetowy Komis Samochodowy</h1>
    </header>

    <main class="first">
        <!-- script 1 -->
         <!-- <img src="[zdjecie]" alt="oferta dnia">
         <h4>oferta dnia toyota [model]</h4>
         <p>Rocznik: <rocznik>, przebieg: <przebieg>, rodzaj paliwa: <paliwo></p>
         <h4>cena [cena]</h4> -->
         <?php
         echo"   <img src='{$car['zdjecie']}' alt='oferta dnia'>
         <h4>oferta dnia toyota {$car['model']}</h4>
         <p>Rocznik: {$car['rocznik']}, przebieg: {$car['przebieg']}, rodzaj paliwa: {$car['paliwo']}</p>
         <h4>cena {$car['cena']}</h4>
         ";
         ?>
        
    </main>

    <main class="middle">
        <h2>Oferty Wyróżnione</h2>
        <!-- script 2 -->
         <section class="flex">
            <!-- <section class='offer'>
            <img src='[zdjecie]' alt='model'>
            <h4>[marka] [model]</h4>
            <p>Rocznik: [rocznik]</p>
            <h4>Cena: [cena]</h4>
            </section> -->
            <?php
            
            foreach($cars as $car){
                echo
                "
                <section class='offer'>
                <img src='{$car['zdjecie']}' alt='{$car['model']}'>
                <h4>{$car['nazwa']} {$car['model']}</h4>
                <p>Rocznik: {$car['rocznik']}</p>
                <h4>Cena: {$car['cena']}</h4>
                </section> 
                ";
            }
            ?>
         </section>

    </main>

    <main class="last">
        <h2>Wybierz markę</h2>
        <form action="" method="post">
            <select name="f_brand" id="f_brand">
                <!-- script 3 -->
                 <!-- <option value="audi">Audi</option> -->
                 <?php
                    foreach($brands AS $brand){
                        echo"
                            <option value='{$brand['nazwa']}'>{$brand['nazwa']}</option>
                        ";
                    }
                 ?>
            </select>
            <button>Wyszukaj</button>
        </form>
        <!-- script 4 -->
         <section class="flex">
            <!-- <section class="offer">
                <img src="[zdjecie]" alt="[model]">
                <h4>marka: [nazwa] model: [nazwa]</h4>
                <h4>Cena: [cena]</h4>
            </section> -->
            <?php
            if($f_brand){


                foreach($selected_cars as $car){
                echo "           
            <section class='offer'>
                <img src='{$car['zdjecie']}' alt='{$car['model']}'>
                <h4>marka: {$car['nazwa']} model: {$car['model']}</h4>
                <h4>Cena: {$car['cena']}</h4>
            </section>";
                }
            }

            ?>
         </section>
         
    </main>

    <footer>
        <p>Stronę wykonał:0000000</p>
        <p><a href=" http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>

</body>
</html>
<?php
$link ->close();
?>