<?php slot('title', '菩萨在线' ) ?>
<!--content-->
<div
	id="content" class="index"><!--幻灯片广告、登录-->
<div class="row row1 clearfix">
<div class="main fl">
<div class="slideShow">
<div id="slides">
<div class="slides_container"><a href="#" title="" rel="external"> <img
	src="images/slideshow/1.jpg" alt=""> </a><a href="#" title=""
	rel="external"> <img src="images/slideshow/2.jpg" alt=""> </a><a
	href="#" title="" rel="external"> <img src="images/slideshow/3.jpg"
	alt=""> </a></div>

</div>
<script type="text/javascript">
                        $(function(){
                            $('#slides').slides({
                                preload: true,
                                play: 5000,
                                pause: 2500,
                                hoverPause: true,
                                fadeSpeed: 350,
                                effect: 'fade'
                            });
                        });
                    </script></div>
</div>
<div class="side fr box user">
<div class="titleBar">
<p>礼佛三炷香 心愿自然成</p>
</div>
<div class="cont"><?php if(!$sf_user->isAuthenticated()) {?> <?php use_helper('I18N') ?>
<?php echo include_partial('main/signin_form', array('form' => $form)) ?>
<?php } else {?>
<div class="userInfo"><?php include_partial('main/user_info', array('myuser'=>$myuser)) ?>
</div>
<?php }?>
<div class="userLink">
<ul class="clearfix">
	<li><a class="btnGray" href="<?php echo url_for('cash/index') ?>">我要充值</a></li>
	<li><a class="btnGray" href="<?php echo url_for('cash/index') ?>">我要提现</a></li>
	<li><a class="btnGray" href="#">我要拜佛</a></li>
	<li><a class="btnGray" href="#">我要祭祀</a></li>
	<li><a class="btnGray" href="#">我要建馆</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/index') ?>">管理中心</a></li>
</ul>
</div>
<div class="userNote">
<p>您可以：</p>
<p>在线拜菩萨，保全家积德积财平安健康</p>
<p>网上建寺庙，让信徒超越时空成全心愿</p>
<p>在线英烈馆，让英烈永垂不朽代代缅怀</p>
<p>网上纪念馆，在线祭祀让逝者安享天堂</p>
</div>
</div>
</div>
</div>
<!--/幻灯片广告、登录--> <!--网上礼佛、佛教资讯-->
<div class="row row2 clearfix">
<div class="main fl box index_buddha">
<div class="titleBar">
<h2 class="title"><a href="buddha/index.html">网上礼佛</a></h2 class="title">
<a class="more" href="buddha/index.html">更多</a></div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<li><a href="#"> <img src="images/temp/lifo.jpg" />
	<p>元始天尊</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/lifo.jpg" />
	<p>元始天尊</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/lifo.jpg" />
	<p>元始天尊</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/lifo.jpg" />
	<p>元始天尊</p>
	</a></li>
</ul>
</div>
</div>
</div>
<div class="side fr box">
<div class="titleBar">
<h2 class="title">佛教资讯</h2 class="title">
</div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<li><a href="#"> <img src="images/temp/fjzx.jpg" />
	<p>佛教礼仪和习俗</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/fjzx.jpg" />
	<p>佛教礼仪和习俗</p>
	</a></li>
</ul>
</div>
<div class="txtList">
<ul class="clearfix">
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
	<li><a href="#">佛教资讯/礼仪/习俗/文化普及和分享</a></li>
</ul>
</div>
</div>
</div>
</div>
<!--/网上礼佛、佛教资讯--> <!--名山名寺、慈善救助-->
<div class="row row3 clearfix">
<div class="main fl box index_temple">
<div class="titleBar">
<h2 class="title"><a href="temple/index.html">名山名寺</a></h2 class="title">
<a class="more" href="temple/index.html">更多</a></div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/msms.jpg" />
	<p>洛阳白马寺</p>
	</a></li>
