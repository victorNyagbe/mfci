const menuBarIconContainer = document.getElementById('menu-icon-container');
const menuBarIcon = document.querySelector('.menu-icon');
const menuList = document.querySelector('.menu-bar ul');

menuBarIconContainer.addEventListener("click", function (e) {

    if (e.target.classList.contains("fa-bars")) {
        menuBarIcon.classList.toggle("fa-times");
    } else {
        menuBarIcon.classList.toggle("fa-bars");
    }

    menuList.classList.toggle('active');
});

