<?php
    // functie: formulier en database insert review
    // auteur: Emily van den Berg

    require_once('reviewfunctions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertreview($_POST) == true){
            echo "<script>alert('Review is toegevoegd.')</script>";
        } else {
            echo '<script>alert("Review is NIET toegevoegd door een error. Probeer opnieuw.")</script>';
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
        <h1>Insert review</h1>

        <form method="post">
            <label for="productid">Product:</label>
            <?php
                $result = getData("product");

                $text = "<select name='productid' id='productid'>";
                foreach($result as $row) {
                    $text .= "<option value='$row[id]'>$row[productnaam]</option>";
                }
                $text .= "</select>";

                echo $text;
            ?><br>

            <label for="klantid">Klant:</label>
            <?php
                $result = getData("klanten");

                $text = "<select name='klantid' id='klantid'>";
                foreach($result as $row) {
                    $text .= "<option value='$row[id]'>$row[voornaam] $row[achternaam]</option>";
                }
                $text .= "</select>";

                echo $text;
            ?><br>

            <label for="review">Review:</label>
            <input type="text" id="review" name="review" required><br>

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" value="0" min="0" max="10" required><br>

            <br>

            <input type="submit" name="btn_ins" value="Insert">
        </form>

        <a href='reviewoverview.php'><button>Overview reviews</button></a><br>
        <a href='main.php'><button>Home</button></a>
    </body>

    <footer class="footer">
        <!-- Footer content goes here -->
    </footer>
</html>
