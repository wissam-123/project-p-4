<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>IDontKnowAnymore.INC</title>
</head>
<body>
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

    <!-- Voeg het zoekformulier toe -->
    <form method="GET" action="productoverview.php">
        <label for="search">Zoek product:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Zoek">
    </form>

    <main class="content">
        <?php
            include 'productfunctions.php';

            // Controleren of er een zoekopdracht is
            if(isset($_GET['search']) && !empty($_GET['search'])) {
                // Roep een functie aan om producten op te halen op basis van de zoekterm
                $searchTerm = $_GET['search'];
                $result = searchProducts($searchTerm);
                printTable($result);
            } else {
                // Als er geen zoekopdracht is, toon alle producten
                crudproduct();
            }
        ?>
    </main>

    <footer class="footer">
        <!-- Footer content -->
    </footer>
</body>
</html>

