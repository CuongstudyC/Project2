const user_name = document.querySelector('#user_name');
const email = document.querySelector('#email');
if(document.querySelector('.mb-3 .error_all')){
    user_name.className = "form-control is-invalid";
     email.className = "form-control is-invalid";
}
setTimeout(() => {
    user_name.className = "form-control";
    email.className = "form-control";
    if(document.querySelector('.col-md-6 .customer-alert')){
        document.querySelector('.col-md-6 .customer-alert').remove();
    }
}, 3000);
