<?php
// auteur: jordan van eijs
// functie: verwijder een product op basis van de id
include 'productfunctions.php';

// Haal product uit de database
if(isset($_GET['id'])){

    // test of insert gelukt is
    if(deleteproduct($_GET['id']) == true){
        echo '<script>alert("id: ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('productoverview.php'); </script>";
    } else {
        echo '<script>alert("id is NIET verwijderd")</script>';
    }
}
?>

