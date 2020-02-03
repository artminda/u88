<!-- mobile 下方選單-->
<div class="m_ft d-md-none">
	<div class="row">
	
		<div class="col">
			<a href="#">
				<img src="<?php echo ASSETS_URL ?>/www/images/mobile/fi2.png" class="img-fluid">
				<div>客服</div>
			</a>
		</div>
		<!----登入前---->
		<?php if (!$isLogin): ?>
		<div class="col">
			<a href="<?php echo site_url("Active")?>">
				<img src="<?php echo ASSETS_URL ?>/www/images/mobile/fi1.png" class="img-fluid">
				<div>優惠</div>
			</a>
		</div>
		<div class="col" style="margin: auto;">
			<a href="<?php echo site_url() ?>">
				<div style="font-size: 30px;color: #d50005;"><i class="fa fa-home" aria-hidden="true"></i></div>
			</a>
		</div>
		<div class="col">
			<a href="<?php echo site_url('Login') ?>">
				<img src="<?php echo ASSETS_URL ?>/www/images/mobile/fi7.png" class="img-fluid">
				<div>登入</div>
			</a>
		</div>
		<div class="col">
			<a href="<?php echo site_url('Manger/register') ?>">
				<img src="<?php echo ASSETS_URL ?>/www/images/mobile/fi8.png" class="img-fluid">
				<div>註冊</div>
			</a>
		</div>
		<
		<!----登入後---->
		<?php  else: ?>
		<div class="col">
			<a href="<?php echo site_url("Manger/deposit") ?>">
				<img src="<?php echo ASSETS_URL ?>/www/images/mobile/fi4.png" class="img-fluid">
				<div>儲值</div>
			</a>
		</div>
		<div class="col" style="margin: auto;">
			<a href="<?php echo site_url() ?>">
				<div style="font-size: 30px;color: #d50005;"><i class="fa fa-home" aria-hidden="true"></i></div>
			</a>
		</div>
		<div class="col">
			<a href="<?php echo site_url('Manger/account') ?>">
				<img src="<?php echo ASSETS_URL ?>/www/images/mobile/fi6.png" class="img-fluid">
				<div>會員</div>
			</a>
		</div>
		<div class="col">
			<a href="<?php echo site_url('Index/logout') ?>">
				<img src="<?php echo ASSETS_URL ?>/www/images/mobile/fi9.png" class="img-fluid">
				<div>登出</div>
			</a>
		</div>

		<?php endif; ?>
	</div>
</div>
