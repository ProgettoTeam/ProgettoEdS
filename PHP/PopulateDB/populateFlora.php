<?php
include '../DBconnection.php';
$flora = fopen("../../CSV/Flora.csv", "r");

while(($column = fgetcsv($flora, 500, ",")) !== false)
{
    $InsertFlora = "";
    if($column[5] == 'Albero') {
        $InsertFlora = "insert into flora(IdFlora,Stagione_fioritura,path_immagine_albero,path_immagine_arbusto,path_immagine_PiantaErbacea,Categoria,GenereAlbero,TipoFoglie,SpecieArbusto,DimensioneArbusto,ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco) values('$column[0]','$column[1]', '$column[2]', NULL, NULL, '$column[5]', '$column[6]', '$column[7]', NULL, NULL, NULL, NULL, '$column[12]')";
    } else if($column[5] == 'Arbusto') {
        $InsertFlora = "insert into flora(IdFlora,Stagione_fioritura,path_immagine_albero,path_immagine_arbusto,path_immagine_PiantaErbacea,Categoria,GenereAlbero,TipoFoglie,SpecieArbusto,DimensioneArbusto,ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco) values('$column[0]', '$column[1]', NULL, '$column[3]', NULL, '$column[5]', NULL, NULL, '$column[8]', '$column[9]', NULL, NULL, '$column[12]')";
    } else if($column[5] == 'Pianta erbacea') {
        $InsertFlora = "insert into flora(IdFlora,Stagione_fioritura,path_immagine_albero,path_immagine_arbusto,path_immagine_PiantaErbacea,Categoria,GenereAlbero,TipoFoglie,SpecieArbusto,DimensioneArbusto,ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco) values('$column[0]','$column[1]', NULL, NULL, '$column[4]', '$column[5]', NULL, NULL, NULL, NULL, '$column[10]', '$column[11]', '$column[12]')";
    }
    $result = mysqli_query($conn, $InsertFlora);
}
fclose($flora);
mysqli_close($conn);
?>