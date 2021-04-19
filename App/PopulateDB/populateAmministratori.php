<?php
include '../DBconnection.php';
$password1 = password_hash("password1", PASSWORD_DEFAULT);
$password2 = password_hash("password2", PASSWORD_DEFAULT);
$password3 = password_hash("password3", PASSWORD_DEFAULT);
$InsertResponsabile1 = "insert into amministratore(IdAmministratore,Nome,Cognome,Email,Password) values(1, 'Paolo', 'Rossi', 'paolo.rossi@ambiente.it', '$password1')";
$result1 = mysqli_query($conn, $InsertResponsabile1);
$InsertResponsabile2 = "insert into amministratore(IdAmministratore,Nome,Cognome,Email,Password) values(2, 'Giovanni', 'Bianchi', 'giovanni.bianchi@ambiente.it', '$password2')";
$result2 = mysqli_query($conn, $InsertResponsabile2);
$InsertResponsabile3 = "insert into amministratore(IdAmministratore,Nome,Cognome,Email,Password) values(3, 'Simone', 'Neri', 'simone.neri@ambiente.it', '$password3')";
$result3 = mysqli_query($conn, $InsertResponsabile3);
include '../DBclose.php';
?>