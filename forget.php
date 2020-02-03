<?php $this->load->view('www/includes/banner'); ?>

<div class="activebox">
	<div class="row no-gutters">
		<div class="col-12 contentHeaderText">
			<div>忘記密碼</div>
			<span>FORGET</span>
		</div>
	</div>
	<div class="container member_con">
		<div class="inner" id="memberUser">
			<div class="register_bg">
				<div class="registerBg"></div>
				<div class="registerTitle">
					<h3>會員密碼查詢 <svg class="svg-inline--fa fa-question-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"></path></svg><!-- <i class="fas fa-question-circle"></i> --></h3></div>
				<div class="memberInfo userBox">
					<!----會員資料---->
					<div class="border"> </div>
					<!---會員密碼變更---->
					<form class="form" id="signForm" method="post" novalidate="novalidate">
						<input type="hidden" name="forget_sms_token" id="forget_sms_token"
						       value="<?php echo @$forget_sms_token ?>">
						<div class="form-group">
							<label>會員帳號</label>
							<input type="text" class="form-control" name="u_id" id="f_u_id" maxlength="20" placeholder="請輸入會員帳號">
						</div>
						<div class="form-group">
							<label>手機號碼</label>
							<input type="tel" class="form-control" name="phone" id="f_phone" maxlength="10" placeholder="請輸入手機號碼">
						</div>
						<div class="form-group">
							<label>輸入驗證碼</label>
							<div class="form-inline">
								<div class="col-sm-8 col-12 pl-0">
									<input type="tel" class="form-control" name="checknum" id="checknum" maxlength="4">
								</div>
								<div class="col-sm-4 col-12">
									<img id="regImg" class="regImg"
									     src="<?php echo site_url("Vcode2") ?>?token=<?php echo $token ?>&s_name=forget_checknum"
									     onclick="changeChkImg('forget_checknum','regImg')" style="cursor:pointer"
									     title="刷新驗證碼" width="50%" height="45">
								</div>
							</div>
						</div>
						<div class="text-right">
							<button class="btn btn-smsBTN" id="submitBtn" type="button">
								<svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
									<path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
								</svg>
								<!-- <i class="fas fa-check"></i> -->送出查詢</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	changeChkImg('forget_checknum','regImg')

	var phone_reg = /^09[0-9]{8}$/;	//手機格式驗證

	$(function () {

		//手機格式檢查
		jQuery.validator.addMethod("phoneFormat", function (value, element) {
			var str = value;
			var result = false;
			return (phone_reg.test(value));
		});

		$('#phone').addClass('phoneFormat');

		$('#signForm').validate({
			onkeyup: false,
			errorClass: 'text-danger',
			//errorElement: "span",	//顯示錯誤訊息的方式
			errorPlacement: function (error, element) {
				if (element.parents(".inputR").length > 0) {
					element.parents(".inputR").after(error);
				} else {
					element.parent().append(error);
				}
			},
			// overwrite 每一個驗證對象驗證失敗時
			highlight: function (element, errorClass, validClass) {
				$(element).removeClass("alert alert-warning");
			},
			// overwrite 每一個驗證對象驗證成功時
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass("alert alert-warning");
				//$(element).parents(".form-group").find(".form-control-feedback").hide();

			},
			rules: {
				"u_id": {
					required: true
				},
				"phone": {
					required: true,
					phoneFormat: true
				},
				"checknum": {
					required: true
				}
			},
			messages: {
				"u_id": {
					required: "請輸入您的帳號"
				},
				"phone": {
					required: "請輸入您的手機",
					phoneFormat: "手機格式錯誤"
				},
				"checknum": {
					required: "請輸入驗證碼"
				}
			}
		});


		$('#submitBtn').bind('click', submitCheck);


	});


	function submitCheck() {
		if ($('#signForm').valid()) {
			
			startLoading()
			callApi('doForgetPassword', $('#signForm').serialize()).done(function (msg) {
				stopLoading()
				if (msg.RntCode == 'Y') {
					//$('#register-alert').hide();
					location.href = location.href;
				} else {
					alert(msg.Msg);
					changeChkImg('forget_checknum', 'regImg');
					//$('#register-alert').html('<strong>' + msg.Msg +'</strong>').show();
				}
			});
		}

	}
</script>