</ul>
</div>
</div>
</div>
<div class="side fr box">
<div class="titleBar">
<h2 class="title">慈善救助</h2 class="title">
</div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<li><a href="#"> <img src="images/temp/csjz.jpg" />
	<p>慈善捐款</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/csjz.jpg" />
	<p>慈善捐款</p>
	</a></li>
</ul>
</div>
<div class="txtList">
<ul>
	<li><a href="">全国各类慈善活动信息/资讯/活动</a></li>
</ul>
</div>
</div>
</div>
</div>
<!--/名山名寺、慈善救助--> <!--在线纪念、追忆祭文-->
<div class="row row4 clearfix">
<div class="main fl box index_memorial">
<div class="titleBar">
<h2 class="title"><a href="temple/index.html">在线纪念</a></h2 class="title">
<a class="more" href="temple/index.html">更多</a></div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zxjn.jpg" />
	<p>张XX</p>
	</a></li>
</ul>
</div>
</div>
</div>
<div class="side fr box">
<div class="titleBar">
<h2 class="title"><a href="buddha/index.html">追忆祭文</a></h2 class="title">
</div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<li><a href="#"> <img src="images/temp/zyjw.jpg" />
	<p>一品官府升级</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/zyjw.jpg" />
	<p>一品官府升级</p>
	</a></li>
</ul>
</div>
<div class="txtList">
<ul>
	<li><a href="">追忆历史名人/英雄烈士/各类逝者祭文</a></li>
</ul>
</div>
</div>
</div>
</div>
<!--/在线纪念、追忆祭文--> <!--搜索逝者-->
<div class="row">
<div class="searchPeople box">
<div class="cont">
<table>
	<tr>
		<td>逝者姓名</td>
		<td>逝者籍贯</td>
		<td>忌日</td>
		<td>生日</td>
		<td>纪念馆名称</td>
		<td>纪念馆编号</td>
		<td>建馆者姓名</td>
		<td rowspan="2"><input class="btnPurple" type="submit" value="搜索" /></td>
	</tr>
	<tr>
		<td><input type="text" /></td>
		<td><select>
			<option>省</option>
		</select> <select>
			<option>市</option>
		</select></td>
		<td><input type="text" size="2" />月<input type="text" size="2" />日</td>
		<td><input type="text" size="2" />月<input type="text" size="2" />日</td>
		<td><input type="text" /></td>
		<td><input type="text" /></td>
		<td><input type="text" /></td>
	</tr>
</table>
</div>
</div>
</div>
<!--/搜索逝者--> <!--祭品商店、同城活动-->
<div class="row row5 clearfix">
<div class="main fl box index_shop">
<div class="titleBar">
<h2 class="title"><a href="shop/index.html">祭品商店</a></h2 class="title">
<a class="more" href="shop/index.html">更多</a></div>
<div class="cont">
<div class="shopList">
<ul class="clearfix">
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
	<li>
	<div class="shopList_img"><img src="images/temp/shop.jpg" /></div>
	<div class="shopList_info">
	<table>
		<tr>
			<td>名称：</td>
			<td>烧烤全鸡</td>
		</tr>
		<tr>
			<td>价格：</td>
			<td>100金币</td>
		</tr>
		<tr>
			<td>时间：</td>
			<td>10天</td>
		</tr>
		<tr>
			<td colspan="2"><a class="btnPurple" href="#">购买</a></td>
		</tr>
	</table>
	</div>
	</li>
</ul>
</div>
</div>
</div>
<div class="side fr box">
<div class="titleBar">
<h2 class="title">同城活动</h2 class="title">
</div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<li><a href="#"> <img src="images/temp/tchd.jpg" />
	<p>风水讲堂活动</p>
	</a></li>
	<li><a href="#"> <img src="images/temp/tchd.jpg" />
	<p>风水讲堂活动</p>
	</a></li>
</ul>
</div>
<div class="txtList">
<ul>
	<li><a href="#">各地会员/社区自由组织的活动</a></li>
</ul>
</div>
</div>
</div>
</div>
<!--/祭品商店、同城活动--></div>
<!--content end-->
