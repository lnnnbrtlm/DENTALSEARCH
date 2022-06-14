<?php if(count($errors) > 0): ?>
<div class="error">
	<?php foreach ($errors as $error): ?>
<h5><?php echo $error; ?>
	<?php endforeach ?>
</div>
<?php endif ?>

