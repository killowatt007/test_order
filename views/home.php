
<h2>Все заказы</h2>
<hr>

<button id="open-popup-order">+ Новый заказ</button>
<br><br>
<table id="order-table">
    <tr>
        <th>Описание</th>
        <th>Сумма</th>
        <th>Покупатель</th>
        <th>Стутаус оплаты</th>
        <th></th>
    </tr>
    <?php foreach ($orders as $row) {?>
        <tr>
            <td><?php echo $row['description_short']?></td>
            <td><?php echo $row['total_price']?></td>
            <td><?php echo $row['buyer']?></td>
            <td><?php echo $row['status_ru']?></td>
            <td><a href="/order?id=<?php echo $row['id']?>">Подробней</a></td>
        </tr>
    <?php }?>
</table>

<div id="popup-order" class="popup">
    <div class="popup-content">
        <form class="form" id="form-order">
            <div class="field">
                <label>Сумма заказа</label>
                <input type="text" class="field" name="total_price">
            </div>
            <div class="field">
                <label>Описание</label>
                <textarea rows="5" class="field" name="description"></textarea>
            </div>
            <div class="field">
                <label>Покупатель</label>
                <select class="field" name="buyer_id">
                    <?php foreach ($buyers as $row) {?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="actions">
                <button type="button" id="store-order">Создать заказ</button>
                <button type="button" id="popup-closer">Закрыть</button>
            </div>
        </form>
    </div>
</div>


