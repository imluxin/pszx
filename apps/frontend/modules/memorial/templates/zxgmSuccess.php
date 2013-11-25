<?php use_javascript('../flash/swfobject.js')?>
<?php use_javascript('../flash/history/history.js')?>
<?php use_stylesheet('../flash/history/history.css')?>
<?php slot('title',$memorial->getMName().'-在线公墓-菩萨在线') ?>
<div id="content" class="jng detail">
<div class="row box">
<div class="titleBar">
<?php include_partial('memorial/nav', array('memorial'=>$memorial))?>
</div>

<div class="flash pr">
<div class="grade grade10"></div>
<div class="number">编号：<?php echo $memorial->getId() ?></div>
</div>
<!--flash-->
<div class="flash">
<script type="text/javascript">

	function getUid() {
		return '<?php if($myuser) echo $myuser->getId(); else echo 0; ?>';
	}

	function getSid() {
		return '1';
	}

	function getScene() {
		return '<?php echo 'http://localhost/pszx/web/uploads/memorial/'.$memorial->getDiePhotoOne() ?>';
	}
	
	function getInitUrl() {
		return '<?php echo 'http://localhost'.url_for('owtr/zxgminit?mid='.$memorial->getId())?>';
	}
	
    // For version detection, set to min. required Flash Player version, or 0 (or 0.0.0), for no version detection. 
    var swfVersionStr = "11.6.0";
    // To use express install, set to playerProductInstall.swf, otherwise the empty string. 
    var xiSwfUrlStr = "/pszx/web/flash/playerProductInstall.swf";
    var flashvars = {};
    var params = {};
    params.quality = "high";
    params.bgcolor = "#ffffff";
    params.allowscriptaccess = "sameDomain";
    params.allowfullscreen = "true";
    var attributes = {};
    attributes.id = "FO";
    attributes.name = "FO";
    attributes.align = "middle";
    swfobject.embedSWF(
        "/pszx/web/flash/FO.swf", "flashContent", 
        "100%", "670", 
        swfVersionStr, xiSwfUrlStr, 
        flashvars, params, attributes);
    // JavaScript enabled so display the flashContent div in case it is not replaced with a swf object.
    swfobject.createCSS("#flashContent", "display:block;text-align:left;");
</script>

