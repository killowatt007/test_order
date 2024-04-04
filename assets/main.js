function objectToUrlParams(obj) {
    return Object.keys(obj).map(
        key => encodeURIComponent(key) + '=' + encodeURIComponent(obj[key])
    ).join('&');
}

function ajax(data) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/?action=store", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (data.success) {
                data.success(xhr.responseText)
            }
        }
    }

    xhr.send(objectToUrlParams(data.data));
}

let eventAdded = false
const openPopupOrder = document.getElementById('open-popup-order');
const popupOrder = document.getElementById('popup-order');
openPopupOrder.addEventListener('click', () => {
    popupOrder.classList.add('show');
    
    if (!eventAdded) {
        const popupCloser = document.getElementById('popup-closer')
        const storeOrder = document.getElementById('store-order')
        
        popupCloser.addEventListener('click', () => {
            popupOrder.classList.remove('show');
        });
    
        storeOrder.addEventListener('click', () => {
            const formOrder = document.getElementById('form-order');
            const formData = new FormData(formOrder);
    
            ajax({
                data: Object.fromEntries(formData),
                success: function(responseText) {
                    const responseData = JSON.parse(responseText)
                    const orderTable = document.getElementById('order-table');

                    const newRow = orderTable.insertRow(1);

                    const description_short = newRow.insertCell(0);
                    const total_price = newRow.insertCell(1);
                    const buyer = newRow.insertCell(2);
                    const status_ru = newRow.insertCell(3);
                    const action = newRow.insertCell(4);

                    description_short.innerHTML = responseData.order.description_short
                    total_price.innerHTML = responseData.order.total_price
                    buyer.innerHTML = responseData.order.buyer
                    status_ru.innerHTML = responseData.order.status_ru
                    action.innerHTML = '<a href="/order?id='+responseData.order.id+'">Подробней</a>'

                    popupOrder.classList.remove('show');
                }
            })

        });

        eventAdded = true
    }
});