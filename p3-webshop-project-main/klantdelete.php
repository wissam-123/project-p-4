<?php
// auteur: wissam hatat
// functie: verwijder een klant op basis van de id
include 'klantfunctions.php';

// Haal klant uit de database
if(isset($_GET['id'])){

    // test of insert gelukt is
    if(deleteklant($_GET['id']) == true){
        echo '<script>alert("id: ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('klantoverview.php'); </script>";
    } else {
        echo '<script>alert("id is NIET verwijderd")</script>';
    }
}
?>

