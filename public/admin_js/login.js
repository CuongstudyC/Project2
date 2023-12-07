const user_name = document.querySelector('#user_name');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
setTimeout(() => {
    password.className = "form-control";
    email.className = "form-control";
    user_name.className = "form-control";
    if(document.querySelector(".col-md-6 .customer-alert")){
        document.querySelector(".col-md-6 .customer-alert").remove();
    }
}, 3000);


