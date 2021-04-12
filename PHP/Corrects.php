<?php 
if(count($corrects) > 0){
    ?>
    <div class="correct">
        <?php 
        foreach($corrects as $correct){
            ?>
            <p>
                <?php echo $correct; ?>
            </p>
            <?php
        }
        ?>
    </div>
    <?php
}
?>