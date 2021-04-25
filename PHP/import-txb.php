<?php
    if($tabella == 'responsabile') {
        if(isset($_POST['col1riga' . $i])) {
            $txb1 = mysqli_real_escape_string($conn, $_POST['col1riga' . $i]);
            if($txb1 == '') {
                $cont_err_txb++;
            }
        }
    } else {
        if($_FILES['col1riga' . $i]["error"] == 0) {
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
            if(isset($_POST['modifica'])) {
                if($tabella == 'parco') {
                    $get_parco = "SELECT * FROM $tabella WHERE IdParco = '$id'";
                    $result_parco = mysqli_query($conn, $get_parco);
                    $row_parco = mysqli_fetch_array($result_parco);
                    $txb1 = $row_parco[1];
                } else if($tabella == 'fauna') {
                    $get_fauna = "SELECT * FROM $tabella WHERE IdFauna = '$id'";
                    $result_fauna = mysqli_query($conn, $get_fauna);
                    $row_fauna = mysqli_fetch_array($result_fauna);
                    $txb1 = $row_fauna[1];
                } else if($tabella == 'flora') {
                    if($tipo == 'albero') {
                        $get_albero = "SELECT * FROM $tabella WHERE IdFlora = '$id'";
                        $result_albero = mysqli_query($conn, $get_albero);
                        $row_albero = mysqli_fetch_array($result_albero);
                        $txb1 = $row_albero[1];
                    } else if($tipo == 'arbusto') {
                        $get_arbusto = "SELECT * FROM $tabella WHERE IdFlora = '$id'";
                        $result_arbusto = mysqli_query($conn, $get_arbusto);
                        $row_arbusto = mysqli_fetch_array($result_arbusto);
                        $txb1 = $row_arbusto[2];
                    } else if($tipo == 'piantaErbacea') {
                        $get_piantaErbacea = "SELECT * FROM $tabella WHERE IdFlora = '$id'";
                        $result_piantaErbacea = mysqli_query($conn, $get_piantaErbacea);
                        $row_piantaErbacea = mysqli_fetch_array($result_piantaErbacea);
                        $txb1 = $row_piantaErbacea[3];
                    }
                }
            } else {
                array_push($errors, "Hai dimenticato di inserire l'immagine");
                $cont_err++;
            }
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
?>