<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
			<h1>轉移紀錄<small>transfer Record</small></h1></div>
		<div class="memberInfo">
			<table class="table table-striped accounts">
				<thead>
				<tr>
                    <th class="green-bg">時 間</th>
                    <th class="green-bg">類 型</th>
                    <th class="green-bg">金 額</th>
				</tr>
				</thead>
				<tbody>
				<?php if (isset( $result )): ?>
					<?php foreach ($result as $row): ?>
						<tr>
							<td><?php echo $row[ "buildtime" ] ?></td>
							<td>
								<?php echo tb_sql("kind", "wallet_kind", $row[ "kind" ]) ?>
								<?php if ($row[ 'kind' ] == 3 || $row[ 'kind' ] == 4):    //轉出轉入遊戲?>
									<p class="w1"><?php echo ( $row[ 'kind' ] == 3 ? '轉入' : '轉出' ) . tb_sql("makers_name", "game_makers", $row[ 'makers_num' ]) ?></p>
									<p class="red">
                                        剩餘點數：<?php echo number_format($row[ "makers_balance" ], 2, '.', ',') ?></p>
								<?php endif; ?>
							</td>
							<td>
								<p class="<?php echo( $row[ "points" ] < 0 ? 'red' : 'text-success' ) ?>"> <?php echo number_format($row[ "points" ], 0) ?> </p>
							</td>
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
</div>
