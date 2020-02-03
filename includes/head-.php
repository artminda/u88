<title><?php echo @$com_title ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="Description" Content="<?php echo @$com_description ?>"/>
<meta name="keywords" content="<?php echo @$com_keywords ?>" />
<meta name="COPYRIGHT" content="Copyright (c) by <?php echo @$com_name ?>">

<link rel="shortcut icon" href="<?php echo ASSETS_URL ?>/www/images/favicon.ico"/>

<link rel="shortcut icon" href="<?php echo ASSETS_URL ?>/www/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL ?>/www/css/jquery.marquee.min.css">
<link rel="stylesheet" href="<?php echo ASSETS_URL ?>/www/css/main.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.10/lodash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
<!---script src="js/jquery-3.2.1.slim.min.js"></script-->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_URL ?>/www/js/jquery.marquee.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<!-- bootstrap-4.0.0-dist -->
<script src="<?php echo ASSETS_URL ?>/www/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo ASSETS_URL ?>/www/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL ?>/www/bootstrap/js/bootstrap-tooltip.js"></script>
<script src="<?php echo ASSETS_URL ?>/www/js/script.js"></script>

<!--跑馬燈--->
<link rel="stylesheet" href="<?php echo ASSETS_URL ?>/www/css/marquee.css">


<script type="text/javascript">
	// global var
	var CI_URL = "<?php echo site_url();?>";
	var ASSETS_URL = "<?php echo ASSETS_URL?>";
</script>

<script src="<?php echo ASSETS_URL ?>/www/js/api.js"></script>

<script>
	var Token = ''
	callApi('setNewToken').done(function (res) {
		Token = res.token
	})
</script>

<style>
	.pointer {
		cursor: pointer
	}
</style>

<?php if ($isLogin) : ?>
	<script type="text/javascript">
		// check login
		checkLogin();
		var int = setInterval(checkLogin, 60 * 1000);  //設定一分鐘

		function checkLogin() {
			callApi('checkLogin').done(function (data) {
				if (data.RntCode == 'N') {
					location.href = CI_URL
				}
			});
		}
	</script>
<?php else: ?>
	<script>
		// do login
		function doLogin(formID) {
			var $form = $("#" + formID)
			if ($form.length == 0) return

			startLoading()

			var userID = $form.find('#login_u_id').val()
			var userPWD = $form.find('#login_u_password').val()
			var chkum = $form.find('#chknum').val()
			var rtn = $form.find('#rtn').val()
			if (userID != '' && userPWD != '' && chkum != '') {
				//AJAX登入
				callApi('doLogin', {
					'login_u_id': userID,
					'login_u_password': userPWD,
					'remember': $('#remember:checked').val(),
					'chknum': chkum,
					'rtn': rtn
				}).done(function (msg) {
					stopLoading()
					if (msg.RntCode == 'Y') {
						alert('登入成功，頁面跳轉中....');
						location.href = msg.rtn;
					} else {
						alert(msg.Msg);
						//刷新驗證馬
						changeChkImg();
					}
				});
			} else {
				$.unblockUI();
				alert('請輸入帳號密碼以及驗證碼');
			}
		}
	</script>
<?php endif; ?>

<script type="text/javascript">

	changeChkImg()
//	changeChkImg('reg_checknum','regImg')

	$(document).ready(function (){
		$("#marquee").marquee({yScroll:'bottom'});
	});

	// 驗證碼
	function changeChkImg(s_name, obj) {

		s_name = s_name || "checknum";
		obj = obj || "chkImg";
		if (Token == '') {
			setTimeout(function() {
				changeChkImg(s_name, obj)
			}, 1000)
		} else {
			var now = new Date();
			$('#' + obj).attr("src", "<?php echo  site_url("Vcode2");?>?token=" + Token + "&now=" + now.getTime() + "&s_name=" + s_name);
		}
	}

	var loading_img_width = 128
	var loading_img_left = ($(window).width() / 2 ) - (loading_img_width / 2);
	var startLoading = function () {
		$.blockUI({
			message: '<img src="' + ASSETS_URL + '/www/images/009.gif" >',
			baseZ: 2000,
			css: {
				width: loading_img_width,
				left: loading_img_left
			}
		})
	}

	var stopLoading = function () {
		$.unblockUI();
	}

	var serviceUrl = '//kefu.ziyun.com.cn/vclient/chat/?webid=138894'
	var openService = function () {
		openwindow(serviceUrl)
	}

	function openwindow(url) {
		var url;     //網頁位置;
		var name;    //網頁名稱;
		var iWidth = window.screen.availWidth / 2;  //視窗的寬度;
		var iHeight = window.screen.availHeight / 2; //視窗的高度;
		var iTop = (window.screen.availHeight - 30 - iHeight) / 2;  //視窗的垂直位置;
		var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;   //視窗的水平位置;
		window.open(url, 'show', 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,location=no,status=no,menubar=no,toolbar=no,resizable=no,scrollbars=no');
	}

</script>


