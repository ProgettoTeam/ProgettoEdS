<table id="table" class="table table-bordered table-striped">
    <thead>
        <tr>
            <?php
            $cont = 0;
            foreach ($fieldinfo as $val) {
                if($tabella == 'flora') {
                    if($tipo == 'albero') {
                        if($cont > 3 && $cont != 5 && $cont < 8) {
                        $col = $val->name;
                        ?> 
                            <th> <?php echo $col ?></th>
                        <?php
                        } else if($cont == 1) {
                        ?>
                            <th> Immagine </th>
                        <?php
                        }
                    } else if($tipo == 'arbusto') {
                        if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont < 10) {
                        $col = $val->name;
                        ?> 
                            <th> <?php echo $col ?></th>
                        <?php
                        } else if($cont == 1) {
                        ?>
                            <th> Immagine </th>
                        <?php
                        }
                    } else if($tipo == 'piantaErbacea') {
                        if($cont > 3 && $cont != 5 && $cont != 6 && $cont != 7 && $cont != 8 && $cont != 9 && $cont != 12) {
                        $col = $val->name;
                        ?> 
                            <th> <?php echo $col ?></th>
                        <?php
                        } else if($cont == 1) {
                        ?>
                            <th> Immagine </th>
                        <?php
                        }
                    }
                } else {
                    if($tabella == 'responsabile') {
                        if($cont > 0) {
                        $col = $val->name;
                        ?> 
                            <th> <?php echo $col ?></th>
                        <?php
                        }
                    } else if($tabella == 'fauna') {
                        if($cont < (count($fieldinfo)) - 1) {
                            if($cont > 1) {
                                $col = $val->name;
                                ?> 
                                <th> <?php echo $col ?></th>
                                <?php
                            } else if($cont == 1 && $tabella != 'responsabile') {
                                ?>
                                <th> Immagine </th>
                                <?php
                            }
                        }
                    } else {
                        if($cont > 1) {
                        $col = $val->name;
                        ?> 
                            <th><?php echo $col ?></th>
                        <?php
                        } else if($cont == 1 && $tabella != 'responsabile') {
                        ?>
                            <th> Immagine </th>
                        <?php
                        }
                    }
                }
                $cont++;
            }
            mysqli_free_result($result);
            ?>
        </tr>
    </thead>
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') {
        for($i = 0; $i < $value; $i++) {
            include 'tbody.php';
        }
    } else {
        include 'tbody.php';
    }
    ?>
</table>