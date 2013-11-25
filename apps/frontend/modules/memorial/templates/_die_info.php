<table>
	<tr>
		<td>编号：</td>
		<td><?php echo $memorial->getId() ?></td>
	</tr>
	<tr>
		<td>姓名:</td>
		<td><?php echo $memorial->getDieNameOne() ?></td>
	</tr>
	<tr>
		<td>生日:</td>
		<td><?php $birth = new DateTime($memorial->getDieBirthOne()); echo $birth->format('Y-m-d'); ?></td>
	</tr>
	<tr>
		<td>忌日:</td>
		<td><?php $die = new DateTime($memorial->getDieDieOne()); echo $die->format('Y-m-d'); ?></td>
	</tr>
	<tr>
		<td>籍贯:</td>
		<td><?php echo $memorial->getDieProvinceOne().$memorial->getDieCityOne() ?></td>
	</tr>
	<tr>
		<td>建馆人:</td>
		<td><?php echo $memorial->getUserName() ?></td>
	</tr>
	<tr>
		<td>建馆日期:</td>
		<td><?php $created_at = new DateTime($memorial->getCreatedAt()); echo $created_at->format('Y-m-d'); ?></td>
	</tr>
	<tr>
		<td>离生日：</td>
		<td>
		<?php
			$today = new DateTime();
			
			$diff = $today->diff($birth);  
			if($today < $birth) {
				echo $diff->format('%d').'天'; 
			} else {
				$next_year = $today->format('Y')+1;
				
				if ($next_year%4==0 && ($next_year%100!=0 || $next_year%400==0)) {
					echo (366 + $diff->format('%d')).'天';
				} else {
					echo (365 + $diff->format('%d')).'天';
				} 
			}
		?>
		</td>
	</tr>
	<tr>
		<td>离忌日：</td>
		<td>
		<?php 
			$diff = $today->diff($die);  
			if($today < $die) {
				echo $diff->format('%d').'天'; 
			} else {
				$next_year = $today->format('Y')+1;
				
				if ($next_year%4==0 && ($next_year%100!=0 || $next_year%400==0)) {
					echo (366 + $diff->format('%d')).'天';
				} else {
					echo (365 + $diff->format('%d')).'天';
				} 
			}
		?>
		</td>
	</tr>
</table>