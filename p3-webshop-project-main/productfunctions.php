<?php
// auteur: jordan van eijs
// functie: algemene functies tbv hergebruik

include_once "productconfig.php";

function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}

 
 // selecteer de data uit de opgeven table
 function getData($table){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }
// zoekbalk voor producten
function searchProducts($searchTerm) {
    // Connect database
    $conn = connectDb();

    // Bereid de query voor met een WHERE-clausule voor de zoekterm
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE productnaam LIKE :searchTerm";
    $query = $conn->prepare($sql);
    $query->execute([':searchTerm' => '%' . $searchTerm . '%']); // Gebruik wildcards voor de zoekterm
    $result = $query->fetchAll();

    // Controleer of er zoekresultaten zijn
    if ($result && count($result) > 0) {
        return $result;
    } else {
        return array(); // Geef een lege array terug als er geen resultaten zijn
    }
}


 // selecteer de rij van de opgeven productcode uit de table product
 function getproduct($id){
    // Connect database
    $conn = connectDb();

    // Select data uit de opgegeven table methode prepare
    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute([':id'=>$id]);
    $result = $query->fetch();

    return $result;
 }


 function ovzproduct(){

    // Haal alle product record uit de tabel 
    $result = getData(CRUD_TABLE);
    
    //print table
    printTable($result);
    
 }

 
// Function 'PrintTable' print een HTML-table met data uit $result.
// Function 'PrintTable' print een HTML-table met data uit $result.
function printTable($result){
    // Controleer of er resultaten zijn om weer te geven
    if (empty($result)) {
        echo "<p>Geen zoekresultaten gevonden.</p>";
        return;
    }

    // Zet de hele table in een variable $table en print hem 1 keer 
    $table = "<table>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }

    // print elke rij van de tabel
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}

function crudproduct(){

    // Menu-item   insert
    $txt = "
    <h1>Producten</h1>
    <nav>
        <a href='productinsert.php'><button>Toevoegen nieuwe product</button></a>
    </nav><br>";
    echo $txt;

    // Haal alle product record uit de tabel 
    $result = getData(CRUD_TABLE);

    //print table
    printCrudproduct($result);
    
 }

// Function 'printCrudproduct' print een HTML-table met data uit $result 
// en een wzg- en -verwijder-knop.
function printCrudproduct($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table class='overviewlist'>";

    // Print header table

    // haal de kolommen uit de eerste rij [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }
    // Voeg actie kopregel toe
    $table .= "<th colspan=2 class='overviewbuttons'>Actie</th>";
    $table .= "</th>";

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";  
        }
        
        // Wijzig knopje
        $table .= "<td>
            <form method='post' action='productupdate.php?id=$row[id]' >       
                <button>Wzg</button>	 
            </form></td>";

        // Delete knopje
        $table .= "<td>
            <form method='post' action='productdelete.php?id=$row[id]' >       
                <button>Verwijder</button>	 
            </form></td>";

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function updateproduct($row){

    // Maak database connectie
    $conn = connectDb();

    // Maak een query 
    $sql = "UPDATE " . CRUD_TABLE .
    " SET 
        productnaam = :productnaam,
        prijs = :prijs,
        foto = :foto,
        type = :type
    WHERE id = :id";

    // Prepare query
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':id'=>$row['id'],
        ':productnaam'=>$row['productnaam'],
        ':prijs'=>$row['prijs'],
        ':foto'=>$row['foto'],
        ':type'=>$row['type'],
    ]);

    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}

function insertproduct($post){
    // Maak database connectie
    $conn = connectDb();

    // Maak een query 
    $sql = "
        INSERT INTO " . CRUD_TABLE . " (productnaam, prijs, foto, type)
        VALUES (:productnaam, :prijs, :foto, :type) 
    ";

    // Prepare query
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':productnaam'=>$post['productnaam'],
        ':prijs'=>$post['prijs'],
        ':foto'=>$post['foto'],
        ':type'=>$post['type'],
    ]);

    
    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;  
}

function deleteproduct($id){

    // Connect database
    $conn = connectDb();
    
    // Maak een query 
    $sql = "
    DELETE FROM " . CRUD_TABLE . 
    " WHERE id = :id";

    // Prepare query
    $stmt = $conn->prepare($sql);

    // Uitvoeren
    $stmt->execute([
    ':id'=>$_GET['id']
    ]);

    // test of database actie is gelukt
    $retVal = ($stmt->rowCount() == 1) ? true : false ;
    return $retVal;
}
?>