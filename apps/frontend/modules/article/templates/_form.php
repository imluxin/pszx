<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('article/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <?php /*if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'article/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif;*/?>
          
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['title']->renderLabel() ?></th>
        <td>
          <?php echo $form['title']->renderError() ?>
          <?php echo $form['title'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['category_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['category_id']->renderError() ?>
          <?php echo $form['category_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['img_one']->renderLabel() ?></th>
        <td>
          <?php echo $form['img_one']->renderError() ?>
          <?php echo $form['title_one']->renderError() ?>
          <?php echo $form['title_one'] ?>
          &nbsp; 
          <?php echo $form['img_one'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['img_two']->renderLabel() ?></th>
        <td>
          <?php echo $form['img_two']->renderError() ?>
          <?php echo $form['title_two']->renderError() ?>
          <?php echo $form['title_two'] ?>
          &nbsp; 
          <?php echo $form['img_two'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['img_three']->renderLabel() ?></th>
        <td>
          <?php echo $form['img_three']->renderError() ?>
          <?php echo $form['title_three']->renderError() ?>
          <?php echo $form['title_three'] ?>
          &nbsp; 
          <?php echo $form['img_three'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['content']->renderLabel() ?></th>
        <td>
          <?php echo $form['content']->renderError() ?>
        </td>
      </tr>
    </tbody>
  </table>
  <div>
  <?php echo $form['content'] ?>
  </div>
  <br />
  <input class="btnPurple" type="submit" value="确认发布" />
</form>
