<?php
session_start();
$username = "";
$email = "";
$errors = array();
$corrects = array();
include 'DBconnection.php';

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //verifica che i dati inseriti siano corretti
    if(empty($email)){
        array_push($errors, "Email non valida");
    }
    if(empty($password)){
        array_push($errors, "Password non valida");
    }

    if(count($errors) == 0){
        $query_amministratore = "SELECT * FROM amministratore WHERE Email='$email'";
        $result_amministratore = mysqli_query($conn, $query_amministratore);
        $row_amministratore = mysqli_fetch_array($result_amministratore);
        if(mysqli_num_rows($result_amministratore) == 1){
            $verificato_amministratore = password_verify($password, $row_amministratore['Password']);
            if($verificato_amministratore == 1) {
                $_SESSION['IdAmministratore'] = $row_amministratore["IdAmministratore"];
                $_SESSION['Nome'] = $row_amministratore["Nome"];
                $_SESSION['Cognome'] = $row_amministratore['Cognome'];
                $_SESSION['Email'] = $row_amministratore['Email'];
                $_SESSION['Password'] = $row_amministratore['Password'];
                $_SESSION['success'] = "You are logged in";
                header('location: ../Admin/Amministratore.php');
            } else {
                array_push($errors, "Password non corretta");
            }
        }else {
            $query_responsabile = "SELECT * FROM responsabile WHERE Email='$email'";
            $result_responsabile = mysqli_query($conn, $query_responsabile);
            $row_responsabile = mysqli_fetch_array($result_responsabile);
            if(mysqli_num_rows($result_responsabile) == 1){
                $verificato_responsabile = password_verify($password, $row_responsabile['Password']);
                if($verificato_responsabile == 1) {
                    $_SESSION['IdResponsabile'] = $row_responsabile["IdResponsabile"];
                    $_SESSION['Nome'] = $row_responsabile["Nome"];
                    $_SESSION['Cognome'] = $row_responsabile['Cognome'];
                    $_SESSION['Email'] = $row_responsabile['Email'];
                    $_SESSION['Password'] = $row_responsabile['Password'];
                    $_SESSION['fk_IdAmministratore'] = $row_responsabile['fk_IdAmministratore'];
                    $_SESSION['fk_IdParco'] = $row_responsabile['fk_IdParco'];
                    $_SESSION['success'] = "You are logged in";
                    header('location: ../Admin/Responsabile.php');
                } else {
                    array_push($errors, "Password non corretta");
                }
            } else {
                array_push($errors, "Questo utente non esiste");
            }
        }
    }
}

