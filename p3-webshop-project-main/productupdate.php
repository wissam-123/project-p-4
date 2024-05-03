<?php
    // functie: update product
    // auteur: jordan van eijs

    require_once('productfunctions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateproduct($_POST) == true){
            echo "<script>alert('product is gewijzigd')</script>";
        } else {
            echo '<script>alert("product is NIET gewijzigd")</script>';
        }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['id'])){
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        $row = getproduct($id);

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
    <title>Wijzig product</title>
  </head>

  <body>
    <h1>Wijzig product</h1>

    <form method="post">
      <input type="hidden" id="id" name="id" required value="<?php echo $row['id']; ?>"><br>

      <label for="productnaam">productnaam:</label>
      <input type="text" id="productnaam" name="productnaam" required value="<?php echo $row['productnaam']; ?>"><br>

      <label for="prijs">prijs:</label>
      <input type="number" step="0.01" id="prijs" name="prijs" required value="<?php echo $row['prijs']; ?>"><br>

      <label for="foto">foto:</label>
      <input type="text" id="foto" name="foto" required value="<?php echo $row['foto']; ?>"><br>

      <label for="type">type</label>
      <input type="text" id="type" name="type" required value="<?php echo $row['type']; ?>"><br>

      <input type="submit" name="btn_wzg" value="Wijzig">
    </form>

    <br>

    <a href='productoverview.php'><button>Overview producten</button></a><br>
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