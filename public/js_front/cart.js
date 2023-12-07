const changeCart = document.querySelectorAll('.cart_qty');
changeCart.forEach(e=>{
    e.addEventListener('change',function(){
        var getID = e.getAttribute('data-number');
        var ajax = new XMLHttpRequest();

        ajax.open('post','changeCart',true);
        ajax.onload = ()=>{
            if(ajax.status ==200 && ajax.readyState ==4){
                var displayPrice = document.querySelector('.price_' + getID);
                displayPrice.innerHTML = formatNumber(parseInt(JSON.parse(ajax.responseText).cart_price) * parseInt(JSON.parse(ajax.responseText).cart_qtv)) +"₫";
                var displayCount = document.querySelector('#rightdiv4 thead th');
                displayCount.innerHTML = JSON.parse(ajax.responseText).cartCount + " ITEMS";


                displayCount.setAttribute('data-count', JSON.parse(ajax.responseText).cartCount);


                var displaySubPrice = document.querySelector('tbody .subtotal');
                var displayTotalPrice = document.querySelector('tbody .estimated');
                displaySubPrice.innerHTML = formatNumber(parseInt(JSON.parse(ajax.responseText).cartTotal) - parseInt(JSON.parse(ajax.responseText).cartSubTotal)) +"₫";
                displayTotalPrice.innerHTML = formatNumber(parseInt(JSON.parse(ajax.responseText).cartTotal)) + "₫";
            }
        }
        var getData = document.querySelector('#leftdiv .form_' + getID);
        var dataForm = new FormData(getData);
        ajax.send(dataForm);
    })
})

const DeleteCart = document.querySelectorAll('#leftdiv form');
DeleteCart.forEach(e=>{
    e.addEventListener('submit',(ele)=>{
        ele.preventDefault();
        var ajax = new XMLHttpRequest();
        ajax.open('post','changeCart',true);
        ajax.onload = ()=>{
            if(ajax.status ==200 && ajax.readyState ==4){
                e.remove();
                var displayCount = document.querySelector('#rightdiv4 thead th');
                displayCount.innerHTML = JSON.parse(ajax.responseText).cartCount + " ITEMS";


                displayCount.setAttribute('data-count', JSON.parse(ajax.responseText).cartCount);


                var displaySubPrice = document.querySelector('tbody .subtotal');
                var displayTotalPrice = document.querySelector('tbody .estimated');
                displaySubPrice.innerHTML = formatNumber(parseInt(JSON.parse(ajax.responseText).cartTotal) - parseInt(JSON.parse(ajax.responseText).cartSubTotal))+ "₫";
                displayTotalPrice.innerHTML = formatNumber(parseInt(JSON.parse(ajax.responseText).cartTotal)) + "₫";

                var success = document.querySelector('.success');
                success.style.display = "block";
                success.style.padding = "1%";
                success.style.backgroundColor = "#00FF00";
                success.style.width = "80%";
                success.style.margin = "0 auto";
                success.style.borderRadius = "3%";
                success.style.color = "#FFFFFF";
                success.innerHTML = "Đã xóa thành công";

                setTimeout(() => {
                    if(success.style.display == 'block'){
                        success.innerHTML = "";
                        success.style.display = 'none';
                    }
                }, 3000);
            }
        }

        var formData = new FormData(e);
        ajax.send(formData);
    })
})

function goPageCheckOut(){
    var displayCount = document.querySelector('#rightdiv4 thead th');
    if(displayCount.getAttribute('data-count') == 0){
        return false;
    } else{
        return true;
    }
}

function formatNumber(product) {
    if (product != 0) {
        var sumTotal = String(product);
        var charSum = sumTotal.trim().split('');
         sumTotal = '';
        var a = 1;
        var dem = 0;

        for (var i = charSum.length -1; i >= 0; i--) {
            if (dem == 3 * a) {
                sumTotal = sumTotal + '.' + charSum[i];
                a += 1;
            } else {
                sumTotal = sumTotal + charSum[i];
            }
            dem += 1;
        }

        charSum = sumTotal.split('');
        sumTotal = '';

        for (var i = charSum.length -1; i >= 0; i--) {
            sumTotal = sumTotal + charSum[i] ;
        }
        return sumTotal;
    }
    return 0;
}
