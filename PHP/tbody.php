<tbody>
    <?php
        $cont = 0;
        $cont_txb = 1;
        foreach ($fieldinfo as $val) {
        if($tabella == 'flora') {
            if($tipo == 'albero') {
            if($cont > 3 && $cont != 5 && $cont < 8) {
                $cont_txb++;
                $col = $val->name;
                ?> 
                <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" <?php if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') { ?> placeholder="Inserisci <?php echo $col ?>"<?php } else { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>></td>
                <?php
            } else if($cont == 0) {
                ?>    
                <td>
                    <div class="container-img-tab" id="containerimghome">
                    <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                    <!-- <div class="overlay-tab">
                        <div class="text">Inserisci immagine</div>
                    </div> -->
                    </div>
                </td>
                <?php
            }
            } else if($tipo == 'arbusto') {
            if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont < 10) {
                $cont_txb++;
                $col = $val->name;
                ?> 
                <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" <?php if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') { ?> placeholder="Inserisci <?php echo $col ?>"<?php } else { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                <?php
            } else if($cont == 0) {
                ?>    
                <td>
                    <div class="container-img-tab" id="containerimghome">
                    <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                    <!-- <div class="overlay-tab">
                        <div class="text">Inserisci immagine</div>
                    </div> -->
                    </div>
                </td>
                <?php
            }
            } else if($tipo == 'piantaErbacea') {
            if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 8 && $cont != 9 && $cont != 12) {
                $cont_txb++;
                $col = $val->name;
                ?> 
                <td><input type="text" class="campoN" name="col<?php echo $cont_txb?>riga<?php echo $i?>" <?php if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') { ?> placeholder="Inserisci <?php echo $col ?>"<?php } else { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>></td>
                <?php
            } else if($cont == 0) {
                ?>    
                <td>
                    <div class="container-img-tab" id="containerimghome">
                    <input type="file" class="upload_image" name="col<?php echo $cont_txb?>riga<?php echo $i?>"></input>
                    <!-- <div class="overlay-tab">
                        <div class="text">Inserisci immagine</div>
                    </div> -->
                    </div>
                </td>
                <?php
            }
            }
        } else {
            if($tabella == 'responsabile') {
            if($cont > 0) {
                $col = $val->name;
                ?> 
                <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" <?php if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') { ?> placeholder="Inserisci <?php echo $col ?>"<?php } else { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
                <?php
            } 
            } else if($tabella == 'fauna') {
                if($cont < (count($fieldinfo)) - 1) {
                if($cont > 1) {
                    $col = $val->name;
                    ?> 
                    <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" <?php if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') { ?> placeholder="Inserisci <?php echo $col ?>"<?php } else { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>></td>
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
                <td><input type="text" class="campoN" name="col<?php echo $cont?>riga<?php echo $i?>" <?php if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') { ?> placeholder="Inserisci <?php echo $col ?>"<?php } else { ?> value="<?php echo $value[$cont]; ?>" <?php } ?>"></td>
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