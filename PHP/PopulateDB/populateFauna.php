<?php
include '../DBconnection.php';
$fauna = fopen("../../CSV/Fauna.csv", "r");

while(($column = fgetcsv($fauna, 500, ",")) !== false)
{
    $InsertFauna = "insert into fauna(IdFauna,IsAdult,Sesso,Salute,path_immagine,fk_IdCategoria,fk_IdParco) values('$column[0]','$column[1]', '$column[2]', '$column[3]', '$column[4]', '$column[5]', '$column[6]')";
    $result = mysqli_query($conn, $InsertFauna);
}
fclose($fauna);
mysqli_close($conn);
?>