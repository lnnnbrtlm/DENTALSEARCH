<?php if(count($errors) > 0): ?>
<div class="error" style="color:red;">
	<?php foreach ($errors as $error): ?>
<?php echo $error; ?>
	<?php endforeach ?>
</div>
<?php endif ?>

