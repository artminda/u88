<style>
	.navItemNormal {
		cursor: pointer;
	}
</style>
<div id="Menu">
	<div class="container" id="topMenu">
		<div class="row no-gutters">
			<div class="col-md-5 col-12" id="logo">
				<a href="<?php echo site_url() ?>"><img src="<?php echo ASSETS_URL ?>/www/images/logo.png"></a>
			</div>
			<div class="col-md-7 col-12">
				<div class="row no-gutters">
                    <div class="col-12 text-center j-s-box">
                        <?php if (!$isLogin): ?>
                            <a href="<?php echo site_url('Manger/register') ?>" class="float-right button-reg">立即注册</a>
                        <?php else:?>
                        <?php endif; ?>
                        <!--a href="javascript:openService()" class="float-right service-link" fnbtn="menubtn" data-ea_cs="text"
                           data-linkmsg="right_linksCs"><?php echo @$com_title ?> 24小時線上專業客服 <img src="<?php echo ASSETS_URL ?>/www/images/icon-btn1.jpg"></a-->
                    </div>
					<div class="col-12">
						<div id="marquee">
							<div id="scrolling" class="col-12">
								<div class="row">
									<span class="icon-mq col-1"></span>
									<ul id="marquee" data-direction='right' class="marquee col-md-11 col-10">
										<?php if(isset($newsList)):?>
											<?php foreach($newsList as $row):?>
												<li>
													<a href="" data-toggle="modal" data-target="#marqueeModal">
														<?php echo $row["word"]?>
													</a>
												</li>
											<?php endforeach;?>
										<?php endif;?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg pl-0 pr-0">
		<div class="col-12" id="mainMenu">
			<button class="custom-toggler navbar-toggler" type="button" data-toggle="collapse"
			        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
			        aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav navBarItem">
					<li class="navItemNormal <?php if (uri_string() == 'Index') echo 'active' ?>" id="MenuHome"
						onclick="location.href='<?php echo site_url() ?>'">
						<a><i class="fa fa-home" aria-hidden="true"></i> </a>
					</li>
					<li class="navItemNormal <?php if (uri_string() == 'Sport') echo 'active' ?>"
					    onclick="location.href='<?php echo site_url('Sport') ?>'">
						<a>體育博彩</a>
					</li>
					<li class="navItemNormal <?php if (uri_string() == 'Live') echo 'active' ?>"
					    onclick="location.href='<?php echo site_url('Live') ?>'">
						<a>真人娛樂</a>
					</li>
					<li class="navItemNormal <?php if (uri_string() == 'Slot') echo 'active' ?>"
					    onclick="location.href='<?php echo site_url('Slot') ?>'">
						<a>電子遊戲</a>
					</li>
					<li class="navItemNormal <?php if (uri_string() == 'Keno') echo 'active' ?>"
					    onclick="location.href='<?php echo site_url('Keno') ?>'">
						<a>彩票彩球</a>
					</li>
					<li class="navItemNormal <?php if (uri_string() == 'Esport') echo 'active' ?>"
					    onclick="location.href='<?php echo site_url('Esport') ?>'">
						<a>電競遊戲</a>
					</li>
					<li class="navItemNormal <?php if (uri_string() == 'Active') echo 'active' ?>"
					    onclick="location.href='<?php echo site_url('Active') ?>'">
						<a>優惠活動</a>
					</li>
					<li class="navItemNormal <?php if (uri_string() == 'Downloas') echo 'active' ?>"
					    onclick="location.href='<?php echo site_url('Download') ?>">
						<a>APP下载</a>
					</li>
					<li class="navItemNormal">
						<a href="http://18av.mm-cg.com/<?php // echo site_url('Openav') ?> target="_blank">線上影城</a>
					</li>
<!--					<li class="navItemNormal"><a href="javascript:openService()">聯絡我們</a></li>-->
				</ul>
			</div>
		</div>
	</nav>
</div>

<div class="modal fade bs-example-modal-lg" id="marqueeModal" tabindex="-1" role="dialog" aria-labelledby="marqueeModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body row">
				<div id="mqId">
					<?php if(isset($newsList)):?>
					<?php foreach($newsList as $row):?>
					<div class="col-12 result">
						<div class="row">
							<div class="col-3 date"><?php echo date_format(date_create($row["buildtime"]),"Y-m-d");?></div>
							<div class="col-9 datacontent text-left">
								<?php echo $row["word"]?>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<?php endif;?>
					<div class="col-12 mq_btn mt-3">
						<button type="button" class="close btn-blue" data-dismiss="modal" aria-label="Close">關閉</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
