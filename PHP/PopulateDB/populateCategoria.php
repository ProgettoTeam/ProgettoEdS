<?php
include '../DBconnection.php';
$categorie = fopen("../../CSV/Categorie_fauna.csv", "r");

while(($column = fgetcsv($categorie, 30, ",")) !== false)
{
    $InsertCategoria = "insert into categoria(IdCategoria,OrdineAppartenenza,Specie) values('$column[0]','$column[1]', '$column[2]')";
    $result = mysqli_query($conn, $InsertCategoria);
}
fclose($categorie);
include '../DBclose.php';
?>