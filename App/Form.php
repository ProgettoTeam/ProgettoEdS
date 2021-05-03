
    <?php
    if(basename($_SERVER['PHP_SELF']) == 'Form-aggiungi.php') {
        for($i = 0; $i < $value; $i++) {
            include 'Tbody.php';
        }
    } else {
        $i = 0;
        include 'Tbody.php';
    }

