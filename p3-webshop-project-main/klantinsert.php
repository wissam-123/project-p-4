<?php
    // functie: formulier en database insert klant
    // auteur: wissam hatat

    require_once('klantfunctions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertklant($_POST) == true){
            echo "<script>alert('klant is toegevoegd')</script>";
        } else {
            echo '<script>alert("klant is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>IDontKnowAnymore.INC</title>
    </head>

    <header class="header">
        <img class="logo" src="imgs/logo.png">
        <nav class="menu">
            <ul>
                <li><a href="main.php">Home</a></li>

                <li class="dropdown">
                    <a href="#">Webshop</a>
                    <ul class="dropdown-content">
                        <li><a href="productoverview.php">Producten</a></li>
                        <li><a href="klantoverview.php">Klanten</a></li>
                        <li><a href="bestellingoverview.php">Bestellingen</a></li>
                        <li><a href="reviewoverview.php">Reviews</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Algemene Informatie</a>
                    <ul class="dropdown-content">
                        <li><a href="tim.php">Tim</a></li>
                        <li><a href="wissam.php">Wissam</a></li>
                        <li><a href="emily.php">Emily</a></li>
                        <li><a href="jordan.php">Jordan</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Het Bedrijf</a>
                    <ul class="dropdown-content">
                        <li><a href="leveranciers.php">Leveranciers</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <body>
        <h1>Insert klant</h1>

        <form method="post">
            <label for="voornaam">voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" required><br>

            <label for="achternaam">achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" required><br>

            <label for="woonplaats">woonplaats:</label>
            <input type="text" id="woonplaats" name="woonplaats" required><br>

            <label for="email">email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="admin">admin:</label>
            <input type="number" id="admin" name="admin" min="0" max="1" value="0" required><br>

            <br>

            <input type="submit" name="btn_ins" value="Insert">
        </form>

        <a href='klantoverview.php'><button>Overview klanten</button></a><br>
        <a href='main.php'><button>Home</button></a>
    </body>

    <footer class="footer">
        <!-- Footer content goes here -->
    </footer>
</html>
