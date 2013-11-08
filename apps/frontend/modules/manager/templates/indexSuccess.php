<?php slot('title','管理中心-菩萨在线')?>
 <div id="content" class="admin">
    	<div class="row clearfix">
       	  <div class="side box fl">
          	<div class="titleBar">
            	<h2 class="title">管理中心</h2>
            </div>
            <?php include_partial('manager/cont', array('myuser' => $myuser,'form' => $form)) ?>
          </div>
          <div class="main box fr">
          	<div class="cont">
                <div class="admin_intro admin_box">
                	<div class="subTitle">基本资料</div>
                    <div class="cont">
             	      <?php include_partial('manager/base_info', array('myuser'=>$myuser))?>
					</div>
                </div>
                <div class="admin_account admin_box">
                	<div class="subTitle">账户管理
                    	<span class="admin_account_money">
                    	金币数目：<?php echo $myuser->getCoins() ?>个（<?php echo ($myuser->getCoins()/100) ?>元）
                    	</span>
                        <span class="admin_account_choice"><a class="btnPurple" href="<?php echo url_for('cash/index')?>">我要充值</a>&nbsp;&nbsp;<a class="btnPurple" href="<?php echo url_for('cash/index')?>">我要提现</a></span>
                    </div>
                    <div class="cont">
                    <?php include_partial('manager/account', array('a_list'=>$a_list)) ?>
                    </div>
                </div> 
                <div class="admin_deal admin_box">
                	<div class="subTitle">交易清单</div>
                    <div class="cont">
                        <?php include_partial('manager/deal_list', array('result'=>$result))?>
                        <div class="pages">
                            <?php include_partial('manager/pager', array('pg'=>$pg) ) ?>
                        </div>
                    </div>
                </div>              
            </div>
          </div>
        </div>
    </div>