<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php if (isset( $bannerList )): ?>
			<?php foreach ($bannerList as $keys => $row): ?>
				<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $keys ?>"
				    class="<?php echo $keys == 0 ? 'active' : '' ?>"></li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ol>
	<div class="carousel-inner">
		<?php if (isset( $bannerList )): ?>
			<?php foreach ($bannerList as $keys => $row): ?>
				<div class="carousel-item text-center <?php echo $keys == 0 ? 'active' : '' ?>">
					<img src="<?php echo UPLOADS_URL ?>/banner/<?php echo $row[ "pic" ] ?>" width="100%">
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
