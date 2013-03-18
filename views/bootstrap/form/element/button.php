<?php if($element->get('dropdown') instanceof Bootstrap_Dropdown_Menu): ?>

	<?php echo Form::button(NULL, $element->get('body') . ' ' . Bootstrap_Dropdown_Menu::caret(), $attributes->as_array()); ?>
	<?php echo $element->get('dropdown'); ?>

<?php else: ?>
<?php echo $content; ?>
<?php endif; ?>
