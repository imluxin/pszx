/**
 * check register info
 */
function check_reg_info() {
	/*var check_empty_ele = new Array(
			'sf_guard_user_email_address','sf_guard_user_username',
			'sf_guard_user_password','sf_guard_user_password_confirmation',
			'sf_guard_user_province','sf_guard_user_city'
			);*/
	var check_checked_ele = new Array('fwtk');
	// alert(check_empty_ele.length);
	/*for(var i = 0; i < check_empty_ele.length; i++) {
		if(!check_empty(check_empty_ele[i])) {
			return false;
		}
	}*/
	
	var g1 = document.getElementById('sf_guard_user_gender_1');
	var g2 = document.getElementById('sf_guard_user_gender_0');
	var gender = $('input:radio[name="sf_guard_user[gender]"]:checked').val()
	if(gender==null){
		alert("请选择你的性别!");
		return false;
	}
	
	for(var k = 0; k < check_empty_ele.length; k++) {
		if(!check_checked(check_checked_ele[k])) {
			return false;
		}
	}
}

/**
 * This function only for '$("#ele")'
 * 
 * @param ele
 */
function check_empty(ele) {
	var element = $('#'+ele);
	if(element.val() == '') {
		alert('请完善注册信息后再提交注册申请！');
		element.focus();
		return false;
	}
	return true;
}

/**
 * This function only for 'document.getElementById()'
 * 
 * @param ele
 */
function check_checked(ele) {
	var element = document.getElementById(ele);
	if (!element.checked) {
		alert('请完善注册信息后再提交注册申请！');
		element.focus();
		return false;
	}
	return true;
}