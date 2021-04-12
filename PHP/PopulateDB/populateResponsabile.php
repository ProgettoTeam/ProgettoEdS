<?php
include '../DBconnection.php';
$responsabili = fopen("../../CSV/Responsabili.csv", "r");

while(($column = fgetcsv($responsabili, 300, ",")) !== false)
{
    $password = password_hash($column[4], PASSWORD_DEFAULT);
    $InsertResponsabile = "insert into responsabile(IdResponsabile,Nome,Cognome,Email,Password,fk_IdAmministratore, fk_IdParco) values('$column[0]','$column[1]', '$column[2]', '$column[3]', '$password', '$column[5]', '$column[6]')";
    $result = mysqli_query($conn, $InsertResponsabile);
}
fclose($responsabili);
include '../DBclose.php';
?>