const discount = document.querySelector('#event_discount');
const displayError = document.querySelector('.form-group span');
const error_content = document.querySelector('.form-group span strong');
discount.addEventListener('keyup',function(){
    if(discount.value < 0 | discount.value >100){
        displayError.style.display = "block";
        error_content.innerHTML = "Không được giảm giá < 0% hoặc > 100%";
        discount.value = "";
    } else{
        displayError.style.display = "none";
        error_content.innerHTML = "";
    }
})
