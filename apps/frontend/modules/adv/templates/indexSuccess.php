<h1>Advs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Block</th>
      <th>Title</th>
      <th>Start date</th>
      <th>End date</th>
      <th>Url</th>
      <th>Images</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($advs as $adv): ?>
    <tr>
      <td><a href="<?php echo url_for('adv/edit?id='.$adv->getId()) ?>"><?php echo $adv->getId() ?></a></td>
      <td><?php echo $adv->getBlock() ?></td>
      <td><?php echo $adv->getTitle() ?></td>
      <td><?php echo $adv->getStartDate() ?></td>
      <td><?php echo $adv->getEndDate() ?></td>
      <td><?php echo $adv->getUrl() ?></td>
      <td><?php echo $adv->getImages() ?></td>
      <td><?php echo $adv->getCreatedAt() ?></td>
      <td><?php echo $adv->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('adv/new') ?>">New</a>
