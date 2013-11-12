<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('oblation/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php /*if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'oblation/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif;*/ ?>
          <input class="btnPurple" type="submit" value="确认修改" />
          <input class="btnPurple" type="button" value="返回管理中心" onclick="location.href='<?php echo url_for('manager/oblation') ?>'" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['category_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['category_id']->renderError() ?>
          <?php echo $form['category_id'] ?>
        </td>
      </tr>
      <?php if(!$oblation->getCanModify()){?>
      <tr>
        <th><?php echo $form['price']->renderLabel() ?></th>
        <td>
          <?php echo $form['price']->renderError() ?>
          <?php echo $form['price'] ?>&nbsp; 金币
        </td>
      </tr>
      <?php } else { ?>
      <tr>
        <th>单价：</th>
        <td>
          <?php echo $oblation->getPrice() ?>&nbsp; 金币
          &nbsp;<font color="green">（价格已被管理员修改过，您无法进行修改。）</font>
        </td>
      </tr>
      <?php }?>
      <tr>
        <th><?php echo $form['times']->renderLabel() ?></th>
        <td>
          <?php echo $form['times']->renderError() ?>
          <?php echo $form['times'] ?>&nbsp; 小时
        </td>
      </tr>
      <tr>
        <th><?php echo $form['images']->renderLabel() ?></th>
        <td id="oblation_img">
          <?php echo $form['images']->renderError() ?>
          <?php echo image_tag('../uploads/oblation/'.$oblation->getImages())?>
          <?php echo $form['images'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
<script>
$(function() {
	var imgs = $('#oblation_img img');
	$(imgs[1]).css('display','none');
});

</script>
