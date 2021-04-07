<?php
if(basename($_SERVER['PHP_SELF']) == 'index.php') {
    if(isset($_SESSION['IdAmministratore'])){
        ?>
        <li><a href="PHP/Admin/amministratore.php">Amministratore</a></li>
        <?php
    } else {
        ?>
        <li><a href="PHP/Admin/responsabile.php">Responsabile</a></li>
        <?php
    }
} else {
    if(isset($_SESSION['IdAmministratore']) && basename($_SERVER['PHP_SELF']) != 'amministratore.php'){
        ?>
        <li><a href="../Admin/amministratore.php">Amministratore</a></li>
        <?php
    } else if(isset($_SESSION['IdResponsabile']) && basename($_SERVER['PHP_SELF']) != 'responsabile.php') {
        ?>
        <li><a href="../Admin/responsabile.php">Responsabile</a></li>
        <?php
    }
}
?>