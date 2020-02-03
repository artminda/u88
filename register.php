<?php $this->load->view('www/includes/banner'); ?>

<div class="activebox">
	<div class="row no-gutters">
		<div class="col-12 contentHeaderText">
            <div>註冊會員</div>
			<span>REGISTER</span>
		</div>
	</div>
	<div class="container member_con">
		<div class="register">
			<div class="registerBg"></div>
			<form class="form" id="signForm" method="post" novalidate>

				<input type="hidden" name="sms_token" id="sms_token" value="<?php echo @$sms_token ?>">

				<div class="memberInfo userBox row">
					<div class="col-lg-6">
                        <div class="form-group">
                            <label for="usr">姓名<span class="pa">*</span></label>
                            <input type="text" class="form-control" name="u_name" id="u_name" maxlength="5" placeholder="請輸入您的姓名">
                        </div>
                        <div class="form-group">
                            <label for="usr">賬號<span class="pa">*</span></label>
                            <input type="text" class="form-control AccountFormat idCheck" name="u_id" id="u_id" maxlength="15" placeholder="4~10碼英文數字組合">
                        </div>
                        <div class="form-group">
                            <label for="pwd">密碼<span class="pa">*</span></label>
                            <input type="password" class="form-control PasswordFormat" name="u_password" id="u_password" maxlength="15" placeholder="6~13碼英文數字組合">
                        </div>
                        <div class="form-group">
                            <label for="pwd">確認密碼<span class="pa">*</span></label>
                            <input type="password" class="form-control" name="u_password2" id="u_password2" maxlength="15" placeholder="再次輸入密碼">
                        </div>
					</div>
					<div class="col-lg-6">
                        <div class="form-group row" style="margin:0; margin-bottom:1em;">
                            <label for="usr">手機號碼<span class="pa">*</span></label>
                            <div class="col-sm-8" style="padding:0;">
                                <input type="tel" class="form-control phoneFormat" name="phone" id="phone" maxlength="10" placeholder="請輸入您的手機">
                            </div>
                            <div class="col-sm-4" style="margin:auto;">
                                <button class="btn btn-smsBTN" type="button" id="smsBTN">發送驗證碼</button>
                            </div>
						</div>
                        <div class="form-group">
                            <label for="usr">輸入簡訊驗證碼<span class="pa">*</span></label>
                            <input type="tel" class="form-control" name="sms_code" id="sms_code" maxlength="4" placeholder="請輸入簡訊驗證碼">
                            <!--<div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> 驗證碼錯誤！ </div>-->
                        </div>
                        <div class="form-group">
                            <label for="usr">LINE ID<span class="pa">*</span></label>
                            <input type="text" class="form-control" id="line" name="line" maxlength="20" placeholder="請輸入LINE ID">
                        </div>
                        <div class="form-group row" style="margin:0; margin-bottom:1em;">
                            <label for="usr">驗證碼<span class="pa">*</span></label>
                            <div class="col-sm-8" style="padding:0;">
                                <input type="tel" class="form-control" name="checknum" id="checknum" maxlength="4" placeholder="請輸入圖形驗證碼">
                            </div>
                            <div class="col-sm-4" style="margin:auto;">
                                <img id="regImg"
                                     src="<?php echo site_url("Vcode2") ?>?token=&s_name=reg_checknum"
                                     onclick="changeChkImg('reg_checknum','regImg')"
                                     style="cursor:pointer;width:100%;padding:10px;" title="刷新驗證碼">
                            </div>
						</div>
					</div>
					<div class="col-lg-12 text-center">
						<br>
						<div class="alert alert-danger text-center" id="agree-error" role="alert" style="display: none;"><strong>請勾選我已閱讀並同意使用者合約!</strong></div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input agree" id="squaredThree" name="remember">
                                <span class="link-color1">我已經閱讀並同意<a class="" href="<?php echo site_url('About') ?>?#rule">《金守閣遊戲協議》</a></span>
							</label>
						</div>
						<br>
						<button class="btn btn-ok w-50" id="submitBtn" type="button">確認送出</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<script>

	changeChkImg('reg_checknum','regImg')

    // 註冊js
    var is_id_check = false;
    var is_phone_check = false;
    var phone_reg = /^09[0-9]{8}$/; //手機格式驗證
    var id_reg = /^[a-zA-Z0-9]{4,10}$/; //賬號格式驗證
    var pass_reg = /^(?!([^a-zA-Z]+|\D+)$)[a-zA-Z0-9]{6,13}$/; //6~13英文數字混合
    var rtimer = null;
    var sendphone;
    var t = 30; //幾秒後能再次發送驗證碼
    var limti_t = t; //倒數用



	$(function () {

		$('#squaredThree').click(function () {
			if ($(this).prop('checked')) {
				$('#agree-error').hide();
			} else {
				$('#agree-error').show();
			}
		});


		//賬號格式檢查
		jQuery.validator.addMethod("AccountFormat", function (value, element) {
			var str = value;
			var result = false;
			return (id_reg.test(value));
		});
		$('#u_id').addClass('AccountFormat');


		//賬號是否重複檢查
		jQuery.validator.addMethod("idCheck", function (value, element) {
			var str = value;
			var result = false;
			$.ajax({
				type: "POST",
				url: CI_URL + "Manger/ajax_chkid.aspx",
				cache: false,
				async: false,
				dataType: "json",
				data: {u_id: $('#u_id').val()}
			}).done(function (msg) {
				if (msg.RntCode == 'Y') {
					is_id_check = true;
					result = true;
					//$('#register-alert').hide();
				} else {
					//$('#register-alert').html('<strong>' + msg.Msg +'</strong>').show();
					is_id_check = false;
					result = false;
				}
			});
			return result;
		});
		$('#u_id').addClass('idCheck');

		//密码格式检查
		jQuery.validator.addMethod("PasswordFormat", function (value, element) {
			var str = value;
			var result = false;
			return (pass_reg.test(value));
		});
		$('#u_password').addClass('PasswordFormat');
		//$('#u_password2').attr('equalto','#u_password');

		//推荐人检查
		jQuery.validator.addMethod("upAccountCheck", function (value, element) {
			var result = true;
			if (value != "") {
				callApi('checkAccount', {
					'up_account': $('#up_account').val()
				}).done(function (msg) {
					if (msg.RntCode == 'Y') {
						result = true;
					} else {
						result = false;
					}
				});
			}
			return result;
		});
		//$('#up_account').addClass('upAccountCheck');

		//手机格式检查
		jQuery.validator.addMethod("phoneFormat", function (value, element) {
			var str = value;
			var result = false;
			return (phone_reg.test(value));
		});
		$('#phone').addClass('phoneFormat');

		//手机重复检查
		/*
		 jQuery.validator.addMethod("phoneCheck", function( value, element ) {
		 var str = value;
		 var result = false;
		 $.ajax({
		 type: "POST",
		 url:  CI_URL + "Manger/ajax_chkphone.aspx",
		 cache: false,
		 async:false,
		 dataType:"json",
		 data:{phone:$('#phone').val()}
		 }).done(function( msg ) {
		 if(msg.RntCode=='Y'){
		 is_phone_check=true;
		 result=true;
		 $('#smsBTN').bind('click',getPhoneCode);
		 }else{
		 is_phone_check=false;
		 result=false;
		 $('#smsBTN').unbind('click');
		 }
		 });
		 return result;
		 });
		 $('#phone').addClass('phoneCheck');
		 */
		$('#smsBTN').bind('click', getPhoneCode);


		$('#signForm').validate({
			onkeyup: false,
			errorClass: 'help-block alert-danger',
			errorElement: "div",	//显示错误讯息的方式
			errorPlacement: function (error, element) {
				if ($(element).parents(".inputR").length > 0) {
					element.parents(".inputR").after(error);
				} else {
					element.parent().append(error);
				}
			},
			// overwrite 每一个验证对象验证失败时
			highlight: function (element, errorClass, validClass) {
				$(element).removeClass("alert alert-warning");
			},
			// overwrite 每一个验证对象验证成功时
			unhighlight: function (element, errorClass, validClass) {
				$(element).removeClass("alert alert-warning");
				//$(element).parents(".form-group").find(".form-control-feedback").hide();

			},
			rules: {
				"u_id": {
					required: true,
					AccountFormat: true,
					idCheck: true
				},
				"u_password": {
					required: true,
					PasswordFormat: true
				},
				"u_password2": {
					required: true,
					equalTo: '#u_password'
				},
				"u_name": {
					required: true
				},
				"phone": {
					required: true,
					phoneFormat: true
					//	phoneCheck : true
				},
				"sms_code": {
					required: true
				},
				"checknum": {
					required: true
				},
				"squaredThree": {
					required: true
				}
			},
            messages: {
                "u_id": {
                    required: "請輸入您的賬號",
                    AccountFormat: "請輸入4~10個英文或數字組合",
                    idCheck: "會員賬號已被註冊"
                },
                "u_password": {
                    required: "請輸入您的密碼",
                    PasswordFormat: "請輸入6~13碼英文數字混合"
                },
                "u_password2": {
                    required: "請再次輸入密碼",
                    equalTo: "會員密碼與確認密碼不同"
                },
                "u_name": {
                    required: "請輸入真實姓名"
                },
                "phone": {
                    required: "請輸入您的手機",
                    phoneFormat: "手機格式錯誤"
// phoneCheck : "手機已被註冊使用"
                },
                "sms_code": {
                    required: "請輸入手機驗證碼"
                },
                "checknum": {
                    required: "請輸入驗證碼"
                },
                "squaredThree": {
                    required: "請輸入驗證碼"
                }
            }
        });

		$('#submitBtn').on('click', submitCheck);
	});

	function submitCheck() {
		if ($('.agree:checked').length > 0) {
			$('#agree-error').hide();
			if ($('#signForm').valid()) {
				startLoading()

				callApi('doRegister', $('#signForm').serialize()).done(function (msg) {
					stopLoading()
					if (msg.RntCode == 'Y') {
						//$('#register-alert').hide();
						location.href = CI_URL + "Welcome.aspx";
					} else {
						alert(msg.Msg);
						changeChkImg('reg_checknum', 'regImg');
						//$('#register-alert').html('<strong>' + msg.Msg +'</strong>').show();

					}
				});
			}
		} else {
			//alert('请勾选我已阅读并同意');
			$('#agree-error').show();
		}
	}



    //發送驗證碼
    function getPhoneCode() {
//if(is_phone_check){
        $('#smsBTN').unbind('click');
        $('#smsBTN').html('發送中...');
        callApi('setSmsToken').done(function (res) {
            callApi('getPhoneCode', {
                phone: $('#phone').val(),
                'sms_token': res.token
            }).done(function (msg) {
                if (msg.RntCode == 'Y') {
                    alert('簡訊驗證碼已發送至手機');
                    showTime();
                    limti_t = t;
                    $('#smsBTN').unbind('click');
                } else if (msg.RntCode == 'W') {
                    alert('簡訊發送失敗，Error:' + msg.Msg);
                    $('#smsBTN').unbind('click');
                    limti_t = t;
                    showTime();
                } else {
                    $('#smsBTN').bind('click', getPhoneCode);
                    $('#smsBTN').html('發送簡訊驗證碼');
                    alert('簡訊發送失敗，Error:' + msg.Msg);
                }
            });
        })
    }


    //定時器
    function showTime() {
        rtimer = setTimeout("showTime()", 1000);
        limti_t -= 1;
        var btn_text = limti_t + '秒後重新發送';
//$('#smsBTN').attr('disabled',true);
        $('#smsBTN').html(btn_text);
        if (limti_t == 0) {
            clearTimeout(rtimer);
            $('#smsBTN').html('發送簡訊驗證碼');
            $('#smsBTN').bind('click', getPhoneCode);
            $('#smsBTN').attr('disabled', false);
            limti_t = t;
        }
    }
</script>