<?php
session_start();
$username = "";
$email = "";
$errors = array();
$conn = mysqli_connect("localhost", "parco", "", "parco");

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //verifica che i dati inseriti siano corretti
    if(empty($email)){
        array_push($errors, "Invalid email");
    }
    if(empty($password)){
        array_push($errors, "Invalid password");
    }

    if(count($errors) == 0){
        $query_amministratore = "SELECT * FROM amministratore WHERE Email='$email'";
        $result_amministratore = mysqli_query($conn, $query_amministratore);
        $row_amministratore = mysqli_fetch_array($result_amministratore);
        if(mysqli_num_rows($result_amministratore) == 1){
            $verificato_amministratore = password_verify($password, $row_amministratore['Password']);
            if($verificato_amministratore == 1) {
                $_SESSION['IdAmministratore'] = $row_amministratore["IdAmministratore"];
                $_SESSION['Nome'] = $row_amministratore["Nome"];
                $_SESSION['Cognome'] = $row_amministratore['Cognome'];
                $_SESSION['Email'] = $row_amministratore['Email'];
                $_SESSION['Password'] = $row_amministratore['Password'];
                $_SESSION['success'] = "You are logged in";
                header('location: ../Admin/amministratore.php');
            } else {
                array_push($errors, "Incorrect password");
            }
        }else {
            $query_responsabile = "SELECT * FROM responsabile WHERE Email='$email'";
            $result_responsabile = mysqli_query($conn, $query_responsabile);
            $row_responsabile = mysqli_fetch_array($result_responsabile);
            if(mysqli_num_rows($result_responsabile) == 1){
                $verificato_responsabile = password_verify($password, $row_responsabile['Password']);
                if($verificato_responsabile == 1) {
                    $_SESSION['IdResponsabile'] = $row_responsabile["IdResponsabile"];
                    $_SESSION['Nome'] = $row_responsabile["Nome"];
                    $_SESSION['Cognome'] = $row_responsabile['Cognome'];
                    $_SESSION['Email'] = $row_responsabile['Email'];
                    $_SESSION['Password'] = $row_responsabile['Password'];
                    $_SESSION['fk_IdAmministratore'] = $row_responsabile['fk_IdAmministratore'];
                    $_SESSION['fk_IdParco'] = $row_responsabile['fk_IdParco'];
                    $_SESSION['success'] = "You are logged in";
                    header('location: ../Admin/responsabile.php');
                } else {
                    array_push($errors, "Incorrect password");
                }
            } else {
                array_push($errors, "This user doesn't exist");
            }
        }
    }
}
?>