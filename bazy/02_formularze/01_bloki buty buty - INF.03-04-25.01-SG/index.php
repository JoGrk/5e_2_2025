<?php
$link = new mysqli('localhost', 'root', '', '5e_2_obuwie');
$sql="SELECT model
FROM produkt;";
$result=$link->query($sql);
$models=$result->fetch_all(1);

$sql="SELECT buty.model,nazwa,cena,nazwa_pliku
FROM buty
        JOIN produkt ON buty.model=produkt.model;";
$result =$link ->query($sql);
$products =$result -> fetch_all(1);
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
        <form action="zamow.php" method="post">
            <label for="f_model">Model:</label>
            <select name="f_model" id="f_model" class="kontrolki">
                <!-- skrypt 1 -->
                 <?php
                foreach($models as $model){
                    echo "<option value='{$model['model']}'>{$model['model']}</option> ";
                }
                 ?>
            </select>

            <label for="f_size">rozmiar: </label>
            <select name="f_size" id="f_size" class="kontrolki">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>

            <label for="f_quantity">Liczba par:</label>
            <input type="number" name="f_quantity" id="f_quantity" class="kontrolki">

            <button type="submit" class="kontrolki">Zamów</button>

        </form>

            <!-- script 2  -->
             <!-- <section class="buty">
                <img src="but1.png" alt="But męski">
                <h2>Nazwa</h2>
                <h5>Model:[model]</h5>
                <h4>Cena: [cena]</h4>
             </section> -->
             <?php
                foreach($products as $product){
                    echo"
                    <section class='buty'>
                <img src='{$product['nazwa_pliku']}' alt='But męski'>
                <h2>Nazwa</h2>
                <h5>Model:{$product['model']}</h5>
                <h4>Cena: {$product['cena']}</h4>
                </section>
                    ";
                }
             ?>
    </main>

    <footer>
        <p>Autor strony:0000000</p>

    </footer>
</body>
</html>

<?php
$link -> close();
?>