<?php
    // functie: update klant
    // auteur: wissam hatat

    require_once('klantfunctions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateklant($_POST) == true){
            echo "<script>alert('klant is gewijzigd')</script>";
        } else {
            echo '<script>alert("klant is NIET gewijzigd")</script>';
        }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['id'])){
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        $row = getklant($id);

?>

<!DOCtype html>
<html lang="en">
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

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wijzig klant</title>
  </head>

  <body>
    <h1>Wijzig klant</h1>

    <form method="post">
      <input type="hidden" id="id" name="id" required value="<?php echo $row['id']; ?>"><br>

      <label for="voornaam">voornaam:</label>
      <input type="text" id="voornaam" name="voornaam" value="<?php echo $row['voornaam']; ?>" required><br>

      <label for="achternaam">achternaam:</label>
      <input type="text" id="achternaam" name="achternaam" value="<?php echo $row['achternaam']; ?>" required><br>

      <label for="woonplaats">woonplaats:</label>
      <input type="text" id="woonplaats" name="woonplaats" value="<?php echo $row['woonplaats']; ?>" required><br>

      <label for="email">email:</label>
      <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

      <label for="admin">admin:</label>
      <input type="number" id="admin" name="admin" min="0" max="1" value="<?php echo $row['admin']; ?>" required><br>

      <input type="submit" name="btn_wzg" value="Wijzig">
    </form>

    <br>

    <a href='klantoverview.php'><button>Overview klanten</button></a><br>
    <a href='main.php'><button>Home</button></a>
  </body>

  <footer class="footer">
        <!-- Footer content goes here -->
  </footer>
</html>

<?php
    } else {
        "Geen id opgegeven<br>";
    }
?>