<?php $this->load->view('www/includes/banner'); ?>

<div class="container member_con">
	<div id="memberMenu" class="inner">
		<button class="btn btn-menu <?php if (uri_string() == 'Manger/account') echo 'active' ?>"
		        onclick="location.href='<?php echo site_url("Manger/account") ?>'">會員資料</button>
		<!-- <button class="btn btn-menu" onclick="location.href='receivegame.php#cha'">遊戲開通</button> -->
		<button class="btn btn-menu <?php if (uri_string() == 'Manger/deposit') echo 'active' ?>"
		        onclick="location.href='<?php echo site_url("Manger/deposit") ?>'">儲值點數</button>
		<button class="btn btn-menu <?php if (uri_string() == 'History/index') echo 'active' ?>"
		        onclick="location.href='<?php echo site_url("History/index") ?>'">儲值紀錄</button>
		<button class="btn btn-menu <?php if (uri_string() == 'Manger/transfer') echo 'active' ?>"
		        onclick="location.href='<?php echo site_url("Manger/transfer") ?>'">點數轉移</button>
		<button class="btn btn-menu <?php if (uri_string() == 'History/transfer') echo 'active' ?>"
		        onclick="location.href='<?php echo site_url("History/transfer") ?>'">轉移紀錄</button>
		<button class="btn btn-menu <?php if (uri_string() == 'Manger/withdrawal') echo 'active' ?>"
		        onclick="location.href='<?php echo site_url("Manger/withdrawal") ?>'">點數轉出</button>
		<!--原出售虛寶-->
		<button class="btn btn-menu <?php if (uri_string() == 'History/sell') echo 'active' ?>"
		        onclick="location.href='<?php echo site_url("History/sell") ?>'">轉出紀錄</button>
	</div>

	<?php $this->load->view($layout["member"]["sub_page"]) ?>

</div>
