<?php
$link=new mysqli('localhost', 'root', '', '5e_2_weterynarz' );
$sql="SELECT id,imie,wlasciciel
FROM zwierzeta
WHERE rodzaj = 1;";
$result=$link->query($sql);
$animals=$result->fetch_all(1);

$sql="SELECT id,imie,wlasciciel
FROM zwierzeta
WHERE rodzaj = 2;";
$result=$link->query($sql);
$cats=$result->fetch_all(1);

$sql = "SELECT imie, telefon, szczepienie, opis
FROM zwierzeta;";
$result=$link->query($sql);
$allanimals=$result->fetch_all(1);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weterynarz</title>
    <link rel="stylesheet" href="weterynarz.css">
</head>
<body>
    <header>
        <h1>GABINET WETERYNARYJNY</h1>
    </header>

    <main>
        <section class="left">
            <h2>PSY</h2>
            <!-- skrypt 1 -->
             <!-- id imie wlasciciel <br> -->
             <?php
                foreach($animals as $animal){
                    echo "{$animal['id']} 
                    {$animal['imie']} 
                    {$animal['wlasciciel']} <br>
                          
                    ";
                }
             ?>
            



            <h2>KOTY</h2>
            <!-- skrypt 2 -->
               <?php
                foreach($cats as $animal){
                    echo "{$animal['id']} 
                    {$animal['imie']} 
                    {$animal['wlasciciel']} <br>
                          
                    ";
                }
             ?>
        </section>
        
        <section class="mid">
            <h2>SZCZEGÓŁOWA INFORMACJA O ZWIERZĘTACH</h2>
            <!-- skrypt 3 -->
             <!-- pacjent: <imie> <br>
Telefon właściciela: <telefon>, ostatnie szczepienie: <szczepienie>, informacje: <opis> <hr> -->

                <?php
                    foreach($allanimals as $allanimal){
                        echo"
                            pacjent: {$allanimal['imie']} <br>
Telefon właściciela: {$allanimal['telefon']}, ostatnie szczepienie: {$allanimal['szczepienie']}, informacje: {$allanimal['opis']} <hr>
                        ";
                    }
                    
                ?>
        </section>

        <section class="right">
            <h2>WETERYNARZ</h2>
            <a href="logo.jpg"><img src="logo-mini.jpg" alt="ladny piesek"></a>
            <p>Krzysztof Nowakowski, lekarz weterynarii</p>
            <h2>GODZINY PRZYJĘĆ</h2>
            <table>
                <tr>
                    <td>Poniedzialek</td>
                    <td>15:00 - 19:00</td>
                </tr>
                <tr>
                    <td>Wtorek</td>
                    <td>15:00 - 19:00</td>
                </tr>
            </table>
        </section>
    </main>
</body>
</html>
<?php
$link->close();
?>