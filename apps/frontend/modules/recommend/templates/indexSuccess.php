<h1>Recommends List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>R type</th>
      <th>R</th>
      <th>Start date</th>
      <th>End date</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($recommends as $recommend): ?>
    <tr>
      <td><a href="<?php echo url_for('recommend/edit?id='.$recommend->getId()) ?>"><?php echo $recommend->getId() ?></a></td>
      <td><?php echo $recommend->getRType() ?></td>
      <td><?php echo $recommend->getRId() ?></td>
      <td><?php echo $recommend->getStartDate() ?></td>
      <td><?php echo $recommend->getEndDate() ?></td>
      <td><?php echo $recommend->getCreatedAt() ?></td>
      <td><?php echo $recommend->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('recommend/new') ?>">New</a>
