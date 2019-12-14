<div class="form-group">
    <?php  echo  $form->label('url', t('URL')) ?>
    <?php  echo  $form->text('url', $url, array('maxlength' => 255)) ?>
</div>
<div class="form-group">
    <?php  echo  $form->label('title', t('title override')) ?>
    <?php  echo  $form->text('title', $title, array('maxlength' => 255)) ?>
    <?php  echo  $form->label('description', t('description override')) ?>
    <?php  echo  $form->text('description', $description, array('maxlength' => 255)) ?>
    <?php  echo  $form->label('image', t('image override')) ?>
    <?php  echo  $form->text('image', $image, array('maxlength' => 255)) ?>
	<?php echo $form->checkbox('targetblank', 1, $targetblank) ?><?php echo t('targetblank');?>

</div>
