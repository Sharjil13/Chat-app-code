const form = document.querySelector(".typing_area"),
    inputField = form.querySelector(".input_field"),
    sendBtn = form.querySelector("button"),
    chatbox = document.querySelector(".chat_box");




form.onsubmit = (e) => {
    e.preventDefault();
}


sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
                scrollToBottom();
            }
        }
    }
    // Send form data through Ajax
    let formData = new FormData(form);//Creating new form data
    xhr.send(formData);//Sending the form data to php
}

chatbox.onmouseenter = () => {
    chatbox.classList.add("active");
}
chatbox.onmouseleave = () => {
    chatbox.classList.remove("active");
}



setInterval(() => {
    //Start AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatbox.innerHTML = data;
                if (!chatbox.classList.contains("active")) {//if active class not contain in chatbox scroll to bottom
                    scrollToBottom();
                }

            }
        }
    }


    // Send form data through Ajax
    let formData = new FormData(form);//Creating new form data
    xhr.send(formData);//Sending the form data to php
}, 500);// Refresh every 500ms


function scrollToBottom() {
    chatbox.scrollTop = chatbox.scrollHeight;
}