<div id="flashContent">
	<p>
        To view this page ensure that Adobe Flash Player version 
		11.6.0 or greater is installed. 
	</p>
    <script type="text/javascript"> 
           var pageHost = ((document.location.protocol == "https:") ? "https://" : "http://"); 
           document.write("<a href='http://www.adobe.com/go/getflashplayer'><img src='" 
                                + pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" ); 
    </script> 
</div>

</div>

<!--/flash-->
</div>
<div>
	许愿描述：<textarea id="wish" style="width:1000px;"></textarea>(输入您的许愿描述，然后点击下方的按钮。)
	<ul class="function_bar">
		<li><a href="javascript:owtr('1');">我要供烛</a></li>
		<li><a href="javascript:owtr('2')">我要供香</a></li>
		<li><a href="javascript:owtr('3')">我要供果</a></li>
		<li><a href="javascript:owtr('4')">我要供茶</a></li>
		<li><a href="javascript:owtr('5')">我要供花</a></li>
		<li><a href="javascript:owtr('6')">祈福许愿</a></li>
		<li><a href="javascript:owtr('7')">拜佛捐赠</a></li>
		<li><a href="javascript:owtr('8')">香火不断</a></li>
	</ul>
</div>
<script>
function owtr(g) {
	<?php if(!$sf_user) {echo 'alert("请登录后再来进贡。");location.href="'.url_for('@sf_guard_signin').'"';} ?>

	var wish = $('#wish').val();
	if(wish == '') {alert('请输入您的许愿描述'); $('#wish').focus(); return false; }
	var url = '<?php echo url_for('owtr/zxgm')?>?type='+g+'&txt='+wish+'&mid=<?php echo $memorial->getId()?>';

	$.ajax({
		type: "post",
		url: url,
		beforeSend: function(XMLHttpRequest){
		},
		success: function(data, textStatus){
			var result = eval ("(" + data + ")");

			if(result.error == '') {
				var type_id = result.type_id;  // 物品类别id
				var gid = result.gid;  // 物品id
				var bless = result.bless;  // 祝福语
				var user_id = result.user_id; // 用户id
				var px = result.px;  
				var py = result.py;  
				var sx = result.sx;
				var sy = result.sy;
				document.getElementById("FO").addGoods(type_id,user_id,gid,bless,px,py,sx,sy);
			} else {
				alert(result.error);
				
				if(result.error == '请先登录!') {
					location.href = '<?php echo url_for('@sf_guard_signin') ?>';
				}
			}
		},
		complete: function(XMLHttpRequest, textStatus){
		},
		error: function(){
		}
	});
}

function move(sid,ggid,uid,x,y,sx,sy) {

	var url = '<?php echo url_for('owtr/zxgmmove')?>?sid=' + sid + '&id=' + ggid + '&uid='+uid+'&px='+x+'&py='+y+'&sx='+sx+'&sy='+sy;
	
	$.ajax({
		type: "post",
		url: url,
		beforeSend: function(XMLHttpRequest){
		},
		success: function(data, textStatus){
			var result = eval ("(" + data + ")");
			if(result.error == '') {
				// alert('success');
			} else {
				alert(result.error);
			}
		},
		complete: function(XMLHttpRequest, textStatus){
		},
		error: function(){
		}
	});
}

</script>

<div class="row box">
<div class="baifoTable">
<table>
	<tr>
		<th>礼佛ID</th>
		<th>昵称/姓名</th>
		<th>性别</th>
		<th>年龄</th>
		<th>来自何方</th>
		<th>拜佛许愿描述</th>
		<th>拜佛许愿时间</th>
	</tr>
	<?php foreach($result as $one):?>
	<tr>
		<td><?php echo $one->getUserId() ?></td>
		<td><?php echo $one->getSfGuardUser()->getUserName() ?></td>
		<td><?php echo $one->getSfGuardUser()->getGender() == 1 ? '男':'女' ?></td>
		<td><?php echo $one->getSfGuardUser()->getAge() ?></td>
		<td><?php echo $one->getSfGuardUser()->getProvince().','.$one->getSfGuardUser()->getCity() ?></td>
		<td><?php echo $one->getTxt() ?></td>
		<td><?php echo $one->getCreatedAt() ?></td>
	</tr>
	<?php endforeach;?>
</table>
<div class="pages">
<?php if(count($pg)>0): ?>
<?php if($pg->getPage()==1): ?>
<!-- 如果当前是第1页 -->
<a class="disabled">首页</a>
<a class="disabled">前一页</a>
<?php else : ?>
<a href="<?php echo url_for('temple/detail?id='.$temple->getId().'&page=1') ?>">首页</a>
<a
	href="<?php echo url_for('temple/detail?id='.$temple->getId().'&page='.$pg->getPreviousPage()) ?>">前一页</a>
<!-- 前一页号 -->
<?php endif; ?>
<?php foreach ($pg->getLinks() as $page): ?>
<!-- 页号集合 -->
<?php if($page==$pg->getPage()): ?>
<a class="current"><?php echo $page ?></a>
<?php else: ?>
<a href="<?php echo url_for('temple/detail?id='.$temple->getId().'&page='.$page) ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
<?php if($pg->getPage()==$pg->getLastPage()): ?>
<!-- 最后一页页号 -->
<a class="disabled">后一页</a>
<a class="disabled">尾页</a>
<?php else : ?>
<a href="<?php echo url_for('temple/detail?id='.$temple->getId().'&page='.$pg->getNextPage()) ?>">后一页</a>
<!-- 下一页页号 -->
<a href="<?php echo url_for('temple/detail?id='.$temple->getId().'&page='.$pg->getLastPage()) ?>">尾页</a>
<?php endif; ?>
<?php endif;?>
</div>
</div>
</div>
</div>
