let login = document.getElementsByClassName('login')[0];
let signin = document.getElementsByClassName('signin')[0];
let loginForm = document.getElementsByClassName('login-form')[0];
let signinForm = document.getElementsByClassName('signin-form')[0];
let slider = document.getElementsByClassName('slider')[0];

login.addEventListener('click', function (){
    loginForm.classList.remove('hide');
    signinForm.classList.add('hide');
    slider.classList.remove('move-slider');
}
)

signin.addEventListener('click', function() {
    loginForm.classList.add('hide');
    signinForm.classList.remove('hide');
    slider.classList.add('move-slider');
})
