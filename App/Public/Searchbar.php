
    <div class="bottone">
        <div class="search-container">
            <form action="<?php basename($_SERVER['PHP_SELF']) ?>" method="POST">
            <?php
                if($tabella == 'parco') {
                    ?>
                        <input type="text" placeholder="Nome" name="search">
                        <button type="submit" name="submit_parco"><i class="fa fa-search"></i></button>
                    <?php
                } else if($tabella == 'fauna') {
                    ?>
                        <input type="text" placeholder="Specie" name="search">
                        <button type="submit" name="submit_fauna"><i class="fa fa-search"></i></button>
                    <?php
                } else if($tabella == 'alberi') {
                    ?>
                        <input type="text" placeholder="Genere" name="search">
                        <button type="submit" name="submit_alberi"><i class="fa fa-search"></i></button>
                    <?php
                } else if($tabella == 'arbusti') {
                    ?>
                        <input type="text" placeholder="Specie" name="search">
                        <button type="submit" name="submit_arbusti"><i class="fa fa-search"></i></button>
                    <?php
                } else if($tabella == 'piante erbacee') {
                    ?>
                        <input type="text" placeholder="Classificazione" name="search">
                        <button type="submit" name="submit_pianteErbacee"><i class="fa fa-search"></i></button>
                    <?php
                } else if($tabella == 'responsabile') {
                    ?>
                        <input type="text" placeholder="Cognome" name="search">
                        <button type="submit" name="submit_responsabile"><i class="fa fa-search"></i></button>
                    <?php
                }
            ?>
            </form>
        </div>
    </div>
