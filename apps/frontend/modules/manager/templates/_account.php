<table class="table">
	<tr>
		<td>提现账户</td>
		<td>账户</td>
		<td>姓名</td>
		<td>开户行</td>
	</tr>
	<?php foreach($a_list as $one): ?>
	<tr>
		<td><?php echo $one->getAccount() ?></td>
		<td><?php echo $one->getAccountFrom() ?></td>
		<td><?php echo $one->getName() ?></td>
		<td><?php echo $one->getBank() ?></td>
	</tr>
	<?php endforeach;?>
</table>
