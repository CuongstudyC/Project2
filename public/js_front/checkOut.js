const VNpay = document.querySelector('#VNPay');
const Shipper = document.querySelector('#Shipper');
const COD = document.querySelector('#COD');
VNpay.addEventListener('click',function(){
    if(VNpay.checked){
        Shipper.style.display = "inline";
        Shipper.required = true;

        Shipper.addEventListener("change",function(){
            openAjax();
        })
    }
})

COD.addEventListener('click',function(){
    Shipper.style.display = "none";
    Shipper.required = false;
    Shipper.value = "";
    openAjax();
})


function openAjax(){
    var fee = document.querySelector('.fee');
    var total = document.querySelector('.estimated');
    var ajax = new XMLHttpRequest();
    ajax.open('post','radioSelected',true);
    ajax.onload = ()=>{
        if(ajax.status ==200 && ajax.readyState ==4){
            fee.innerHTML = formatNumber(JSON.parse(ajax.responseText).fee) + "₫";
            total.innerHTML =  formatNumber(parseInt(JSON.parse(ajax.responseText).total)) + "₫";
        }
    }
    var form = document.getElementById('userinfo');
    var dataform = new FormData(form);
    ajax.send(dataform);
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
