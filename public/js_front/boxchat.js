
const content_chat = document.getElementById('content-chat');
const getContent = document.querySelector('.submit-Chat input');
const submitChat = document.querySelector('.submit-Chat input');
localStorage.demChat = 0;
const ajax = new XMLHttpRequest();
function displayAllChat() {
    ajax.open('get', 'displayChatUser', true);
    ajax.onload = () => {
        if (ajax.status == 200 && ajax.readyState == 4) {
            if (JSON.parse(ajax.responseText).content != 0) {
                var contentChat = JSON.parse(ajax.responseText).content;
                content_chat.innerHTML = "";
                contentChat.forEach(ele => {
                    if (ele['admin_id'] == null) {
                        content_chat.innerHTML += "<div style='text-align:right;'><span>" + ele['content'] + "</span></div>";
                    } else {
                        content_chat.innerHTML += "<div style='text-align:left;'><span style='background-color:#ff4757;'>" + ele['content'] + "</span></div>";
                    }
                });

            }
        }
    }
    ajax.send();
    content_chat.scrollTop = content_chat.scrollHeight;
}
displayAllChat();

function Button_Chat(event) {
    if (event.key == "Enter") {
        // var new_content = document.createElement("div");
        // // new_content.style.textAlign = "right";
        // new_content.style.textAlign = "left";
        // new_content.style.padding = "1%";
        // new_content.textContent = getContent.value;
        // content_chat.appendChild(new_content);
        ajax.open('get', 'submitChatUser/' + encodeURIComponent(getContent.value), true);
        ajax.onload = () => {
            if (ajax.status == 200 && ajax.readyState == 4) {
                var contentChat = JSON.parse(ajax.responseText).content
                content_chat.innerHTML = "";
                contentChat.forEach(ele => {
                    if (ele['admin_id'] == null) {
                        content_chat.innerHTML += "<div style='text-align:right;'><span>" + ele['content'] + "</span></div>";
                    } else {
                        content_chat.innerHTML += "<div style='text-align:left;'><span style='background-color:#ff4757;'>" + ele['content'] + "</span></div>";
                    }
                });
                content_chat.scrollTop = content_chat.scrollHeight;
                localStorage.demChat += 1;
                localStorage.checkUser = 1;
            }
        }
        ajax.send();
        submitChat.value = "";
        content_chat.scrollTop = content_chat.scrollHeight;
    }
}

const message = document.querySelector('.message');
message.addEventListener('click', function () {
    if (document.querySelector('.box').style.display == "none") {
        document.querySelector('.box').style.display = "block";
        content_chat.scrollTop = content_chat.scrollHeight;
        if (document.querySelector('.box').style.height == "0px") {
            document.querySelector('.box').style.height = "300px";
            document.getElementById('content-chat').style.height = "205px";
            submitChat.type = "text";
            content_chat.scrollTop = content_chat.scrollHeight;

        }
    } else {
        document.querySelector('.box').style.display = "none";
        content_chat.scrollTop = content_chat.scrollHeight;
    }
})

var hideBoxChat = document.querySelector('.flex_box');
hideBoxChat.addEventListener('click', function () {
    if (document.querySelector('.box').style.height == "300px") {
        document.querySelector('.box').style.height = "0px";
        document.getElementById('content-chat').style.height = "0px";
        document.querySelector('.submit-Chat').style.height = "0px";
        submitChat.type = "hidden";
        content_chat.scrollTop = content_chat.scrollHeight;

    } else {
        document.querySelector('.box').style.height = "300px";
        document.getElementById('content-chat').style.height = "205px";
        submitChat.type = "text";
        content_chat.scrollTop = content_chat.scrollHeight;
    }

})

var buttonX = document.querySelector('.flex_box div button');
buttonX.addEventListener('click', function () {
    document.querySelector('.box').style.height = "300px";
    document.querySelector('.box').style.display = "none";
})

// setInterval(() => {
//     // if(localStorage.checkAdmin ==1){
//     //     displayAllChat();
//     //     content_chat.scrollTop = content_chat.scrollHeight;
//     // }
//     // localStorage.checkAdmin = 0;

// }, 1000);


window.addEventListener('storage', (event) => {
    if (event.key == 'checkAdmin') {
        var data = event.newValue;
        if (data == 1) {
            displayAllChat();
            content_chat.scrollTop = content_chat.scrollHeight;
        }
        localStorage.checkUser = 0;
    }
})
