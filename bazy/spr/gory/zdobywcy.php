<?php
$link = new mysqli('localhost','root','','zdobywcy');

$funkcja = $_POST ['funkcja'] ?? NULL;
$imie = $_POST ['imie'] ?? NULL;
$nazwisko = $_POST ['nazwisko'] ?? NULL;
$email = $_POST ['email'] ?? NULL;


if ($funkcja && $imie && $nazwisko &&$email){
    $sql="INSERT INTO osoby 
            VALUES (NULL, '$nazwisko', '$imie', '$funkcja', '$email');";
        $result = $link ->query($sql);
}



$sql="SELECT nazwisko, imie, funkcja, email
  FROM osoby;";
$result = $link -> query($sql);
$osoby = $result -> fetch_all(1);
?>
<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>

    <nav>
        <p> <a href="kwerenda1.png">kwerenda1</a>
            <a href="kwerenda2.png">kwerenda2</a>
            <a href="kwerenda3.png">kwerenda3</a>
            <a href="kwerenda4.png">kwerenda4</a> </p>
    </nav>

    <main>
        <section class="lewa">
          
            <img src="logo.jpg" alt="logo zdobywcy">
           
            <h3>razem z nami</h3>

            <ul>
                <li>Wyjazdy</li>
                <li>szkolenia</li>
                <li>rekreacjia</li>
                <li>wypoczynek</li>
                <li>wyzwania</li>
            </ul>

        </section>

        <section class="prawa">

            <h2>Dołącz do naszego zespołu</h2>

            <p>Wpisz swoje dane do formularza:</p>

            <form action="" method="post">
                
            <label for="">Nazwisko:</label>
                <input type="text" name="nazwisko" id="nazwisko">

                <label for="imie">Imię:</label>
                <input type="text" name="imie" id="imie">
                
                <Select name="funkcja" id="funkcja">
                    <label for="">Funkcja:</label>
                    <option>uczestnik</option>
                    <option>przewodnik</option>
                    <option >zaopatrzeniowiec</option>
                    <option>organizator</option>
                    <option >ratownik</option>
                    
                </Select>
                <label for="">email:</label>
                <input type="text" name="email" id="email">
                <button>Dodaj</button>
            </form>
            <!-- skrypt2 -->
            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Funkcja</th>
                    <th>Email</th><br>
                 </tr>
                
                    <?php
                    foreach ($osoby as $l){
                        echo "  <tr>
                    <td>{$l['nazwisko']}</td>
                    <td>{$l['imie']}</td>
                    <td>{$l['funkcja']}</td>
                    <td>{$l['email']}</td>
                     </tr>"
                    ;}
                    ?>
                  
                 
               
            </table>
        </section>
    
    </main>
    <footer>
        <p>Stronę wykonał:Igor Duda</p>
    </footer>
</body>
</html>
<?php
$link -> close();
?>