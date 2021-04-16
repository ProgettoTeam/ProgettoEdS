<tbody>
    <?php
        $cont = 0;
        $cont_txb = 1;
        $col_tab = array();
        foreach ($fieldinfo as $val) {
            $col = $val->name;
            array_push($col_tab, $col);
        }
        if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') {
            $query = "SELECT * FROM $tabella WHERE $col_tab[0] = $value[0]";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
        }
        foreach ($fieldinfo as $val) {
            if($tabella == 'flora') {
                if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') {
                    $lastCol = 12;
                } else {
                    $lastCol = 0;
                }
                if($tipo == 'albero') {
                    if($cont > 3 && $cont != 5 && $cont != 8 && $cont != 9 && $cont != 10 && $cont != 11 && $cont != $lastCol) {
                        $cont_txb++;
                        $col = $val->name;
                        ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                        <?php
                    } else if($cont == 0) {
                        ?>    
                        <td>
                            <div class="container-img-tab" id="containerimghome">
                            <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                            </div>
                        </td>
                        <?php
                    }
                } else if($tipo == 'arbusto') {
                if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 10 && $cont != 11 && $cont != $lastCol) {
                    $cont_txb++;
                    $col = $val->name;
                    ?> 
                    <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                    <?php
                } else if($cont == 0) {
                    ?>    
                    <td>
                        <div class="container-img-tab" id="containerimghome">
                        <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                        </div>
                    </td>
                    <?php
                }
                } else if($tipo == 'piantaErbacea') {
                    if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 8 && $cont != 9 && $cont != $lastCol) {
                        $cont_txb++;
                        $col = $val->name;
                        ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                        <?php
                    } else if($cont == 0) {
                        ?>    
                        <td>
                            <div class="container-img-tab" id="containerimghome">
                            <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                            </div>
                        </td>
                        <?php
                    }
                }
            } else {
                if($tabella == 'responsabile') {
                    if($cont > 0) {
                        $col = $val->name;
                        if($col == "Password") {
                            $pswCript = password_hash($value[$cont], PASSWORD_DEFAULT);
                            ?>
                            <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>"  placeholder="********"></td>
                            <?php
                        } else {
                        ?>
                            <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                        <?php
                        }
                        ?> 
                        <?php
                    } 
                } else if($tabella == 'fauna') {
                    if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') {
                        $limite_txb = (count($fieldinfo)) - 1;
                    } else {
                        $limite_txb = count($fieldinfo);
                    }
                    if($cont < $limite_txb) {
                        if($cont > 1) {
                            $col = $val->name;
                            ?> 
                            <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                            <?php
                        } else if($cont == 1) {
                            ?>
                            <td>
                            <div class="container-img-tab" id="containerimghome">
                                <input type="file" class="upload_image" name="col<?php echo $cont?>riga<?php echo $i?>"></input>
                            </div>
                            </td>
                            <?php
                        }  
                    }          
                } else {
                    if($cont > 1) {
                        $col = $val->name;
                        ?> 
                        <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" placeholder="Inserisci <?php echo $col ?>"<?php if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                        <?php
                    } else if($cont == 1 && $tabella != 'responsabile') {
                        $col = $val->name;
                        ?>    
                        <td>
                            <div class="container-img-tab" id="containerimghome">
                                <input type="file" class="upload_image" name="col<?php echo $cont?>riga<?php echo $i?>"></input>
                            </div>
                        </td>
                        <?php
                    }
                }
            }
        $cont++;
        }
    ?>
</tbody>