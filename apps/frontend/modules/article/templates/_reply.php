<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('article/comment') ?>" method="post">
<?php echo $form->renderHiddenFields(false) ?>

<input type="hidden" name="aid" value="<?php echo $id ?>" />
<?php echo $form['article_id'] ?>
<table>
	<tr>
		<td colspan="2">
			<?php echo $form['content']->renderError() ?>
			<?php echo $form['content'] ?>
			<button type="submit" class="btnPurple reply_submit">回帖</button>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<?php echo $form['images']->renderError() ?>
		<?php echo $form['images']->renderLabel() ?>
		<?php echo $form['images'] ?>
		</td>
	</tr>
</table>
</form>