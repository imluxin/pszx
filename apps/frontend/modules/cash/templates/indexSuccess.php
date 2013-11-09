<?php slot('title','充值提现-菩萨在线')?>
<div id="content" class="pay">
    	<div class="row box clearfix">
        	<div class="note">
            	<p> 温馨提示：本网站内100金币=1元人民币，用户账户内金币满10000即100元人民币就可提现</p>
            </div>
            <div class="col fl">
            	<div class="cont">
                    <h3 class="subTitle">我要充值</h3>
                    <div class="money">
                        <p>你当前账户余额：<?php echo $myuser->getCoins() ?>金币（<?php echo ($myuser->getCoins()/100) ?>元）</p>
                        <p>充值金额&nbsp;<input type="text" />&nbsp;元</p>
                    </div>
                    <div class="bank">
                    	<h3 class="subTitle">请选择充值方式</h3>
                        <ul class="clearfix">
                        	<li class="alipay"><label><input name="bank" type="radio" /><span>支付宝</span></label></li>
                            <li class="cft"><label><input name="bank" type="radio" /><span>财付通</span></label></li>
                            <li class="icbc"><label><input name="bank" type="radio" /><span>工商银行</span></label></li>
                            <li class="boc"><label><input name="bank" type="radio" /><span>中国银行</span></label></li>
                            <li class="abc"><label><input name="bank" type="radio" /><span>农业银行</span></label></li>
                            <li class="ccb"><label><input name="bank" type="radio" /><span>建设银行</span></label></li>
                            <li class="comm"><label><input name="bank" type="radio" /><span>交通银行</span></label></li>
                            <li class="psbc"><label><input name="bank" type="radio" /><span>邮政储蓄</span></label></li>
                            <li class="cmbc"><label><input name="bank" type="radio" /><span>招商银行</span></label></li>
                            <li class="cib"><label><input name="bank" type="radio" /><span>兴业银行</span></label></li>
                        </ul>
                    </div>
                    <p class="submitBar">
                    	<input class="btnPurple" type="submit" value="进入下一步" />
                    </p>
                </div>
            </div>
            <div class="col fr">
            	<div class="cont">
                    <h3 class="subTitle">我要提现</h3>
                    <div class="money">
                        <p>你当前账户余额：<?php echo $myuser->getCoins() ?>金币（<?php echo ($myuser->getCoins()/100) ?>元）</p>
                        <p>可以提现：<?php echo ($myuser->getCoins()/100) ?>元</p>
                        <p>提现&nbsp;<input type="text" />&nbsp;元</p>
                    </div>
                    <p class="submitBar">
                        <input class="btnPurple" type="submit" value="申请提现" />
                    </p>
                </div>
            </div>
        </div>
    </div>