<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
			<h1>匯款紀錄
				<small>Remittance Record</small>
			</h1>
		</div>
		<div class="memberInfo">
			<table class="table table-striped accounts">
				<thead>
				<tr>
                    <th class="green-bg">訂單編號</th>
                    <th class="green-bg">加值方式</th>
                    <th class="green-bg">金額</th>
                    <th class="green-bg">日期</th>
                    <th class="green-bg">狀態</th>
				</tr>
				</thead>
				<tbody>
				<?php if (isset( $result )): ?>
					<?php foreach ($result as $row): ?>
						<tr>
							<td><?php echo $row[ "order_no" ] ?></td>
							<td>
                                <p class="w1">銀行代碼： <?php echo $row[ "bank_name" ] ?></p>

                                <p class="w1">銀行帳號： <?php echo $row[ "bank_account" ] ?></p>

                                <p class="w1">銀行戶名： <?php echo $row[ "account_name" ] ?></p>
							</td>
							<td><?php echo number_format($row[ "amount" ], 0) ?></td>
							<td><?php echo $row[ "buildtime" ] ?></td>
							<td class="<?php echo( $row[ "keyin2" ] == 0 ? 'red' : 'text-success' ) ?>"><?php echo inNumberString($bankKeyin2, $row[ "keyin2" ]) ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="text-center">
		<?php echo @$pagination ?>
	</div>
</div>
