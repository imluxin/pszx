<div class="admin_oblation_audit admin_box">
<div class="admin_shop_price admin_box">
	<div class="subTitle">祭品价格表</div>
	<div class="cont">
		<table class="table">
				<tr>
					<td>序号</td>
					<td>名称</td>
					<td>图片</td>
					<td>单价</td>
					<td>有限期</td>
					<td>确认修改</td>
                </tr>
                <?php foreach($result as $one):?>
                <tr>
                	<td><?php echo $one->getId() ?></td>
                    <td><?php echo $one->getName() ?></td>
                    <td><?php echo image_tag('../uploads/oblation/'.$one->getImages()) ?></td>
                    <td><input id="price_<?php echo $one->getId() ?>" style="width:80px;" type="text" value="<?php echo $one->getPrice() ?>" /></td>
                    <td><?php echo $one->getTimes() ?></td>
                    <td><a href="javascript:" onclick="modifyPrice(<?php echo $one->getId() ?>);">确认</a></td>
                </tr>
                <?php endforeach; ?>
		</table>
		<div class="pages">
			<?php if(count($pg)>0): ?>
			<?php if($pg->getPage()==1): ?>
			<!-- 如果当前是第1页 -->
			<a class="disabled">首页</a>
			<a class="disabled">前一页</a>
			<?php else : ?>
			<a href="<?php echo url_for('manager/moblationprice?page=1') ?>">首页</a>
			<a
				href="<?php echo url_for('manager/moblationprice?page='.$pg->getPreviousPage()) ?>">前一页</a>
			<!-- 前一页号 -->
			<?php endif; ?>
			<?php foreach ($pg->getLinks() as $page): ?>
			<!-- 页号集合 -->
			<?php if($page==$pg->getPage()): ?>
			<a class="current"><?php echo $page ?></a>
			<?php else: ?>
			<a href="<?php echo url_for('manager/moblationprice?page='.$page) ?>"><?php echo $page ?></a>
			<?php endif; ?>
			<?php endforeach; ?>
			<?php if($pg->getPage()==$pg->getLastPage()): ?>
			<!-- 最后一页页号 -->
			<a class="disabled">后一页</a>
			<a class="disabled">尾页</a>
			<?php else : ?>
			<a
				href="<?php echo url_for('manager/moblationprice?page='.$pg->getNextPage()) ?>">后一页</a>
			<!-- 下一页页号 -->
			<a
				href="<?php echo url_for('manager/moblationprice?page='.$pg->getLastPage()) ?>">尾页</a>
			<?php endif; ?>
			<?php endif;?>
		</div>
	</div>
</div>
</div>
<script>
	function modifyPrice(id) {
		if(id == '') {
			return false;
		}

		var price = $('#price_'+id).val();

		if(price < 0) {
			alert('请输入正确的价格');
			return false;
		}
		
		var url = '<?php echo url_for('oblationmanager/modifyprice')?>?id='+id+'&price='+price;
		
		$.ajax({
			type: "post",
			url: url,

			beforeSend: function(XMLHttpRequest){

			},
			success: function(data, textStatus){
				if(data == 1) {
					location.reload();
				}
			},

			complete: function(XMLHttpRequest, textStatus){

			},
			error: function(){
			}
		});
	}
</script>