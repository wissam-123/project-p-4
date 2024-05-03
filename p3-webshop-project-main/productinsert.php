<?php
    // functie: formulier en database insert product
    // auteur: jordan van eijs

    require_once('productfunctions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertproduct($_POST) == true){
            echo "<script>alert('product is toegevoegd')</script>";
        } else {
            echo '<script>alert("product is NIET toegevoegd")</script>';
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
        <h1>Insert product</h1>

        <form method="post">
            <label for="productnaam">productnaam:</label>
            <input type="text" id="productnaam" name="productnaam" required><br>

            <label for="prijs">prijs:</label>
            <input type="number" step="0.01" id="prijs" name="prijs" required><br>

            <label for="foto">foto:</label>
            <input type="text" id="foto" name="foto" required><br>

            <label for="type">type</label>
            <input type="text" id="type" name="type" required><br>

            <br>

            <input type="submit" name="btn_ins" value="Insert">
        </form>

        <a href='productoverview.php'><button>Overview producten</button></a><br>
        <a href='main.php'><button>Home</button></a>
    </body>

    <footer class="footer">
        <!-- Footer content goes here -->
    </footer>
</html>
