<table class="table">
	<tr>
		<td>交易单号</td>
		<td>交易内容描述</td>
		<td>交易日期</td>
		<td>收入/指出</td>
		<td>金币余额</td>
	</tr>
	<?php foreach($result as $one): ?>
	<tr>
		<td><?php echo $one->getId() ?></td>
		<td><?php echo $one->getDescription() ?></td>
		<td><?php echo $one->getDealDate() ?></td>
		<td>
		<?php 
			if($one->getIsIn())
			 	echo '+';
			else 
				echo '-';
		?>
		<?php echo $one->getAmmount() ?>
		</td>
		<td><?php echo $one->getBalance() ?></td>
	</tr>
	<?php endforeach;?>
</table>
