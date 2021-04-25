
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/29dd549171.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    <?php
    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
        ?>
            <link rel="icon" href="favicon.png">
        <?php
    } else {
        ?>
            <link rel="icon" href="../../favicon.png">
        <?php
    }
    ?>

    <?php
    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
        ?>
        <link rel="stylesheet" href="Css/style.css">
        <?php
    } else {
        ?>
        <link rel="stylesheet" href="../../Css/style.css">
        <?php
    }

    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
        ?>
        <script src="Js/index.js"></script>
        <?php
    } else {
        ?>
        <script src="../../Js/index.js"></script>
        <?php
    }
    ?>


    <?php
    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
        ?>
        <title>HOME | ParchiNazionali</title>
        <?php
    } else if(basename($_SERVER['PHP_SELF']) == 'Aboutus.php') {
        ?>
        <title>ABOUT US | ParchiNazionali</title>
        <?php
    } else if(basename($_SERVER['PHP_SELF']) == 'Help.php') {
        ?>
        <title>HELP | ParchiNazionali</title>
        <?php
    } else if(basename($_SERVER['PHP_SELF']) == 'login.php') {
        ?>
        <title>LOGIN | ParchiNazionali</title>
        <?php
    } else if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') {
        ?>
        <title>AMMINISTRATORE | ParchiNazionali</title>
        <?php
    } else if(basename($_SERVER['PHP_SELF']) == 'responsabile.php') {
        ?>
        <title>RESPONSABILE | ParchiNazionali</title>
        <?php
    } else if(basename($_SERVER['PHP_SELF']) == 'form-aggiungi.php') {
        ?>
        <title>AGGIUNGI | ParchiNazionali</title>
        <?php
    } else if(basename($_SERVER['PHP_SELF']) == 'form-modifica.php') {
        ?>
        <title>MODIFICA | ParchiNazionali</title>
        <?php
    } 
    ?>

    
  
    <!-- ###################### -->


    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>