if(isset($_POST['Aggiungi'])) {
    $cont_err = 0;
    $cont_err_txb = 0;
    for($i = 0; $i < $value; $i++) {
        include 'Import-txb.php';
        
        if($tabella == 'responsabile') {
            $query_unicità_parco = "SELECT * FROM responsabile WHERE fk_IdParco = '$txb6'";
            $result_unicità_parco = mysqli_query($conn, $query_unicità_parco);
            if(mysqli_num_rows($result_unicità_parco) > 0) {
                array_push($errors, "Riga " . ($i+1) . ": a questo parco è già stato assegnato un responsabile");
                $cont_err++;
            }
        }
        
        $cont_err = $cont_err + $cont_err_txb;

        if($cont_err == 0) {
            if($tabella == 'parco') {
                $fk_amministratore = $_SESSION['IdAmministratore'];
                $query_insert_parco = "INSERT INTO $tabella(path_immagine, Nome, Luogo, Latitudine, Longitudine, Descrizione, fk_IdAmministratore) VALUES ('$txb1', '$txb2', '$txb3', '$txb4', '$txb5', '$txb6', '$fk_amministratore')";
                move_uploaded_file($tmp_name, '../../' . $txb1);
                if(mysqli_query($conn, $query_insert_parco)) {
                    array_push($corrects, "Riga " . ($i+1) . " inserita con successo");
                } else {
                    array_push($errors, "Riga " . ($i+1) . " non inserita. Dati non corretti");
                }
            } else if($tabella == 'responsabile') {
                $pswCript = password_hash($txb4, PASSWORD_DEFAULT);
                $fk_amministratore = $_SESSION['IdAmministratore'];
                $query_insert_responsabili = "INSERT INTO $tabella(Nome, Cognome, Email, Password, fk_IdAmministratore, fk_IdParco) VALUES ('$txb1', '$txb2', '$txb3', '$pswCript', '$fk_amministratore', '$txb6')";
                if(mysqli_query($conn, $query_insert_responsabili)) {
                    array_push($corrects, "Riga " . ($i+1) . " inserita con successo");
                } else {
                    array_push($errors, "Riga " . ($i+1) . " non inserita. Dati non corretti");
                }
            } else if($tabella == 'fauna') {
                $fk_IdParco = $_SESSION['fk_IdParco'];
                $query_insert_fauna = "INSERT INTO $tabella(path_immagine, IsAdult, Sesso, Salute, fk_IdCategoria, fk_IdParco) VALUES ('$txb1', '$txb2', '$txb3', '$txb4', '$txb5', '$fk_IdParco')";
                move_uploaded_file($tmp_name, '../../' . $txb1);
                if(mysqli_query($conn, $query_insert_fauna)) {
                    array_push($corrects, "Riga " . ($i+1) . " inserita con successo");
                } else {
                    array_push($errors, "Riga " . ($i+1) . " non inserita. Dati non corretti");
                }
            } else if($tabella == 'flora') {
                $fk_IdParco = $_SESSION['fk_IdParco'];
                if($tipo == 'albero') {
                    $query_insert_albero = "INSERT INTO $tabella(path_immagine_albero, path_immagine_arbusto, path_immagine_PiantaErbacea, Stagione_fioritura, Categoria, GenereAlbero, TipoFoglie, SpecieArbusto, DimensioneArbusto, ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco ) VALUES ('$txb1', null, null, '$txb2', 'Albero', '$txb3', '$txb4', null, null, null, null, '$fk_IdParco')";
                    move_uploaded_file($tmp_name, '../../' . $txb1);
                    if(mysqli_query($conn, $query_insert_albero)) {
                        array_push($corrects, "Riga " . ($i+1) . " inserita con successo");
                    } else {
                        array_push($errors, "Riga " . ($i+1) . " non inserita. Dati non corretti");
                    }
                } else if($tipo == 'arbusto') {
                    $query_insert_arbusto = "INSERT INTO $tabella(path_immagine_albero, path_immagine_arbusto, path_immagine_PiantaErbacea, Stagione_fioritura, Categoria, GenereAlbero, TipoFoglie, SpecieArbusto, DimensioneArbusto, ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco ) VALUES (null, '$txb1', null, '$txb2', 'Arbusto', null, null, '$txb3', '$txb4', null, null, '$fk_IdParco')";
                    move_uploaded_file($tmp_name, '../../' . $txb1);
                    if(mysqli_query($conn, $query_insert_arbusto)) {
                        array_push($corrects, "Riga " . ($i+1) . " inserita con successo");
                    } else {
                        array_push($errors, "Riga " . ($i+1) . " non inserita. Dati non corretti");
                    }
                } else if($tipo == 'piantaErbacea') {
                    $query_insert_piantaErbacea = "INSERT INTO $tabella(path_immagine_albero, path_immagine_arbusto, path_immagine_PiantaErbacea, Stagione_fioritura, Categoria, GenereAlbero, TipoFoglie, SpecieArbusto, DimensioneArbusto, ClassificazionePianteErbacee, ColorePianteErbacee, fk_IdParco ) VALUES (null, null, '$txb1', '$txb2', 'Pianta erbacea', null, null, null, null, '$txb3', '$txb4', '$fk_IdParco')";
                    move_uploaded_file($tmp_name, '../../' . $txb1);
                    if(mysqli_query($conn, $query_insert_piantaErbacea)) {
                        array_push($corrects, "Riga " . ($i+1) . " inserita con successo");
                    } else {
                        array_push($errors, "Riga " . ($i+1) . " non inserita. Dati non corretti");
                    }
                }
            }
        } 
        $cont_err = 0;
    }
}

//button annulla
if(isset($_POST['Annulla'])) {
    $tabella = mysqli_real_escape_string($conn, $_POST['tabella']);
    header('location: Form-aggiungi.php?tabella=' . $tabella . '&value=1');
}

//button elimina
if(isset($_POST['elimina'])) {
    $name_id = mysqli_real_escape_string($conn, $_POST['name_id']);
    $value_id = mysqli_real_escape_string($conn, $_POST['value_id']);
    $tabella = mysqli_real_escape_string($conn, $_POST['tabella']);
    $query_delete = "DELETE FROM $tabella WHERE $name_id = $value_id";
    if(mysqli_query($conn, $query_delete)) {
        array_push($corrects, "Riga " . ($value_id+1) . " eliminata con successo");
    } else {
        array_push($errors, "Riga " . ($value_id+1) . " non eliminata. Potrebbe essere vincolata da una foreign key");
    }
}

