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
<!-- <form action="form-modifica.php" method="POST">
    <input name = "tab" value = "<?php //echo $tab ?>" style = "display: none">
    <?php
    //$i = 0;
    //foreach($row as $val) {
        //$i = $i + 1;
        ?>
        <input name = "attributo<?php //echo $i ?>" value = "<?php //echo $val ?>" style = "display: none">
        <?php
    //}
    //$cont3 = 0;
    ?>
</form> -->
    <a class=" btn btn-success btn-lg" href="form-modifica.php?tabella=<?php echo $tab ?>&id=<?php echo $row[0] ?>">Modifica</a>
</td>
<td>
    <form action="<?php if(basename($_SERVER['PHP_SELF']) == 'amministratore.php') { echo "amministratore.php"; } else { echo "responsabile.php"; }?>" method="POST">
        <input name = "name_id" value = "<?php echo $arr_col[0] ?>" style = "display: none">
        <input name = "value_id" value = "<?php echo $row[0] ?>" style = "display: none">
        <input name = "tabella" value = "<?php echo $tab ?>" style = "display: none">
        <button class=" btn btn-success btn-lg elimina" name="elimina">Elimina</button>
    </form>
</td>