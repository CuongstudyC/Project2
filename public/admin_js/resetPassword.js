
const password = document.querySelector('#password');
const con_pass = document.querySelector('#password-confirm');
const error_pass = document.querySelector('.col-md-6 .invalid-feedback strong');
const display_error = document.querySelector('.col-md-6 .invalid-feedback');
const submit_register = document.querySelector('.offset-md-4 .btn-primary');

con_pass.addEventListener('keyup',function(){
    checkPass();
})
password.addEventListener('keyup',function(){
    if(con_pass.value != ""){
        checkPass();
    }
})

function checkPass(){
    if(password.value != con_pass.value){
        password.className = "form-control is-invalid";
        con_pass.className = "form-control is-invalid";
        display_error.style.display = "inline";
        error_pass.innerHTML = "Password must be same Password Confirm";

        submit_register.disabled = true;
       } else{
        password.className = "form-control";
        con_pass.className = "form-control";
        display_error.style.display = "none";
        error_pass.innerHTML = "";
        submit_register.disabled = false;
       }
}
setInterval(() => {
    if(password.value == "" && con_pass.value == ""){
        password.className = "form-control";
        con_pass.className = "form-control";
        display_error.style.display = "none";
        error_pass.innerHTML = "";
        submit_register.disabled = false;
    }
}, 0.2);
