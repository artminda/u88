<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
            <h1>點數轉出<small>Sell Point</small></h1></div>
		<div class="">
			<form name="withdrawalForm" id="withdrawalForm" method="post" novalidate>
				<div class="memberInfo transfer">
					<div class="form-group">
                        <label for="sel1">轉出來源 :</label>
                        <select class="form-control" id="sel1">
                            <option value="0"> 電子錢包
								............... <?php echo number_format($user_info[ 'WalletTotal' ], 0) ?></option>
						</select>
					</div>
					<div class="form-group">
                        <label>轉出點數 :</label>
						<input type="tel" name="amount" id="amount" class="form-control" maxlength="10"
						       placeholder="請輸入轉移點數">
						<input type="hidden" id="tmpAmount" value="<?php echo $user_info[ 'WalletTotal' ] ?>"/>
					</div>
					<button class="btn btn-smsBTN" id="withdrawalBTN" >確認轉移</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	var pass_reg = /^(?!([^a-zA-Z]+|\D+)$)[a-zA-Z0-9]{6,25}$/;	//6~25英文數字混合
	var amount_reg = /^[0-9]*[1-9][0-9]*$/;
	$(function () {
		$('#withdrawalForm').validate({
			onkeyup: false,
			errorClass: 'alert alert-danger',
			errorElement: "div",	//顯示錯誤訊息的方式
			rules: {
				"amount": {
					required: true,
					digits: function (value) {
						return amount_reg.test(value)
					},
					min: 1000,
					max: parseInt($('#tmpAmount').val())
				}
			},
			messages: {
				"amount": {
                    required: "請輸入轉出點數",
                    digits: "轉出點數請輸入正整數",
                    min: "最少轉出{0}點",
                    max: '轉出點數不得超過{0}點'
				}
			}
		});


		$('#withdrawalBTN').bind('click', submitCheck);
	});


	function submitCheck() {
		if ($('#withdrawalForm').valid()) {
			$('#withdrawalForm').attr('action', CI_URL + 'Manger/withdrawal_do.aspx');
			$('#withdrawalForm').submit();
		}
	}
</script>
