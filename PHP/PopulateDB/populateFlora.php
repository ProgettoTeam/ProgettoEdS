<?php
$conn = mysqli_connect("localhost", "parco", "", "parco");
$flora = fopen("../../CSV/Flora.csv", "r");

while(($column = fgetcsv($flora, 500, ",")) !== false)
{
    $InsertFlora = "";
    if($column[3] == 'Albero') {
        $InsertFlora = "insert into flora(IdFlora,Stagione_fioritura,path_immagine,Categoria,GenereAlbero,TipoFoglie,SpecieArbusto,DimensioneArbusto,ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco) values('$column[0]','$column[1]', '$column[2]', '$column[3]', '$column[4]', '$column[5]', NULL, NULL, NULL, NULL, '$column[10]')";
    } else if($column[3] == 'Arbusto') {
        $InsertFlora = "insert into flora(IdFlora,Stagione_fioritura,path_immagine,Categoria,GenereAlbero,TipoFoglie,SpecieArbusto,DimensioneArbusto,ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco) values('$column[0]','$column[1]', '$column[2]', '$column[3]', NULL, NULL, '$column[6]', '$column[7]', NULL, NULL, '$column[10]')";
    } else if($column[3] == 'Pianta erbacea') {
        $InsertFlora = "insert into flora(IdFlora,Stagione_fioritura,path_immagine,Categoria,GenereAlbero,TipoFoglie,SpecieArbusto,DimensioneArbusto,ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco) values('$column[0]','$column[1]', '$column[2]', '$column[3]', NULL, NULL, NULL, NULL, '$column[8]', '$column[9]', '$column[10]')";
    }
    $result = mysqli_query($conn, $InsertFlora);
}
fclose($flora);
mysqli_close($conn);
?>