<?php
$conn = mysqli_connect("localhost", "parco", "", "parco");
$responsabili = fopen("../../CSV/Responsabili.csv", "r");

while(($column = fgetcsv($responsabili, 300, ",")) !== false)
{
    $InsertResponsabile = "insert into responsabile(IdResponsabile,Nome,Cognome,Email,Password,fk_IdAmministratore, fk_IdParco) values('$column[0]','$column[1]', '$column[2]', '$column[3]', '$column[4]', '$column[5]', '$column[6]')";
    $result = mysqli_query($conn, $InsertResponsabile);
}
fclose($responsabili);
mysqli_close($conn);
?>