<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
			<h1>會員資料<small>Member Info</small></h1></div>
		<div class="row memberInfo userBox">
			<!----會員資料---->
			<div class="form-inline col-12">
				<label for="usr" class="col-md-3">帳號</label>
				<div class="col-md-9 col-12">
					<?php echo $user_info[ 'u_id' ] ?>
				</div>
			</div>
			<div class="form-inline col-12">
				<label for="usr" class="col-md-3">姓名</label>
				<div class="col-md-9 col-12">
					<?php echo $rowMember[ "u_name" ] ?>
				</div>
			</div>
			<div class="form-inline col-12">
				<label for="usr" class="col-md-3">LINE ID</label>
				<div class="col-md-9 col-12">
					<?php echo $rowMember[ "line" ] ?>
				</div>
			</div>
			<div class="form-inline col-12">
				<label for="usr" class="col-md-3">手機號碼</label>
				<div class="col-md-9 col-12">
					<?php echo $rowMember[ "phone" ] ?>
				</div>
			</div>
			<div class="form-inline col-12">
				<label for="usr" class="col-md-3">電子錢包</label>
				<div class="col-md-3 col-12">
					<?php echo number_format($user_info[ 'WalletTotal' ], 0) ?>
				</div>
				<div class="col-md-3 col-12">
					<button class="btn btn-smsBTN" onclick="location.href='<?php echo site_url("Manger/deposit") ?>'">前往儲值</button>
				</div>
			</div>
			<br>
			<div class="border"> </div>
			<!---會員密碼變更---->
			<div class="col-md-6 col-12 change_pwd">
				<div class="registerTitle">
					<h3>變更密碼 <svg class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <i class="fas fa-angle-down"></i> --></h3></div>
				<form class="accountForm" data-toggle="validator" role="form" method="post" novalidate="" style="margin-top:0">
					<div class="form-group">
						<label>原始密碼</label>
						<input type="password" class="form-control" name="u_password" id="u_password" maxlength="15" placeholder="请输入原始密码">
					</div>
					<div class="form-group">
						<label>修改密碼</label>
						<input type="password" class="form-control" name="new_password" id="new_password" maxlength="15" placeholder="请输入新密码">
					</div>
					<div class="form-group">
						<label>確認密碼</label>
						<input type="password" class="form-control" name="new_password2" id="new_password2" maxlength="15" placeholder="请再次输入新密码">
					</div>
					<button class="btn btn-sm accountBTN btn-smsBTN" type="button">
						<svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
							<path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
						</svg>
						<!-- <i class="fas fa-check"></i> -->確認變更</button>
				</form>
			</div>
			<!---銀行設定---->
			<div class="col-md-6 col-12 change_bank">
				<div class="registerTitle">
					<h3>銀行帳戶設定 <svg class="svg-inline--fa fa-angle-down fa-w-10" aria-hidden="true" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg><!-- <i class="fas fa-angle-down"></i> --></h3></div>
				<form class="bankForm" name="bankForm" data-toggle="validator" role="form" method="post" novalidate="">
					<div class="form-group">
						<label for="usr">銀行名稱</label>
						<?php if(@$user_info["bank_num"]==""):?>
							<select name="bank_num" id="bank_num" class="form-control">
								<option value="">請選擇</option>
								<?php if(isset($bankList)):?>
									<?php foreach($bankList as $row):?>
										<option value="<?php echo $row["num"]?>"><?php echo $row["bank_code"].$row["bank_name"]?></option>
									<?php endforeach;?>
								<?php endif;?>
							</select>
						<?php else:?>
							<?php echo tb_sql("bank_code","bank_list",$user_info["bank_num"])?>
							<?php echo tb_sql("bank_name","bank_list",$user_info["bank_num"])?>
						<?php endif;?>
					</div>
					<div class="form-group">
						<label for="usr">分行名稱</label>
						<?php if(@$user_info["bank_num"]==""):?>
							<input name="bank_branch" class="form-control" placeholder="請填入分行名稱">
						<?php else:?>
							<?php echo $user_info["bank_branch"]?>
						<?php endif;?>
					</div>
					<div class="form-group">
						<label for="usr">銀行帳號</label>
						<?php if(@$user_info["bank_num"]==""):?>
							<input name="bank_account" class="form-control" placeholder="請填入銀行帳號">
						<?php else:?>
							<?php echo $user_info["bank_account"]?>
						<?php endif;?>
					</div>
					<div class="form-group">
						<label for="usr">銀行戶名</label>
						<?php if(@$user_info["bank_num"]==""):?>
							<input name="account_name" class="form-control" placeholder="必須與會員名稱及身分證一致">
						<?php else:?>
							<?php echo $user_info["account_name"]?>
						<?php endif;?>
					</div>
					<?php if(@$user_info["bank_num"]==""):?>
					<button class="btn btn-sm bankBTN btn-smsBTN" type="button">
						<svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
							<path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
						</svg>
						<!-- <i class="fas fa-check"></i> -->確認儲存</button>
					<?php endif;?>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	var pass_reg=/^(?!([^a-zA-Z]+|\D+)$)[a-zA-Z0-9]{6,20}$/;	//6~25英文數字混合
	$(function(){
		//密碼格式檢查
		jQuery.validator.addMethod("PasswordFormat", function( value, element ) {
			var result = true;
			if(value!=""){
				if(pass_reg.test(value)){
					result=true;
				}else{
					result=false;
				}
			}
			return  result;
		});


		$('.accountBTN').click(function(){
			var theForm=$(this).parents('.accountForm');
			$(theForm).validate({
				onkeyup: false,
				errorClass: 'alert alert-danger',
				errorElement: "div",	//顯示錯誤訊息的方式
				rules: {
					"u_password":{
						required : true
					},
					"new_password":{
						required : true,
						PasswordFormat : true
					},
					"new_password2":{
						required : true,
						equalTo: $(theForm).find('input[name="new_password"]')
					},
					"u_name":{
						required : true
					}
				},
				messages: {
					"u_password":{
						required : "請輸入原始密碼"
					},
					"new_password":{
						required : "請輸入新密碼",
						PasswordFormat : "請輸入6~20碼英文數字混合"
					},
					"new_password2":{
						required : "請再次輸入新密碼",
						equalTo: "新密碼與確認密碼不同"
					},
					"u_name" : {
						required : "請輸入會員姓名"
					}
				}
			});

			if($(theForm).valid()){
				$(theForm).attr('action',CI_URL + 'Manger/account_do.aspx');
				$(theForm).submit();
			}

		});

		$('.bankBTN').click(function(){
			var theForm=$(this).parents('.bankForm');

			$(theForm).validate({
				onkeyup: false,
				errorClass: 'alert alert-danger',
				errorElement: "div",	//顯示錯誤訊息的方式
				rules: {
					"bank_num":{
						required : true
					},
					"bank_branch":{
						required : true
					},
					"account_name":{
						required : true
					},
					"bank_account":{
						required : true
					}
				},
				messages: {
                    "bank_num":{
                        required : "請選擇銀行"
                    },
                    "bank_branch":{
                        required : "請輸入分行名稱"
                    },
                    "account_name":{
                        required : "請輸入銀行戶名"
                    },
                    "bank_account":{
                        required : "請輸入銀行帳號"
                    }
				}
			});

			if($(theForm).valid()){
				$(theForm).attr('action',CI_URL + 'Manger/bank_do.aspx');
				$(theForm).submit();
			}
		});
	});

</script>

