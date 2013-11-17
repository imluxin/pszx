<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form
	action="<?php echo url_for('recommend/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?> <input type="hidden"
	name="sf_method" value="put" /> <?php endif; ?>
<table>
	<tfoot>
		<tr>
			<td colspan="2"><?php echo $form->renderHiddenFields(false) ?> <input
				class="btnPurple" type="submit" value="确认修改" /> <input
				class="btnPurple" type="button"
				onclick="location.href='<?php echo url_for('manager/adv')?>'"
				value="返回" /></td>
		</tr>
	</tfoot>
	<tbody>
	<?php echo $form->renderGlobalErrors() ?>
		<tr>
			<th><?php echo $form['r_id']->renderLabel() ?></th>
			<td><?php echo $form['r_id']->renderError() ?> <?php echo $form['r_id'] ?>
			</td>
		</tr>
		<tr>
			<th><?php echo $form['start_date']->renderLabel() ?></th>
			<td><?php echo $form['start_date']->renderError() ?> <?php echo $form['start_date'] ?>
			</td>
		</tr>
		<tr>
			<th><?php echo $form['end_date']->renderLabel() ?></th>
			<td><?php echo $form['end_date']->renderError() ?> <?php echo $form['end_date'] ?>
			</td>
		</tr>
	</tbody>
</table>
</form>
<script>
$(function() {
	$( "#recommend_start_date" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
	$( "#recommend_end_date" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
});
</script>
