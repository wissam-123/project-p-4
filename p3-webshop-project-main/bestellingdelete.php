<?php
// auteur: tim bosma
// functie: verwijder een bestelling op basis van de id
include 'bestellingfunctions.php';

// Haal bestelling uit de database
if(isset($_GET['id'])){

    // test of insert gelukt is
    if(deletebestelling($_GET['id']) == true){
        echo '<script>alert("id: ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('bestellingoverview.php'); </script>";
    } else {
        echo '<script>alert("id is NIET verwijderd")</script>';
    }
}
?>

