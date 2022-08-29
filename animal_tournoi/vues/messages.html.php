<!-- Messages -->
<?php 
    use Modeles\Session; 
    $messages = Session::getMessages();
?>

<?php if($messages):  ?>

    <?php foreach($messages as $type => $messagesType): ?>

        <div class="alert alert-<?= $type ?>">

            <?php foreach($messagesType as $msg): ?>

                <div><?= $msg ?></div>

            <?php endforeach; ?>

        </div>

    <?php endforeach; ?>
    
<?php endif; ?>


