<?php
session_start();
$username = "";
$email = "";
$errors = array();
$corrects = array();
$conn = mysqli_connect("localhost", "parco", "", "parco");

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
                header('location: ../Admin/amministratore.php');
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
                    header('location: ../Admin/responsabile.php');
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
        if($tabella == 'responsabile') {
            if(isset($_POST['col1riga' . $i])) {
                $txb1 = mysqli_real_escape_string($conn, $_POST['col1riga' . $i]);
                if($txb1 == '') {
                    $cont_err_txb++;
                }
            }
        } else {
            if(isset($_FILES['col1riga' . $i])) {
                if($tabella == 'parco') {
                    $txb1 = "CSS/img_parchi/" . basename($_FILES['col1riga' . $i]['name']);
                } else if($tabella == 'fauna') {
                    $txb1 = "CSS/img_fauna/" . basename($_FILES['col1riga' . $i]['name']);
                } else if($tabella == 'flora') {
                    if($tipo == 'albero') {
                        $txb1 = "CSS/img_flora/Alberi/" . basename($_FILES['col1riga' . $i]['name']);
                    } else if($tipo == 'arbusto') {
                        $txb1 = "CSS/img_flora/Arbusti/" . basename($_FILES['col1riga' . $i]['name']);
                    } else if($tipo == 'piantaErbacea') {
                        $txb1 = "CSS/img_flora/PianteErbacee/" . basename($_FILES['col1riga' . $i]['name']);
                    }
                }
                $img_name = $_FILES['col1riga' . $i]['name'];
                $img_size = $_FILES['col1riga' . $i]['size'];
                $img_type = $_FILES['col1riga' . $i]['type'];
                $tmp_name = $_FILES['col1riga' . $i]['tmp_name'];
                if($img_size > 1000000) {
                    array_push($errors, "Riga " . ($i+1) .": questa immagine è troppo grande");
                    $cont_err++;
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    if(!in_array($img_ex_lc, array("jpg", "jpeg", "png"))) {
                        array_push($errors, "Riga " . ($i+1) .": questo tipo di file non è supportato");
                        $cont_err++;
                    } 
                }
            } else {
                array_push($errors, "Hai dimenticato di inserire l'immagine");
                $cont_err++;
            }
        }
        if(isset($_POST['col2riga' . $i])) {
            $txb2 = mysqli_real_escape_string($conn, $_POST['col2riga' . $i]);
            if($txb2 == '') {
                $cont_err_txb++;
            }
        }
        if(isset($_POST['col3riga' . $i])) {
            $txb3 = mysqli_real_escape_string($conn, $_POST['col3riga' . $i]);
            if($txb3 == '') {
                $cont_err_txb++;
            }
        }
        if(isset($_POST['col4riga' . $i])) {
            $txb4 = mysqli_real_escape_string($conn, $_POST['col4riga' . $i]);
            if($txb4 == '') {
                $cont_err_txb++;
            }
        }
        if(isset($_POST['col5riga' . $i])) {
            $txb5 = mysqli_real_escape_string($conn, $_POST['col5riga' . $i]);
            if($txb5 == '') {
                $cont_err_txb++;
            }
        }
        if(isset($_POST['col6riga' . $i])) {
            $txb6 = mysqli_real_escape_string($conn, $_POST['col6riga' . $i]);
            if($txb6 == '') {
                $cont_err_txb++;
            }
        }
        if(isset($_POST['col7riga' . $i])) {
            $txb7 = mysqli_real_escape_string($conn, $_POST['col7riga' . $i]);
            if($txb7 == '') {
                $cont_err_txb++;
            }
        } 

        if($cont_err_txb > 0) {
            array_push($errors, "Riga " . ($i+1) . ": è necessario compilare tutti i campi");
            $cont_err++;
        } 
        
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
                $query_insert_parco = "INSERT INTO $tabella(path_immagine, Nome, Luogo, Latitudine, Longitudine, Descrizione, fk_IdAmministratore) VALUES ('$txb1', '$txb2', '$txb3', '$txb4', '$txb5', '$txb6', '$txb7')";
                move_uploaded_file($tmp_name, '../../' . $txb1);
                if(mysqli_query($conn, $query_insert_parco)) {
                    array_push($corrects, "Riga " . ($i+1) . " inserita con successo");
                } else {
                    array_push($errors, "Riga " . ($i+1) . " non inserita. Dati non corretti");
                }
            } else if($tabella == 'responsabile') {
                $pswCript = password_hash($txb4, PASSWORD_DEFAULT);
                $query_insert_responsabili = "INSERT INTO $tabella(Nome, Cognome, Email, Password, fk_IdAmministratore, fk_IdParco) VALUES ('$txb1', '$txb2', '$txb3', '$pswCript', '$txb5', '$txb6')";
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

        /*if($tabella == 'responsabile') {
            $query_insert_parco = "INSERT INTO $tabella(path_immagine, Nome, Luogo, Latitudine, Longitudine, Descrizione, fk_IdAmministratore) VALUES ()"
        }*/
        //$query_insert = "INSERT INTO $tabella (" . foreach ($fieldinfo as $sos) { echo($sos . ',')} . ") VALUES(" . foreach ($columns as $txb) { echo($txb . ',')} . ")";
        //echo $query_insert;
        //mysqli_query($conn, $query_insert);
    }
    //header('location: form-aggiungi.php?tabella=' . $tabella . '&value=1');
}

if(isset($_POST['Annulla'])) {
    $tabella = mysqli_real_escape_string($conn, $_POST['tabella']);
    header('location: form-aggiungi.php?tabella=' . $tabella . '&value=1');
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