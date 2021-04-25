<?php
$arr_col = array();
$cont4 = 0;
foreach ($fieldinfo as $val) {
    $col = $val->name;
    array_push($arr_col, $col);
    $cont4++;
}
?>
<td>
    <a class=" btn btn-success btn-lg" href="Form-modifica.php?tabella=<?php echo $tab ?><?php if($tab == 'flora') { echo '&tipo=' . $tipo; }?>&id=<?php echo $row[0] ?>">Modifica</a>
</td>
<td>
    <form action="<?php if(basename($_SERVER['PHP_SELF']) == 'Amministratore.php') { echo "Amministratore.php"; } else { echo "Responsabile.php"; }?>" method="POST">
        <input name = "name_id" value = "<?php echo $arr_col[0] ?>" style = "display: none">
        <input name = "value_id" value = "<?php echo $row[0] ?>" style = "display: none">
        <input name = "tabella" value = "<?php echo $tab ?>" style = "display: none">
        <button class=" btn btn-success btn-lg elimina" name="elimina">Elimina</button>
    </form>
</td>