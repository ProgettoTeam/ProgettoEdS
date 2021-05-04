    <?php
        $cont = 0;
        $cont_txb = 1;
        $col_tab = array();
        foreach ($fieldinfo as $val) {
            $col = $val->name;
            array_push($col_tab, $col);
        }
        if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') {
            $query = "SELECT * FROM $tabella WHERE $col_tab[0] = $value[0]";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
        }
        foreach ($fieldinfo as $val) {
            if($tabella == 'flora') {
                if(basename($_SERVER['PHP_SELF']) == 'Form-aggiungi.php') {
                    $lastCol = 12;
                } else {
                    $lastCol = 0;
                }
                if($tipo == 'albero') {
                    if($cont > 3 && $cont != 5 && $cont != 8 && $cont != 9 && $cont != 10 && $cont != 11 && $cont != $lastCol) {
                        $cont_txb++;
                        $col = $val->name;
                        if($cont != 12) {
                        ?> 
                            <div>
                                <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci <?php echo $col ?>: </label>
                                <input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>">
                            </div>
                        <?php
                        } else {
                            ?>
                            <div>
                                <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Parco: </label>

                                <?php
                                $query_find_parco_albero = "SELECT * FROM parco WHERE IdParco = '$value[$cont]'";
                                $result_parco_albero = mysqli_query($conn, $query_find_parco_albero);
                                $row_parco_albero = mysqli_fetch_array($result_parco_albero);
                                ?>
                                <input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci nome parco"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $row_parco_albero[2]; ?>" <?php } ?>">
                            </div>
                            <?php
                        }
                    } else if($cont == 0) {
                        ?>    
                        <div>
                            <div class="container-img-tab-form" id="containerimghome">
                            <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Immagine: </label>
                            <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                            </div>
                        </div>
                        <?php
                    }
                } else if($tipo == 'arbusto') {
                if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 10 && $cont != 11 && $cont != $lastCol) {
                    $cont_txb++;
                    $col = $val->name;
                    if($cont != 12) {
                    ?> 
                    <div>
                        <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci <?php echo $col ?>: </label>
                        <input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>">
                    </div>
                    <?php
                    } else {
                        ?>
                            <div>
                                <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Parco: </label>

                                <?php
                                $query_find_parco_arbusto = "SELECT * FROM parco WHERE IdParco = '$value[$cont]'";
                                $result_parco_arbusto = mysqli_query($conn, $query_find_parco_arbusto);
                                $row_parco_arbusto = mysqli_fetch_array($result_parco_arbusto);
                                ?>
                                <input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci nome parco"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $row_parco_arbusto[2]; ?>" <?php } ?>">
                            </div>
                        <?php
                    }
                } else if($cont == 0) {
                    ?>    
                    <div>
                        <div class="container-img-tab-form" id="containerimghome">
                        <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Immagine: </label>
                        <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                        </div>
                    </div>
                    <?php
                }
                } else if($tipo == 'piantaErbacea') {
                    if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 8 && $cont != 9 && $cont != $lastCol) {
                        $cont_txb++;
                        $col = $val->name;
                        if($cont != 12) {
                        ?> 
                        <div>
                            <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci <?php echo $col ?>: </label>
                            <input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>">
                            </div>
                        <?php
                        } else {
                            ?>
                            <div>
                                <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Parco: </label>

                                <?php
                                $query_find_parco_piantaErbacea = "SELECT * FROM parco WHERE IdParco = '$value[$cont]'";
                                $result_parco_piantaErbacea = mysqli_query($conn, $query_find_parco_piantaErbacea);
                                $row_parco_piantaErbacea = mysqli_fetch_array($result_parco_piantaErbacea);
                                ?>
                                <input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci nome parco"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $row_parco_piantaErbacea[2]; ?>" <?php } ?>">
                            </div>
                        <?php
                        }
                    } else if($cont == 0) {
                        ?>    
                        <div>
                            <div class="container-img-tab-form" id="containerimghome">
                            <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Immagine: </label>
                            <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                            </div>
                        </div>
                        <?php
                    }
                }
            } else {
                if($tabella == 'responsabile') {
                    if($cont > 0) {
                        $col = $val->name;
                        if($col == "Password") {
                            ?>
                            <div>
                            <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Password: </label>
                            <input type="password" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>"  placeholder="********">
                            </div>
                            <?php
                        } else if($col == "fk_IdParco") {
                            ?>
                            <div>
                            <label for="col<?php echo $cont_txb?>riga<?php echo $i?>">Inserisci Parco: </label>
                            <input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>"  placeholder="Inserisci nome parco">
                            </div>
                            <?php
                        } else {
                        ?>
                        <?php
                            if($cont != 5) {
                            ?>
                                <div>
                                <label for="col<?php echo $cont?>riga<?php echo $i?>">Inserisci <?php echo $col ?>: </label>
                                <input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>">
                                </div>
                            <?php
                            }
                        }
                        ?> 
                        <?php
                    } 
                } else if($tabella == 'fauna') {
                    if(basename($_SERVER['PHP_SELF']) == 'Form-aggiungi.php') {
                        $limite_txb = (count($fieldinfo)) - 1;
                    } else {
                        $limite_txb = count($fieldinfo);
                    }
                    if($cont < $limite_txb) {
                        if($cont > 1 && $cont != 5) {
                            $col = $val->name;
                            ?> 
                            <div>
                                <label for="col<?php echo $cont?>riga<?php echo $i?>">Inserisci <?php echo $col ?>: </label>
                                <input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>">
                            </div>
                            <?php
                        } else if($cont == 1) {
                            ?>
                            <div class="container-img-tab-form"  id="containerimghome">
                                <label for="col<?php echo $cont?>riga<?php echo $i?>">Inserisci Immagine: </label>
                                <input type="file" class="upload_image" name="col<?php echo $cont?>riga<?php echo $i?>"></input>
                            </div>
                            <?php
                        } else if($cont == 5) {
                            ?>
                            <div class="container-img-tab-form"  id="containerimghome">
                                <label for="col<?php echo $cont?>riga<?php echo $i?>">Inserisci Specie: </label>
                                <input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci la specie"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>">
                            </div>
                            <?php
                        } 
                    }          
                } else {
                    if($cont > 1 && $cont != 7) {
                        $col = $val->name;
                        ?> 
                        <div>
                            <label for="col<?php echo $cont?>riga<?php echo $i?>">Inserisci <?php echo $col ?>: </label>
                            <?php
                            if($cont == 6) {
                            ?>
                                <textarea type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i ?>" placeholder="Inserisci <?php echo $col ?>"><?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { echo $value[$cont]; } ?></textarea>
                            <?php
                            } else {
                            ?>
                                <input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'Form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>">

                            <?php
                            }
                            ?>
                        </div>
                        <?php
                    } else if($cont == 1 && $tabella != 'responsabile') {
                        $col = $val->name;
                        ?>    
                        <div>
                            <div class="container-img-tab-form-form" id="containerimghome">
                                <label for="col<?php echo $cont?>riga<?php echo $i?>">Inserisci Immagine: </label>
                                <input type="file" class="upload_image" name="col<?php echo $cont?>riga<?php echo $i?>"></input>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
        $cont++;
        }
    ?>
