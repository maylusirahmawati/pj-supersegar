const navbarNav = document.querySelector('.navbar-nav');
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
}

let userBtn = document.getElementById('user-btn');
let accountBox = document.querySelector('.account-box');

userBtn.onclick = () => {
    accountBox.classList.toggle('active');
}

window.onclick = function(e){
    if(!userBtn.contains(e.target) && !accountBox.contains(e.target)){
        accountBox.classList.remove('active');
    }
}
