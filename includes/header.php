<div class="container">
	<div id="TopBarContainer">
		<div id="TopBar">
			<div class="navbar-header float-left">
				<a class="navbar-brand scrollLogoText" href="javascript:void(0)" fn="openpage" key="bak_index"
				   style="display: none;"></a>
				<a class="navbar-brand scrollLogoImg" href="<?php echo site_url() ?>" fn="openpage" key="bak_index"
				   style="display: inline;"><img src="<?php echo ASSETS_URL ?>/www/images/logo.png"></a>
			</div>
			<?php if (!$isLogin): ?>
			<form class="form-inline float-right" id="login">
				<input type="hidden" name="rtn" id="rtn" value="<?php echo $this->input->get('rtn') ?>"/>

				<div class="form-group">
					<a class="btn btn-forget" fn="openpage" key="forget_pwd" href="<?php echo site_url('Forget') ?>">忘記密碼？</a>
				</div>
				<div class="form-group mr-2">
					<input name="login_u_id" id="login_u_id" type="text" class="form-control topInput empty"
					       placeholder="用戶名" rel="帳號">
				</div>
				<div class="form-group mr-2">
					<input name="login_u_password" id="login_u_password" type="password" type="password" value="" placeholder="密碼" class="form-control topInput empty">
				</div>
				<div class="form-group">
					<label for="password2" class="sr-only">驗證碼</label>
					<input class="form-control topInput empty mr-sm-2 col-7" type="password2" placeholder="驗證碼"
					       aria-label="驗証碼" name="chknum" id="chknum">
					<div class="col-4 px-2">
						<img id="chkImg" src="<?php echo site_url("Vcode2") ?>?token="
						     class="img-fluid" alt="刷新驗證碼" onclick="changeChkImg()">
					</div>
				</div>
				<a class="btn btn-blue" onclick="doLogin('login')">登入</a>
			</form>
			<?php else:?>
			<form class="form-inline float-right text-white">
				<div class="form-group mr-2">
					<?php echo $user_info["u_name"]?>，歡迎光臨～ 點數 剩餘點數：
					<b class="p_color pr-1"><?php echo number_format($user_info['WalletTotal'],0)?></b> 點
				</div>
				<div class="form-group mr-2">
					<a class="btn btn-orange" fn="login" href="<?php echo site_url("Manger/account")?>">會員中心</a>
				</div>
				<a class="btn btn-blue" fn="login" href="<?php echo site_url("Index/logout")?>">登出</a>
			</form>
			<?php endif; ?>
		</div>
	</div>
</div>
