const notImage = document.querySelector('#noImage');
const nameImage = document.querySelector('.custom-file-label');
notImage.addEventListener('click',function(){
    if(notImage.checked){
        displayImage.innerHTML = "<span style='color:#dc3545;'><strong>Chưa có hình ảnh để hiển thị</strong></span>";
        nameImage.innerHTML = "Chọn hình ảnh";
    } else{
        var fileInput = document.querySelector('#image').files[0];
        if(fileInput != null && fileInput.type.startsWith('image/')){
            var ImageURL = URL.createObjectURL(fileInput);
            displayImage.innerHTML = " <img src='"+ ImageURL +"'  width='300px;' height='200px;'>";
            nameImage.innerHTML = fileInput.name;
        }
    }
})
