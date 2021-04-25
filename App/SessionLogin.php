<?php
    if(isset($_SESSION['success'])) {
        $nome = $_SESSION["Nome"];
        $cognome = $_SESSION["Cognome"];
        if($navbar == 1) {
            if(basename($_SERVER['PHP_SELF']) == 'index.php') {
                if(isset($_SESSION['IdAmministratore'])){
                ?>
                    <li> <span class="fas fa-crown"> <span class="username"><?php echo $nome ?> <?php echo $cognome ?></span> </span> </p> <a href="index.php?logout=1&user=amministratore"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <?php
                } else {
                ?>
                    <li> <span class="fas fa-user-tie"> <span class="username"><?php echo $nome ?> <?php echo $cognome ?></span> </span> <a href="index.php?logout=1&user=responsabile"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <?php
                }
            } else {
                if(isset($_SESSION['IdAmministratore'])){
                ?>
                    <li> <span class="fas fa-crown"> <span class="username"><?php echo $nome ?> <?php echo $cognome ?></span> </span> <a href="../../index.php?logout=1&user=amministratore"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <?php
                } else {
                ?>
                    <li> <span class="fas fa-user-tie"> <span class="username"><?php echo $nome ?> <?php echo $cognome ?></span> </span> <a href="../../index.php?logout=1&user=responsabile"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    <?php
                }
            }
        } else {
            if(basename($_SERVER['PHP_SELF']) == 'index.php') {
                if(isset($_SESSION['IdAmministratore'])){
                ?>
                    <li> <a href="index.php?logout=1&user=amministratore"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                <?php
                } else {
                ?>
                    <li> <a href="index.php?logout=1&user=responsabile"><i class="fas fa-sign-out-alt"></i></span> Logout</a></li>
                <?php
                }
            } else {
                if(isset($_SESSION['IdAmministratore'])){
                ?>
                    <li> <a href="../../index.php?logout=1&user=amministratore"><i class="fas fa-sign-out-alt"></i></span> Logout</a></li>
                <?php
                } else {
                ?>
                    <li> <a href="../../index.php?logout=1&user=responsabile"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    <?php
                }
            }
        }
    } else {
        if(basename($_SERVER['PHP_SELF']) == 'index.php') {
        ?>
            <li><a href="App/Public/Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php
        } else {
        ?>
            <li><a href="../Public/Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php
        }
    }
?>