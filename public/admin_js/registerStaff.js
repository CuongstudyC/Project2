const password = document.querySelector('#password');
const con_pass = document.querySelector('#con-password');
const displayError = document.querySelector('.invalid-feedback');
const errorContent = document.querySelector('.invalid-feedback strong');
const buttonSubmit = document.querySelector('.btn-primary');
const getEmail = document.querySelector('#email_admin');
con_pass.addEventListener('keyup',function(){
    if(con_pass.value != password.value){
        displayError.style.display = "block";
        errorContent.innerHTML = "Xác nhận mật khẩu phải trùng với mật khẩu";
        con_pass.className = "form-control is-invalid";
        password.className = "form-control is-invalid";
        buttonSubmit.disabled = true;
    } else{
        displayError.style.display = "none";
        errorContent.innerHTML = "";
        con_pass.className = "form-control";
        password.className = "form-control";
        buttonSubmit.disabled = false;
    }
})

getEmail.addEventListener('change',function(){
    getEmail.className = "form-control";
})
