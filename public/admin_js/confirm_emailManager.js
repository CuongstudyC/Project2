const inputEmail = document.querySelector('.nav-item .confirm_email');

function DisplayEmail(){
    if(inputEmail.style.display == "none"){
        inputEmail.style.display = "block";
    } else{
        inputEmail.style.display = "none"
    }
}
const form = document.querySelector('.nav-item form');
inputEmail.addEventListener('keydown',function(event){
    if(event.key == "Enter"){
        form.addEventListener('submit',function(e){
            e.preventDefault();
        })
        var ajax = new XMLHttpRequest();
        ajax.open('get','http://127.0.0.1:8000/admin/login/confirm_email/' + encodeURIComponent(inputEmail.value),true);
        ajax.onload = ()=>{
            if(ajax.status == 200 && ajax.readyState ==4){
                if(JSON.parse(ajax.responseText).check == 0){
                    alert('Email ko hợp lệ');
                } else{
                    form.submit();
                }
            }
        }
        ajax.send();
    }
})
