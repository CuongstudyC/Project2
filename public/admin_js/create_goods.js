const fileImage = document.querySelector('#image');
const displayImage = document.querySelector('.input-group .show_image');
const content_error_image = document.querySelector('.custom-file .invalid-feedback strong');
const submit_create_goods = document.querySelector('.card-footer button');
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
        submit_create_goods.disabled = true;
        displayImage.innerHTML = "<span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>";

        if(document.querySelector('#noImage')){
            document.querySelector('#noImage').checked = false;
        }

    } else{
        submit_create_goods.disabled = false;
        if(image !=null){
            var ImageURL = URL.createObjectURL(image);
            displayImage.innerHTML = " <img src='"+ ImageURL +"'  width='300px;' height='200px;'>";
        }

        if(document.querySelector('#noImage')){
            document.querySelector('#noImage').checked = false;
        }
    }

    if(image == null){
        displayImage.innerHTML = "<span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>";
    }
});
