<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
			<h1>儲值紀錄<small>DepositRecord</small></h1></div>
		<table class="table table-striped history">
			<thead>
			<tr>
				<th class="green-bg">儲值時間</th>
				<th class="green-bg">儲值方式</th>
				<th class="green-bg">儲值金額</th>
				<th class="green-bg">處理结果</th>
			</tr>
			</thead>
			<tbody>
			<?php if (isset( $result )): ?>
				<?php foreach ($result as $row): ?>
					<tr>
						<td><?php echo $row[ "buildtime" ] ?></td>
						<td>
							<p class="Stored-value">
                                儲值方式： <?php echo inNumberString($paymentType, $row[ "payment" ]) ?></p>
							<?php if ($row[ 'pay_mode' ] == 1):    //綠界?>
								<?php if ($row[ "payment" ] == 'ATM'): ?>
									<p class="w1">銀行代碼： <?php echo $row[ "payInfo" ][ "BankCode" ] ?></p>
									<p class="w1">銀行帳號： <?php echo $row[ "payInfo" ][ "vAccount" ] ?></p>
								<?php else: ?>
									<p class="w1">銀行代碼：<?php echo $row[ "payInfo" ][ "PaymentNo" ] ?></p>
								<?php endif; ?>
								<p class="w1">缴費期限：<?php echo $row[ "payInfo" ][ "ExpireDate" ] ?></p>
							<?php endif; ?>

						</td>
						<td><?php echo number_format($row[ "amount" ], 0) ?></td>
						<td class="<?php echo( $row[ "keyin2" ] == 0 ? 'red' : 'text-success' ) ?>"><?php echo $orderKeyin2[ $row[ "keyin2" ] ] ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="text-center">
		<?php echo @$pagination ?>
	</div>

</div>
