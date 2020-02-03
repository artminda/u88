<div class="row no-gutters">
	<div class="col-xs-12 topBanner">
		<img src="<?php echo ASSETS_URL ?>/www/images/slot/banner_slot2.jpg">
	</div>
</div>
<div class="elect_outside_Bg">
	<div id="Body" class="elect_allpage">
		<div class="container">
			<div class="inner">
				<div class="games_title">
					<h2><?php echo $games_title ?></h2></div>
				<ul class="nav nav-pills nav-fill games_nav mb-4" role="tablist">
					<li class="nav-item pill-kind ">
						<a class="nav-link  <?php if (@$_GET[ 'kind' ] == '') echo ' active' ?>"
						   href="<?php echo site_url(uri_string()) ?>">全部</a>
					</li>
					<?php if (isset( $kindList )): ?>
					<?php foreach ($kindList as $row): ?>
					<li class="nav-item pill-kind ">
						<a class="nav-link  <?php if (@$_GET[ 'kind' ] == $row[ "num" ]) echo ' active' ?>"
						   href="<?php echo site_url($games_uri . "?kind=" . $row[ "num" ]) ?>"><?php echo $row[ "kind" ] ?></a>
					</li>
					<?php endforeach; ?>
					<?php endif; ?>
				</ul>
				<div class="GameBox">
					<div class="row">
						<?php if (isset( $gameList )): ?>
						<?php foreach ($gameList as $row): ?>
						<div class="col-md-3 col-6">
							<div class="Game">
								<div class="games_logo"><img src="<?php echo UPLOADS_URL ?>/games/<?php echo $row[ "pic1" ] ?>" class="img-fluid"></div>
								<div class="games_name"><?php echo $row[ "game_name" ] ?></div>
								<a class="btn btn-warning" href="<?php echo site_url("Opengame?gm=" . $row[ "makers_num" ] . "&GameCode=" . $row[ "game_code" ]) ?>" target="_blank">進入遊戲</a>
								<a class="btn btn-info" href="javascript:openwindow('<?php echo site_url("Fungame?gm=" . $row[ "makers_num" ] . "&GameCode=" . $row[ "game_code" ]) ?>')">試玩</a>
							</div>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				<!-- END ---->
			</div>
		</div>
	</div>
</div>
