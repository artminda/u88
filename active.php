<div class="row no-gutters">
	<div class="col-12 topBanner">
		<img src="<?php echo ASSETS_URL ?>/www/images/event/banner.jpg">
	</div>
</div>
<div class="activebox">
	<div class="row no-gutters">
		<div class="col-12 contentHeaderText">
			<div>優惠活動</div>
			<span>PREFERENTIAL</span>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-md-12">
				<div class="activity">
					<?php if(isset($activeList)):?>
					<?php foreach($activeList as $keys=>$row):?>
					<div class="toggle activity_banner mb-3">
						<div class="b_img a_pic"><img src="<?php echo UPLOADS_URL?>/active/<?php echo $row["pic1"]?>" style=" max-width: 100%;"></div>
						<div class="info">
							<div>
								<h3><?php echo $row["subject"]?></h3>
								<h4>活動說明</h4>
								<?php echo $row["word"]?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<?php endif;?>

					<div class="selection">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
//	$(document).ready(function() {
//		$('.toggle').click(function() {
//			$(this).find('.info').slideToggle("slow");
//		});
//	});
</script>
