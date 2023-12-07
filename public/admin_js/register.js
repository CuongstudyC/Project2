
const password = document.querySelector('#password');
const con_pass = document.querySelector('#password-confirm');
const error_pass = document.querySelector('.col-md-6 .invalid-feedback strong');
const display_error = document.querySelector('.col-md-6 .invalid-feedback');
const submit_register = document.querySelector('.offset-md-4 .btn-primary');

const content_error_image = document.querySelector('.custom-file .invalid-feedback strong');

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
        display_error.style.display = "block";
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
        if(content_error_image.innerHTML != ""){
            submit_register.disabled = true;
        } else{
            submit_register.disabled = false;
        }
    }
}, 0.2);

const email_resigter = document.querySelector('.col-md-6 #email');
setTimeout(() => {
    if(document.querySelector('.col-md-6 .customer-alert')){
        email_resigter.className = "form-control";
        document.querySelector('.col-md-6 .customer-alert').remove();
    }
}, 3000);


const fileImage = document.querySelector('#Image');
const displayImage = document.querySelector('.display-image .col-md-6');
const formRegister = document.querySelector('form');
fileImage.addEventListener('change',function(){
    var image = fileImage.files[0];
    var error_image = document.querySelector(".custom-file .invalid-feedback");
    if(image != null && !image.type.startsWith("image/")){
        error_image.style.display = "block";
        content_error_image.innerHTML = "Đó không phải hình ảnh, mời bạn vui lòng chọn lại";
    } else if (image != null && image.size >2000000){
        error_image.style.display = "block";
        content_error_image.innerHTML = "Kích thước quá lớn bạn vui lòng chọn hình khác";
    } else{
        error_image.style.display = "none";
        content_error_image.innerHTML = "";
    }

    if(content_error_image.innerHTML != ""){
        submit_register.disabled = true;

        displayImage.innerHTML = "<span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>";
    } else{
        submit_register.disabled = false;
        if(image !=null){
            var ImageURL = URL.createObjectURL(image);
            displayImage.innerHTML = " <img src='"+ ImageURL +"'  width='300px;' height='200px;'>";
        }
    }

    if(image == null){
        displayImage.innerHTML = "<span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>";
    }
});
