<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>

<?php $this->load->view('www/includes/banner'); ?>

<div class="container">
	<div class="row p-xl-5 appBox justify-content-md-center">
		<div class="col-md-5 mt-3 mb-3">
			<div class="download-box">
				<h2 class="app-title">APP下載-歐博真人</h2>
				<div class="d-none d-md-block mb-3 text-center">
					<div class="app-qr"><img src="<?php echo ASSETS_URL ?>/www/images/ab_qrcode.jpg"></div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">帳號</span>
					</div>
					<input type="text" class="form-control f-app" readonly id="u_id1" value="<?php echo $allbetData["u_id"] ?>">
					<div class="input-group-append">
						<button class="btn btn-outline-blue" type="button" data-clipboard-target="#u_id1" id="uid_copy1"><i class="fas fa-paste"></i> 複製</button>
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">密碼</span>
					</div>
					<input type="text" class="form-control f-app" placeholder="同會員登入帳密" aria-label="Recipient's username" aria-describedby="button-addon2">
				</div>
				<div class="btnBOX">
					<a class="btn btn-app w-100" href="https://www.allbetgaming.com/zh_tw/agent/download.html" target="_blank"><i class="fas fa-mobile-alt fa-2x"></i><br>手機版下載</a>
				</div>
			</div>
		</div>

		<div class="col-md-5 mt-3 mb-3">
			<div class="download-box">
				<h2 class="app-title">APP下載-DG真人</h2>
				<div class="d-none d-md-block mb-3 text-center">
					<div class="app-qr"><img src="<?php echo ASSETS_URL ?>/www/images/dg_qrcode.jpg"></div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">帳號</span>
					</div>
					<input type="text" class="form-control f-app" readonly id="u_id2" value="<?php echo $dgData["u_id"] ?>">
					<div class="input-group-append">
						<button class="btn btn-outline-blue" type="button" data-clipboard-target="#u_id2" id="uid_copy2"><i class="fas fa-paste"></i> 複製</button>
					</div>
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">密碼</span>
					</div>
					<input type="text" class="form-control f-app" placeholder="同會員登入帳密" aria-label="Recipient's username" aria-describedby="button-addon2">
				</div>
				<div class="btnBOX">
					<a class="btn btn-app w-100" href="http://f.dg99.info/download/cn.html" target="_blank"><i class="fas fa-mobile-alt fa-2x"></i><br>手機版下載</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	new Clipboard( "#uid_copy1" );
	new Clipboard( "#uid_copy2" );
</script>
