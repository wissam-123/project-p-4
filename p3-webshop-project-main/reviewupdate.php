<?php
    // functie: update review
    // auteur: Emily van den Berg

    require_once('reviewfunctions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updatereview($_POST) == true){
            echo "<script>alert('Review is gewijzigd.')</script>";
        } else {
            echo '<script>alert("Review is NIET gewijzigd door een error. Probeer opnieuw.")</script>';
        }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['id'])){
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        $row = getreviews($id);

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
    <title>Wijzig review</title>
  </head>

  <body>
    <h1>Wijzig review</h1>

    <form method="post">
      <input type="hidden" id="id" name="id" required value="<?php echo $row['id']; ?>"><br>

      <label for="productid">Product:</label>
       <?php
            $result = getData("product");

            $text = "<select name='productid' id='productid'>";
            foreach($result as $pRow) {
                $selected = $row["productid"] == $pRow["id"] ? "selected" : "";
                $text .= "<option $selected value='$pRow[id]'>$pRow[productnaam]</option>";
            }
            $text .= "</select>";

            echo $text;
        ?><br>

      <label for="klantid">Klant:</label>
      <?php
            $result = getData("klanten");

            $text = "<select name='klantid' id='klantid'>";
            foreach($result as $kRow) {
                $selected = $row["klantid"] == $kRow["id"] ? "selected" : "";
                $text .= "<option $selected value='$kRow[id]'>$kRow[voornaam] $kRow[achternaam]</option>";
            }
            $text .= "</select>";

            echo $text;
        ?><br>

       <label for="review">Review:</label>
       <input type="text" id="review" name="review" required value="<?php echo $row['review']; ?>"><br>

       <label for="rating">Rating:</label>
       <input type="number" id="rating" name="rating", min="0" max="10" required value="<?php echo $row['rating']; ?>"><br>

      <input type="submit" name="btn_wzg" value="Wijzig">
    </form>

    <br>

    <a href='reviewoverview.php'><button>Overview reviews</button></a><br>
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