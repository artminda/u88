<div class="inner" id="memberUser">
	<div class="register_bg">
		<div class="registerBg"></div>
		<div class="registerTitle">
            <h1>轉出紀錄<small>Sell Record</small></h1></div>
        <div class="memberInfo">
            <table class="table table-striped sell">
                <thead>
                <tr>
                    <th class="green-bg">時 間</th>
                    <th class="green-bg">金 額</th>
                    <th class="green-bg">處理結果</th>
				</tr>
				</thead>
				<tbody>
				<?php if (isset( $result )): ?>
					<?php foreach ($result as $row): ?>
						<tr>
							<td><?php echo $row[ "buildtime" ] ?></td>
							<td>
								<?php echo number_format($row[ "amount" ], 0) ?>
							</td>
							<td>
								<p class="<?php echo( $row[ "keyin1" ] == 1 ? 'text-success' : 'text-danger' ) ?>"> <?php echo inNumberString($sellKeyin1, $row[ "keyin1" ]) ?> </p>
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
