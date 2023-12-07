const statusShipping = document.querySelectorAll('.order_status');
const getSelected = document.querySelectorAll('.fail');
statusShipping.forEach(e => {
    // statusShip(e);
    e.addEventListener('change', function () {
        statusShip(e);
    })
})
function statusShip(e) {
    if (e.value == "Chưa giao hàng") {
        e.style.color = "#747d8c";

        getSelected.forEach(ele =>{
            if(ele.getAttribute('data-fail') == e.getAttribute('data-status')){
                ele.style.display = "none";
                ele.required = false;
            }
        })

    }
    if (e.value == "Đang giao hàng") {
        e.style.color = "black";

        getSelected.forEach(ele =>{
            if(ele.getAttribute('data-fail') == e.getAttribute('data-status')){
                ele.style.display = "none";
                ele.required = false;
            }
        })

    }
    if (e.value == "Giao hàng thành công") {
        e.style.color = "#2ed573";

        getSelected.forEach(ele =>{
            if(ele.getAttribute('data-fail') == e.getAttribute('data-status')){
                ele.style.display = "none";
                ele.required = false;
            }
        })

    }
    if (e.value == "Giao hàng thất bại") {
        e.style.color = "#ff4757";


        getSelected.forEach(ele =>{
            if(ele.getAttribute('data-fail') == e.getAttribute('data-status')){
                ele.style.display = "block";
                ele.required = true;
            }
        })
    }
}
const boxFail = document.querySelectorAll('.box_fail');
const buttonclick = document.querySelectorAll('.btn-info');
    buttonclick.forEach(e=>{
        e.addEventListener('click',()=>{
            statusShipping.forEach(sta=>{
                if(sta.getAttribute('data-status') == e.getAttribute('data-updated')){
                    if(sta.value == "Giao hàng thất bại"){
                        getSelected.forEach(x=>{
                            if(x.getAttribute('data-fail') == sta.getAttribute('data-status')){
                                x.style.display = "block";
                            }
                        })
                    }else{
                        boxFail.forEach(box=>{
                            if(box.getAttribute('data-boxfail')== sta.getAttribute('data-fail')){
                                box.innerHTML ="";
                            }
                        })
                    }
                }
            })

        })

    })
