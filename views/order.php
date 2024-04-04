<h2>Заказа #<?php echo $order['id']?></h2>
<hr>

<div class="list">
	<div class="item">
		<div class="label">Описание</div>
		<div class="value"><?php echo $order['description']?></div>
	</div>
	<div class="item">
		<div class="label">Сумма заказа</div>
		<div class="value"><?php echo $order['total_price']?></div>
	</div>
	<div class="item">
		<div class="label">Покупатель</div>
		<div class="value"><a href="/buyer?id=<?php echo $order['buyer_id']?>"><?php echo $order['buyer']?></a></div>
	</div>
	<div class="item">
		<div class="label">Статус оплаты</div>
		<div class="value"><?php echo $order['status_ru']?></div>
	</div>
</div>

