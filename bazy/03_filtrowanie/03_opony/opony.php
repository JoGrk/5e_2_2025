<?php
header("Refresh: 10");
$link =new mysqli('localhost','root','','5e_2_opony');

$name= $_POST['name_f']?? NULL;
$surname= $_POST['surname_f']?? NULL;
if ($name && $surname){
    $sql="INSERT INTO klient
(imie, nazwisko)
VALUES
('$name', '$surname');";
$result = $link ->query($sql);
}


$sql="SELECT *
FROM opony
ORDER BY cena ASC
LIMIT 10;";
$result=$link->query($sql);
$tires = $result->fetch_all(1);

$sql = "SELECT producent, model, sezon, cena
FROM opony 
WHERE nr_kat = 9;";
$result=$link->query($sql);
$kategorie = $result->fetch_all(1);



?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opony</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <main>
        <aside>
            <!-- <section class='opona'>
                <img src='lato.png' alt='letnia'>
                <h4>Opona:[producent] [model]</h4>
                <h3>Cena: [cena]</h3>
            </section> -->

            <?php
            foreach($tires as $tire){
                $sezon=$tire['sezon'];
                if($sezon == 'letnia'){
                    $photo = 'lato.png';
                    $alt = 'letnia';
                }
                else if($sezon == 'zimowa'){
                    $photo = 'zima.png';
                    $alt = 'zimowa';
                }
                else{
                    $photo = 'uniwer.png';
                    $alt = 'uniwersalna';
                }
                echo"<section class='opona'>
                        <img src='$photo' alt='$alt'>
                        <h4>Opona:{$tire['producent']} {$tire['model']}</h4>
                        <h3>Cena: {$tire['cena']}</h3>
                    </section>";
            }
            ?>

            <p>
                <a href="https://opona.pl/">Więcej ofert</a>
            </p>
            
        </aside>

        <section class="one">
            <img src="opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <!-- s2 -->
             <!-- <h2>[producent] [model]</h2>
             <h2>Sezon: [sezon]</h2>
             <h2>Tylko [cena] zł!</h2> -->
             <?php
            foreach ($kategorie as $kategoria){
                echo "<h2>{$kategoria['producent']} {$kategoria['model']}</h2>
             <h2>Sezon: {$kategoria['sezon']}</h2>
             <h2>Tylko {$kategoria['cena']} zł!</h2>";
            }
             ?>

        </section>

        <section class="two">
            <h2>Najnowsze zamówienie</h2>
            <!-- s3 -->

        </section>
    </main>

    <footer>
        <p>Stronę wykonał: 0000</p>
        
        <form action="" method="post">
            <label for="name">Imie:</label>
            <input type="text" name="name_f" id="name">
            <label for="surname">nazwisko</label>
            <input type="text" name="surname_f" id="surname">
            <button>DODAJ</button>

        </form>
    </footer>
    
</body>
</html>
<?php
$link->close();
?>