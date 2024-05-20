const COST_DISPLAY = document.getElementById('cost-display');
const BASE_PRICE = parseInt(document.getElementById('base-price').value);
const QTY_ELEM = document.getElementById('qty-elem');

QTY_ELEM.onchange = () => {
    if (parseInt(QTY_ELEM.value) <= 0 || QTY_ELEM.value == ''){
        QTY_ELEM.value = 1;
    }
    else {
        var totalCost = BASE_PRICE * parseInt(QTY_ELEM.value);
        COST_DISPLAY.innerHTML = '₱' + totalCost;
    }
}