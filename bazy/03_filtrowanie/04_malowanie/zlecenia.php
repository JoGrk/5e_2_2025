

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remonty</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Malowanie i gipsowanie</h1>
    </header>


    <main>

        <nav class="nav">
            <a href="kontakt.html">Kontakt</a>
            <a href="http://remonty.pl" target="_blank">Partnerzy</a>
        </nav>
        <aside>
            <img src="tapeta_lewa.png" alt="uslugi" >
            <img src="tapeta_prawa.png" alt="uslugi" >
            <img src="tapeta_lewa.png" alt="uslugi" >
        </aside>

        <section class="lewaF">
            <h2>Dla klientow</h2>
            <form action="" method="post">
                <label for="">Ilu co najmniej pracownikow potrzebujesz?</label><br>
                <input type="number" id="ile" name="ile">
                <button type="submit">Szukaj Firmy</button>
                <!-- s1 -->
            </form>
        </section>

        <section class="lewaS">
            <h2>Dla wykonawcow</h2>
                <form action="" method="post">
                        <select name="miasto" id="miasto">
                        <!-- s2-->
                
                         </select> <br>
                        <input type="radio" id="malowanie" name="usluga" value="malowanie" checked>
                        <label for="malowanie">malowanie</label><br>
                        
                        <input type="radio" id="gipsowanie" name="usluga" value="gipsowanie">
                        <label for="gipsowanie">gipsowanie</label><br>

                        <button type="submit">Szukaj klientow</button>
                </form>
                <!-- s3 -->
        </section>
    </main>
    <footer><p><strong>Strone wykonal:000000</strong></p></footer>
</body>
</html>

<?php
    $link -> close();
?>
