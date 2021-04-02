<?php
include '../DBconnection.php';
$parchi = fopen("../../CSV/Parchi.csv", "r");

while(($column = fgetcsv($parchi, 220, ",")) !== false)
{
    $InsertParco = "insert into parco(IdParco,Nome,Luogo,Latitudine,Longitudine,Descrizione,path_immagine,fk_IdAmministratore) values('$column[0]','$column[1]', '$column[2]', '$column[3]', '$column[4]', '$column[5]', '$column[6]', '$column[7]')";
    $result = mysqli_query($conn, $InsertParco);
}
fclose($parchi);
mysqli_close($conn);
?>