//button modifica
if(isset($_POST['modifica'])) {
    $cont_err = 0;
    $cont_err_txb = 0;
    $i = 0;
    include 'Import-txb.php';

    $cont_err = $cont_err + $cont_err_txb;
    if($cont_err == 0) {
        if($tabella == 'parco') {
            $query_update_parco = "UPDATE $tabella 
                                    SET path_immagine = '$txb1', Nome = '$txb2', Luogo = '$txb3', Latitudine = '$txb4', Longitudine = '$txb5', Descrizione = '$txb6', fk_IdAmministratore = '$txb7' 
                                    WHERE IdParco = $id";
            if($_FILES['col1riga' . $i]["error"] == 0) {
                move_uploaded_file($tmp_name, '../../' . $txb1);
            } 
            if(mysqli_query($conn, $query_update_parco)) {
                array_push($corrects, "Riga " . ($i+1) . " modificata con successo");
            } else {
                array_push($errors, "Riga " . ($i+1) . " non modificata. Dati non corretti");
            }
        } else  if($tabella == 'responsabile') {
            $pswCript = password_hash($txb4, PASSWORD_DEFAULT);
            $query_update_responsabile = "UPDATE $tabella 
                                            SET Nome = '$txb1', Cognome = '$txb2', Email = '$txb3', Password = '$pswCript', fk_IdAmministratore = '$txb5', fk_IdParco = '$txb6' 
                                            WHERE IdResponsabile = $id";
            if(mysqli_query($conn, $query_update_responsabile)) {
                array_push($corrects, "Riga " . ($i+1) . " modificata con successo");
            } else {
                array_push($errors, "Riga " . ($i+1) . " non modificata. Dati non corretti");
            }
        } else if($tabella == 'fauna') {
            $query_update_fauna = "UPDATE $tabella 
                                    SET path_immagine = '$txb1', IsAdult = '$txb2', Sesso = '$txb3', Salute = '$txb4', fk_IdCategoria = '$txb5', fk_IdParco = '$txb6' 
                                    WHERE IdFauna = $id";
            if($_FILES['col1riga' . $i]["error"] == 0) {
                move_uploaded_file($tmp_name, '../../' . $txb1);
            } 
            if(mysqli_query($conn, $query_update_fauna)) {
                array_push($corrects, "Riga " . ($i+1) . " modificata con successo");
            } else {
                array_push($errors, "Riga " . ($i+1) . " non modificata. Dati non corretti");
            }
        } else if($tabella == 'flora') {
            if($tipo == 'albero') {
                $query_update_albero = "UPDATE $tabella 
                                        SET path_immagine_albero = '$txb1', path_immagine_arbusto = null, path_immagine_PiantaErbacea = null, Stagione_fioritura = '$txb2', Categoria = 'albero', GenereAlbero = '$txb3', TipoFoglie = '$txb4', SpecieArbusto = null, DimensioneArbusto = null, ClassificazionePianteErbacee = null, ColorePianteErbacee = null, fk_IdParco = '$txb5'
                                        WHERE IdFlora = $id";
                if($_FILES['col1riga' . $i]["error"] == 0) {
                    move_uploaded_file($tmp_name, '../../' . $txb1);
                } 
                if(mysqli_query($conn, $query_update_albero)) {
                    array_push($corrects, "Riga " . ($i+1) . " modificata con successo");
                } else {
                    array_push($errors, "Riga " . ($i+1) . " non modificata. Dati non corretti");
                }
            } else if($tipo == 'arbusto') {
                $query_update_arbusto = "UPDATE $tabella 
                                        SET path_immagine_albero = null, path_immagine_arbusto = '$txb1', path_immagine_PiantaErbacea = null, Stagione_fioritura = '$txb2', Categoria = 'arbusto', GenereAlbero = null, TipoFoglie = null, SpecieArbusto = '$txb3', DimensioneArbusto = '$txb4', ClassificazionePianteErbacee = null, ColorePianteErbacee = null, fk_IdParco = '$txb5'
                                        WHERE IdFlora = $id";
                if($_FILES['col1riga' . $i]["error"] == 0) {
                    move_uploaded_file($tmp_name, '../../' . $txb1);
                } 
                if(mysqli_query($conn, $query_update_arbusto)) {
                    array_push($corrects, "Riga " . ($i+1) . " modificata con successo");
                } else {
                    array_push($errors, "Riga " . ($i+1) . " non modificata. Dati non corretti");
                }
            } else if($tipo == 'piantaErbacea') {
                $query_update_piantaErbacea = "UPDATE $tabella 
                                        SET path_immagine_albero = null, path_immagine_arbusto = null, path_immagine_PiantaErbacea = '$txb1', Stagione_fioritura = '$txb2', Categoria = 'Pianta erbacea', GenereAlbero = null, TipoFoglie = null, SpecieArbusto = null, DimensioneArbusto = null, ClassificazionePianteErbacee = '$txb3', ColorePianteErbacee = '$txb4', fk_IdParco = '$txb5'
                                        WHERE IdFlora = $id";
                if($_FILES['col1riga' . $i]["error"] == 0) {
                    move_uploaded_file($tmp_name, '../../' . $txb1);
                } 
                if(mysqli_query($conn, $query_update_piantaErbacea)) {
                    array_push($corrects, "Riga " . ($i+1) . " modificata con successo");
                } else {
                    array_push($errors, "Riga " . ($i+1) . " non modificata. Dati non corretti");
                }
            }
        }
    }
}

//logout
if(isset($_GET['logout'])){
    if($_GET["user"] == 'amministratore') {
        unset($_SESSION['IdAmministratore']);
    } else {
        unset($_SESSION['IdResponsabile']);
        unset($_SESSION['fk_IdAmministratore']);
        unset($_SESSION['fk_IdParco']);
    }
    unset($_SESSION['Nome']);
    unset($_SESSION['Cognome']);
    unset($_SESSION['Email']);
    unset($_SESSION['Password']);
    session_destroy();
    header('location: index.php');
}
?>