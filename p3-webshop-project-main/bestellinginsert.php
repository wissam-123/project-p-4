<?php
    // functie: formulier en database insert bestelling
    // auteur: tim bosma

    require_once('bestellingfunctions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertbestelling($_POST) == true){
            echo "<script>alert('bestelling is toegevoegd')</script>";
        } else {
            echo '<script>alert("bestelling is NIET toegevoegd")</script>';
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
        <h1>Insert bestelling</h1>

        <form method="post">
            <label for="klantid">klant:</label>
            <?php
                $result = getData("klanten");

                $text = "<select name='klantid' id='klantid'>";
                foreach($result as $row) {
                    $text .= "<option value='$row[id]'>$row[voornaam] $row[achternaam]</option>";
                }
                $text .= "</select>";

                echo $text;
            ?><br>  

            <label for="productid">product:</label>
            <!--<input type="text" id="productid" name="productid" required><br>-->
            <?php
                $result = getData("product");

                $text = "<select name='productid' id='productid'>";
                foreach($result as $row) {
                    $text .= "<option value='$row[id]'>$row[productnaam]</option>";
                }
                $text .= "</select>";

                echo $text;
            ?><br>

            <label for="aantal">aantal:</label>
            <input type="number" id="aantal" name="aantal" value=1 required><br>

            <br>

            <input type="submit" name="btn_ins" value="Insert">
        </form>

        <a href='bestellingoverview.php'><button>Overview bestellingen</button></a><br>
        <a href='main.php'><button>Home</button></a>
    </body>

    <footer class="footer">
        <!-- Footer content goes here -->
    </footer>
</html>
