<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('buddha/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php /* if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'buddha/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; */?>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name'] ?>
        </td>
        <td style="color: red;"><?php echo $form['name']->renderError() ?></td>
      </tr>
      <tr>
        <th><?php echo $form['images']->renderLabel() ?></th>
        <td><?php echo $form['images'] ?> </td>
        <td style="color: red;"><?php echo $form['images']->renderError() ?></td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>&nbsp;</td>
        <td style="color: red;"><?php echo $form['description']->renderError() ?></td>
      </tr>
    </tbody>
  </table>
  <div>
  <?php echo $form['description'] ?>
  </div><br />
  <input class="btnPurple" type="submit" value="确认创建" />
</form>
