// Other Java Script

const form = document.querySelector(".login form"),
    continueBtn = document.querySelector(".button input"),
    errText = document.querySelector(".err_message");

form.onsubmit = (e) => {
    e.preventDefault();
}


continueBtn.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data == "success") {

                    location.href = "users.php";

                } else {
                    errText.textContent = data;
                    errText.style.display = "block";
                }
            }
        }
    }
    // Send form data through Ajax
    let formData = new FormData(form);//Creating new form data
    xhr.send(formData);//Sending the form data to php
})


