<?php
// auteur: Emily van den Berg
// functie: verwijder eenreview op basis van de id
include 'reviewfunctions.php';

// Haal reviewt uit de database
if(isset($_GET['id'])){

    // test of insert gelukt is
    if(deletereview($_GET['id']) == true){
        echo '<script>alert("Review met ID ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('reviewoverview.php'); </script>";
    } else {
        echo '<script>alert("Review is NIET verwijderd door een error.")</script>';
    }
}
?>

