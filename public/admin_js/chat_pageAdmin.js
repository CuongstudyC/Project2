const ajax = new XMLHttpRequest();
const countChat = document.querySelector('.navbar-badge');
const navChat = document.querySelector('.nav-item .dropdown-menu-lg');

function DisplayBarChat() {
    ajax.open('get', 'admin/navbar', true);
    if (localStorage.demChat) {
        countChat.innerHTML = localStorage.demChat;
    } else {
        countChat.innerHTML = "";
    }

    ajax.onload = () => {
        if (ajax.status == 200 && ajax.readyState == 4) {
            var getId = JSON.parse(ajax.responseText).chatId;
            var getName = JSON.parse(ajax.responseText).name;
            var getImage = JSON.parse(ajax.responseText).image;
            navChat.innerHTML = "";
            for (var i = 0; i < getId.length; i++) {
                navChat.innerHTML += " <span class='dropdown-item' data-chatId =" + i + ">" +
                    "<div class='media'>" +
                    "<img src='images/" + getImage[i] + "' alt='User Avatar' class='img-size-50 mr-3 img-circle'>" +
                    "<div class='media-body'>" +
                    "<h3 class='dropdown-item-title'>" +
                    getName[i] +
                    "</h3>" +
                    "<p class='text-sm'>Call me whenever you can...</p>" +
                    "<p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> 4 Hours Ago</p>" +
                    "</div>" +
                    "</div>" +
                    "</span>" +
                    "<div class='dropdown-divider'></div>";
            }

            var clickBarchat = document.querySelectorAll('.custom-chat .dropdown-item');
            clickBarchat.forEach(e => {
                e.addEventListener('click', function () {

                    if (localStorage.demChat == 0) {
                        countChat.innerHTML = "";
                    }
                    document.querySelector('.box').style.display = "block";
                    var getAtri = e.getAttribute('data-chatId');
                    var box = document.querySelector('.box');
                    box.innerHTML = "<div class='name_user'>" +
                        "<div class='flex_box'>" +
                        "<div class='name'>" + getName[getAtri] + "</div>" +
                        "<div><button>x</button></div>" +
                        "</div>" +
                        "</div>" +
                        "<div id='content-chat'>" +

                        "</div>" +
                        "<div style='text-align: center;' class='submit-Chat'>" +
                        "<input type='text' style='width:80%;' name='userValue'>" +
                        "</div>"

                    var content = document.getElementById('content-chat');
                    notHiddenBox(content, getId, getAtri);


                    var submitChat = document.querySelector('.submit-Chat input');
                    submitChat.addEventListener('keydown', function (event) {
                        if (event.key == "Enter") {

                            ajax.open('get', 'admin/submitChatAdmin/' + encodeURIComponent(getId[getAtri]) + '/' + encodeURIComponent(submitChat.value), true);
                            ajax.onload = () => {
                                if (ajax.status == 200 && ajax.readyState == 4) {
                                    var contentChat = JSON.parse(ajax.responseText).content
                                    content.innerHTML = "";
                                    contentChat.forEach(ele => {
                                        if (ele['admin_id'] == null) {
                                            content.innerHTML += "<div style='text-align:left;'><span style='background-color:#ff4757;'>" + ele['content'] + "</span></div>";
                                        } else {
                                            content.innerHTML += "<div style='text-align:right;'><span>" + ele['content'] + "</span></div>";
                                        }

                                    });
                                    localStorage.checkAdmin = 1;
                                    content.scrollTop = content.scrollHeight;

                                }
                            }
                            ajax.send();
                            submitChat.value = "";

                        }
                    })

                    if (document.querySelector('.box').style.height == "0px") {
                        document.querySelector('.box').style.height = "300px";
                        document.getElementById('content-chat').style.height = "205px";
                        submitChat.type = "text";
                        content.scrollTop = content.scrollHeight;

                    }

                    var hideBoxChat = document.querySelector('.flex_box');
                    hideBoxChat.addEventListener('click', function () {
                        if (document.querySelector('.box').style.height == "300px") {
                            document.querySelector('.box').style.height = "0px";
                            document.getElementById('content-chat').style.height = "0px";
                            document.querySelector('.submit-Chat').style.height = "0px";
                            submitChat.type = "hidden";
                            content.scrollTop = content.scrollHeight;

                        } else {
                            document.querySelector('.box').style.height = "300px";
                            document.getElementById('content-chat').style.height = "205px";
                            submitChat.type = "text";
                            content.scrollTop = content.scrollHeight;
                        }

                    })

                    var buttonX = document.querySelector('.flex_box div button');
                    buttonX.addEventListener('click', function () {
                        document.querySelector('.box').style.height = "300px";
                        document.querySelector('.box').style.display = "none";
                    })


                    // setInterval(() => {
                    //     // if(  localStorage.checkUser == 1){
                    //     //     DisplayBarChat()
                    //     //     notHiddenBox(content, getId, getAtri);

                    //     // }
                    //     // localStorage.demChat = 0;
                    //     // localStorage.checkUser = 0;
                    // }, 1000);

                    window.addEventListener('storage', (event) => {
                        if (event.key == 'checkUser') {
                            var data = event.newValue;
                            if (data == 1) {
                                DisplayBarChat()
                                notHiddenBox(content, getId, getAtri);
                            }
                            localStorage.checkUser = 0;
                        }
                        if(event.key == 'demChat'){
                            localStorage.demChat = 0;
                        }
                    })
                })
            })
        }
    }
    ajax.send();
}
function notHiddenBox(content, getId, getAtri) {
    ajax.open('get', 'admin/displayContent/' + getId[getAtri], true);
    ajax.onload = () => {
        if (ajax.status == 200 && ajax.readyState == 4) {
            var contentChat = JSON.parse(ajax.responseText).content
            content.innerHTML = "";
            contentChat.forEach(ele => {
                if (ele['admin_id'] == null) {
                    content.innerHTML += "<div style='text-align:left;'><span style='background-color:#ff4757;'>" + ele['content'] + "</span></div>";
                } else {
                    content.innerHTML += "<div style='text-align:right;'><span>" + ele['content'] + "</span></div>";
                }
                content.scrollTop = content.scrollHeight;
            });
        }
    }
    ajax.send();
}

DisplayBarChat();

