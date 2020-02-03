<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
			<h1>儲值點數<small>Deposit Points</small></h1></div>
		<div class="memberInfo">
			<!----會員資料---->
			<form id="depositForm" name="depositForm" role="form" method="post" novalidate target="_self">
				<input type="hidden" name="payment" id="payment" value="ATM">
				<input type="hidden" name="pay_mode" id="pay_mode" value="1">
				<div class="pay">
					<a class="payment payicon current" data-payment="ATM" style="cursor: pointer;"><img src="<?php echo ASSETS_URL ?>/www/images/member/pay-icon1.png"></a>
					<!-- <a class="payment payicon" data-payment="Credit"><img src="<?php echo ASSETS_URL ?>/www/images/member/pay-icon6.png"></a>-->
					<a class="payment payicon" data-payment="CVS" style="cursor: pointer;"><img src="<?php echo ASSETS_URL ?>/www/images/member/pay-icon2.png"></a>
					<a class="payment payicon" data-payment="CVS" style="cursor: pointer;"><img src="<?php echo ASSETS_URL ?>/www/images/member/pay-icon3.png"></a>
				</div>
				<div class="inputgroup">
					<div class="group">
						<label class="control-label col-12">輸入儲值點數:</label>
						<div class="col-12">
							<input type="tel" id="amount" name="amount" maxlength="10" class="form-control" placeholder="請輸入儲值點數">
							<div class="text-info" id="down-alert" style="display:none;">
								<svg class="svg-inline--fa fa-exclamation-triangle fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="exclamation-triangle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
									<path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
								</svg>
								<!-- <i class="fas fa-exclamation-triangle"></i> -->信用卡儲值實拿點數須扣除一成手續費，如儲值1,000實拿點數為900</div>
							<div class="text-right">
								<button type="submit" class="btn btn-smsBTN" value="取得代码" style="margin-top:1em;">
									<svg class="svg-inline--fa fa-credit-card fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="credit-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
										<path fill="currentColor" d="M0 432c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V256H0v176zm192-68c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-40zm-128 0c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM576 80v48H0V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48z"></path>
									</svg>
									<!-- <i class="fas fa-credit-card"></i> -->取得代碼</button>
							</div>
						</div>
					</div>
				</div>
				<div class="alert alert-danger bor-red">
					<h4><svg class="svg-inline--fa fa-exclamation-triangle fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="exclamation-triangle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg><!-- <i class="fas fa-exclamation-triangle"></i> --> 注意事項:</h4>
					<ul>
                        <li>超商代碼繳費，請勿使用 「OK超商」繳費</li>
                        <li>ATM儲值請勿使用無卡存款，若使用無卡存款一律視為詐騙帳號停權處分。 </li>
					</ul>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	var amount_reg=/^[0-9]*[1-9][0-9]*$/;


	$(function(){
		$('.payment').css('cursor','pointer');
		$('.payment').click(function(){
			$('#payment').attr('value',$(this).data('payment'));
			$('.payment').removeClass('current');
			$(this).addClass('current');
		});

		$('[data-payment="ATM"]')[0].click();

		$('.cash_box').click(function(){
			$('#amount').attr('value',$(this).data('amount'));
			$('.cash_box').removeClass('current');
			$(this).addClass('current');
		});

		$('#depositForm').bind('submit',bonusCheck);
	});

	function bonusCheck(){
		if($('#payment').val()==''){
			alert('請選擇儲值方式');
			return false;
		}

		if($('#amount').val()==''){
			alert('請輸入儲值金額');
			return false;
		}
		if(!amount_reg.test($('#amount').val())){
			alert('儲值點數請輸入正整數');
			return false;
		}
		if($('#amount').val() < 500){
			alert("單筆儲值最低500點");
			return false;
		}
		if($('#payment').val()=='CVS' && $('#amount').val() > 20000){
			alert('超商代碼儲值上限單筆20000元');
			return false;
		}
		if($('#payment').val()=='bank'){
			$('#depositForm').attr('action',CI_URL + 'Manger/bonus_transfer2.aspx');	//銀行匯款
		}else{
			$('#depositForm').attr('action',CI_URL + 'Manger/deposit_transfer.aspx');
		}
	}


</script>
