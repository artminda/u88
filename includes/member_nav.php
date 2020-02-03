<div id="memberMenu" class="inner">
	<button class="btn btn-menu" onclick="location.href='<?php echo site_url("Manger/account") ?>#cha'">會員資料</button>
	<!-- <button class="btn btn-menu" onclick="location.href='receivegame.php#cha'">遊戲開通</button> -->
	<button class="btn btn-menu" onclick="location.href='<?php echo site_url("Manger/deposit") ?>#cha'">儲值點數</button>
	<?php if ($user_info[ 'm_group' ] == 2): ?>
		<button class="btn btn-menu" onclick="location.href='<?php echo site_url("Account/bank") ?>#cha'">匯款記錄</button>
	<?php endif; ?>
	<button class="btn btn-menu" onclick="location.href='<?php echo site_url("History/index") ?>#cha'">儲值紀錄</button>
	<button class="btn btn-menu" onclick="location.href='<?php echo site_url("Manger/transfer") ?>#cha'">點數轉移</button>
	<button class="btn btn-menu" onclick="location.href='<?php echo site_url("History/transfer") ?>#cha'">轉移紀錄</button>
	<button class="btn btn-menu" onclick="location.href='<?php echo site_url("Manger/withdrawal") ?>#cha'">點數轉出</button>
	<!--原出售虛寶-->
	<button class="btn btn-menu" onclick="location.href='<?php echo site_url("History/sell") ?>#cha'">轉出紀錄</button>
</div>
