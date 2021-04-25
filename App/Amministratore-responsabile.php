<?php
if(isset($_SESSION['success'])) {
    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
        if(isset($_SESSION['IdAmministratore'])){
            ?>
            <li><a href="App/Admin/Amministratore.php">Amministratore</a></li>
            <?php
        } else {
            ?>
            <li><a href="App/Admin/Responsabile.php">Responsabile</a></li>
            <?php
        }
    } else {
        if(isset($_SESSION['IdAmministratore']) && basename($_SERVER['PHP_SELF']) != 'Amministratore.php'){
            ?>
            <li><a href="../Admin/Amministratore.php">Amministratore</a></li>
            <?php
        } else if(isset($_SESSION['IdResponsabile']) && basename($_SERVER['PHP_SELF']) != 'Responsabile.php') {
            ?>
            <li><a href="../Admin/Responsabile.php">Responsabile</a></li>
            <?php
        }
    }
}
?>