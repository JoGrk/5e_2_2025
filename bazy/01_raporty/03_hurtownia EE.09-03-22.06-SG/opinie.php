<?php 
$link = new mysqli("localhost","root","","5e_2_hurtownia");
$sql = "SELECT zdjecie, imie, opinia
FROM klienci
    INNER JOIN opinie ON klienci.id=opinie.Klienci_id
WHERE Typy_id IN (2,3)";
$result = $link -> query($sql);
$opinions = $result -> fetch_all(1);

$sql = "SELECT imie, nazwisko, punkty
FROM klienci
ORDER BY punkty DESC
LIMIT 3";
$result = $link -> query($sql);
$customers = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    
    </header>

    <main>
        <h2>Opinie naszych klientów</h2>
        <!-- skrypt 1 -->
         <!-- <section class="opinion">
            <img src="anna.jpg" alt="klient">
            <blockquote>opinia</blockquote>
            <h4>anna</h4>
         </section> -->

         <?php
            foreach($opinions as $opinion){
                echo"
                            <section class='opinion'>
                                <img src='{$opinion['zdjecie']}' alt='klient'>
                                <blockquote>{$opinion['opinia']}</blockquote>
                                <h4>{$opinion['imie']}</h4>
                            </section>
                ";
            }
         ?>
    </main>

    <footer>
        <section>
            <h3>Wspolpracuj z nami</h3>
            <a href="http://sklep.pl/">Sklep 1</a>
        </section>
        <section>
            <h3>Nasi top klienci</h3>
            <ol>
                <!-- s2 -->
                 <!-- <li>
                   <imie> <nazwisko>, <punkty> pkt. 
                 </li> -->
                 <?php
                foreach ($customers as $customer){
                    echo"<li>
                   {$customer['imie']} {$customer['nazwisko']}, {$customer['punkty ']} pkt. 
                 </li>
                    ";
                }

                 ?>
            </ol>
        </section>

        <section>
            <h3>Skontaktuj sie</h3>
            <p>telefon:111222333</p>
        </section>

        <section>
            <h3>Autor</h3>
            
        </section>
    </footer>
</body>
</html>
<?php
$link->close();
?>