const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button");

searchBtn.addEventListener('click', () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
})


searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;

    if (searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }

    //Start AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}




// Users list


const usersList = document.querySelector(".users .users_list");


setInterval(() => {
    //Start AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                let data = xhr.response;

                console.log(data);

                if (!searchBar.classList.contains("active")) {//if active class not contain then add this data
                    usersList.innerHTML = data;
                }
            }
        }
    }

    xhr.send();
}, 500);// Refresh every 500ms

