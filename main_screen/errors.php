<?php global $errors?>
<?php if(count($errors) > 0): ?>
    
        <?php foreach($errors as $error): ?>
        <p style="color:white;font-weight:bold;"><?php echo $error; ?></p>
        <?php endforeach?>
    
<?php endif ?>