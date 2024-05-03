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
  <main class="content">
        <!-- Voeg de zoekformulier hier -->
        <form action="#" method="post">
            <label for="searchName">Naam:</label>
            <input type="text" name="searchName">
            <input type="submit" value="Zoeken" name="searchCustomers">
        </form>

        <?php
        // Controleer eerst of de zoekopdracht is ingediend
        if (isset($_POST["searchCustomers"])) {
            // Maak verbinding met de database
            require_once("klantconfig.php");
            $conn = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Neem zoekterm over uit het formulier
            $searchTerm = "%" . $_POST["searchName"] . "%";

            // Selecteer klanten die overeenkomen met de zoekterm
            $query = $conn->prepare("SELECT * FROM " . CRUD_TABLE . " WHERE voornaam LIKE :searchTerm OR achternaam LIKE :searchTerm OR woonplaats LIKE :searchTerm OR email LIKE :searchTerm");

            $query->bindValue(":searchTerm", $searchTerm);
            $query->execute();
            $customers = $query->fetchAll(PDO::FETCH_ASSOC);

            // Toon de gevonden klanten in een tabel
            echo "<table>";
            foreach ($customers as $customer) {
                echo "<tr>";
                echo "<td>" . $customer['voornaam'] . "</td>";
                echo "<td>" . $customer['achternaam'] . "</td>";
                echo "<td>" . $customer['woonplaats'] . "</td>";
                echo "<td>" . $customer['email'] . "</td>";
                echo "<td>" . $customer['admin'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Sluit de databaseverbinding
            $conn = null;
        } else {
            // Als er geen zoekopdracht is, toon alle klanten
            require_once("klantfunctions.php");
            crudklant();
        }
        ?>
    </main>
 
    <footer class="footer">
        <!-- Footer content goes here -->
    </footer>
</body>

</html>

