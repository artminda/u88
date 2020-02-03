<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
			<h1>點數轉移<small>Points Transfer</small></h1></div>
		<form id="transferForm" method="post" role="form" novalidate>
			<div class="memberInfo transfer">
				<div class="form-group">
					<label for="sel1">轉出來源:</label>
					<select name="makers_num_A" id="makers_num_A" class="form-control" required="" aria-required="true">
						<option value="0">　　 電子錢包 ............... <?php echo number_format($user_info[ 'WalletTotal' ], 0) ?></option>
						<?php if (isset( $makers_data )): ?>
							<?php foreach ($makers_data as $row): ?>
								<option value="<?php echo $row[ "num" ] ?>" class="balance_div"
								        data-makersnum="<?php echo $row[ "num" ] ?>">
									　　 <?php echo $row[ "makers_name" ] ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
					<br>
				</div>
				<div class="form-group">
					<label for="sel1">轉入目的:</label>
					<select name="makers_num_B" id="makers_num_B" class="form-control" required="" aria-required="true">
						<?php if (isset( $makers_data )): ?>
							<?php foreach ($makers_data as $row): ?>
								<option value="<?php echo $row[ "num" ] ?>" class="balance_div"
								        data-makersnum="<?php echo $row[ "num" ] ?>">
									　　 <?php echo $row[ "makers_name" ] ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
						<option value="0">　　 電子錢包 ............... <?php echo number_format($user_info[ 'WalletTotal' ], 0) ?></option>
					</select>
					<br>
				</div>
				<div class="form-group">
					<label>轉移點數</label>
					<input id="amount" name="amount" type="tel" maxlength="9" class="form-control" placeholder="請輸入轉移點數">
				</div>
				<button class="btn btn-smsBTN" id="transferBTN" type="button">確認轉移</button>
			</div>
		</form>
	</div>
</div>

<script>
	var amount_reg = /^[0-9]*[1-9][0-9]*$/;

	$(function () {
		refresh_balance();
		$('.balance_img').css('cursor', 'pointer');
		$('.balance_img').click(function (e) {
			var balanceDiv = $(this).parent();
			var mekers_num = $(balanceDiv).attr('data-makersnum');
			ajax_balance(mekers_num)
		});
		jQuery.validator.addMethod("amountFormat", function (value, element) {
			var str = value;
			var result = !1;
			return (amount_reg.test(value))
		});
		$('#transferForm').validate({
			onkeyup: !1,
			errorClass: 'alert alert-danger',
			errorElement: "div",
			errorPlacement: function (error, element) {
				if (element.parents(".input-group").size() > 0) {
					element.parents(".input-group").after(error)
				} else {
					element.parent().append(error)
				}
			},
			rules: {
				"makers_num_A": {
					required: !0
				},
				"makers_num_B": {
					required: !0
				},
				"amount": {
					required: !0,
					amountFormat: !0,
					min: 50
				}
			},
			messages: {
				"makers_num_A": {
					required: "請選擇從哪轉出"
				},
				"makers_num_B": {
					required: "請選擇轉入位置"
				},
				"amount": {
					required: "請輸入轉移點數",
					amountFormat: "轉移金額請輸入整數",
					min: "單筆最少轉移{0}元"
				}
			}
		});
		$('#transferBTN').bind('click', submitCheck)
	});

	function submitCheck() {
		if ($('#transferForm').valid()) {
			startLoading()
			callApi('doTransfer', $('#transferForm').serialize()).done(function (msg) {
				stopLoading()
				if (msg.RntCode == 'Y') {
					window.location.reload();
				} else if (msg.RntCode == 'W') {
					location.href = location.href
				} else {
					alert(msg.Msg)
				}
			})
		}
	}

	function refresh_balance() {
		var balance_length = $('#makers_num_A .balance_div').length;
		for (i = 0; i < balance_length; i++) {
			var mekers_num = $('#makers_num_A .balance_div').eq(i).attr('data-makersnum');
			ajax_balance(mekers_num)
		}
	}

	function ajax_balance(makersnum) {
		var balanceSpanA = $('#makers_num_A [data-makersnum=' + makersnum + ']');
		var balanceValA = $('#makers_num_A [data-makersnum=' + makersnum + ']').html();
		var balanceSpanB = $('#makers_num_B [data-makersnum=' + makersnum + ']');
		var balanceValB = $('#makers_num_B [data-makersnum=' + makersnum + ']').html();
		callApi('getMakersBalance', {
			makersnum: makersnum
		}).done(function (msg) {
			$(balanceSpanA).html(balanceValA + ' ............... ' + msg.balance);
			$(balanceSpanB).html(balanceValB + ' ............... ' + msg.balance)
			var index = _.findIndex(transfer.datas, function (x) {
				return x.num == makersnum
			})
			transfer.datas[index].point = msg.balance
		})
	}

	// 點數列表
	var getDatas = function () {
		var balance_length = $('#makers_num_A .balance_div').length;

		var datas = [{
			num: 0,
			name: '電子錢包',
			point: <?php echo $user_info[ 'WalletTotal' ] ?>
		}]
		for (i = 0; i < balance_length; i++) {
			var makers_num = $('#makers_num_A .balance_div').eq(i).attr('data-makersnum');
			datas.push({
				num: makers_num,
				name: $('#makers_num_A [data-makersnum=' + makers_num + ']').text().trim(),
				point: 0
			})
		}
		return datas
	}
	var transfer = new Vue({
		el: "#memberUser",
		data: {
			datas: getDatas(),
			columns: 2
		},
		computed: {
			rows: function () {
				return _.range(0, Math.ceil(this.datas.length / this.columns))
			}
		},
		methods: {
			numberFormat: function (val) {
				// numeral.min.js
				return numeral(val).format('0,0')
			}
		}
	})

</script>
