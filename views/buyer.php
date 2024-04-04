<h2>Покупатель #<?php echo $buyer['id']?></h2>
<hr>

<div class="list">
	<div class="item">
		<div class="label">Имя</div>
		<div class="value"><?php echo $buyer['name']?></div>
	</div>
	<div class="item">
		<div class="label">Телефон</div>
		<div class="value"><?php echo $buyer['phone']?></div>
	</div>
	<div class="item">
		<div class="label">Email</div>
		<div class="value"><?php echo $buyer['email']?></div>
	</div>
</div>

<h3>Заказы</h3>
<table class="order_data">
	<tr>
		<th>Описание</th>
		<th>Сумма</th>
		<th>Стутаус оплаты</th>
		<th></th>
	</tr>
	<?php foreach ($orders as $row) {?>
		<tr>
			<td><?php echo $row['description_short']?></td>
			<td><?php echo $row['total_price']?></td>
			<td><?php echo $row['status_ru']?></td>
			<td><a href="/order?id=<?php echo $row['id']?>">Подробней</a></td>
		</tr>
	<?php }?>
	<tr>
		<td class="border-none"></td>
		<td colspan="3">
			Всего - <?php echo $summOrders['all']?>
			<br>
			Оплачено - <?php echo $summOrders['payd']?>
			<br>
			Не оплачено - <?php echo $summOrders['pending']?>
		</td>
	</tr>
</table>
