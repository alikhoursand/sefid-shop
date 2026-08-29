import './bootstrap';
import './swiper';
import './jalalidatepicker.min.js'
import './notyf.js'
import './auth.js'
import './imageInput.js'
import './stateCity.js'



// menu
let menuBtn = document.getElementById('menu-btn');
if (menuBtn) {
    let sideBar = document.getElementById('logo-sidebar');

    menuBtn.addEventListener('click', () => {
        sideBar.classList.toggle('translate-x-full')
    })
}

let clearCartForm = document.getElementById('clear-cart-form');
if (clearCartForm) {
    document.getElementById('clear-cart-btn').addEventListener('click', () => {
        clearCartForm.submit();
    })
}

document.querySelectorAll('.random-value').forEach(randomBtn => {
    randomBtn.addEventListener('click', function (event) {
        var input = randomBtn.parentElement.querySelector('input')
        input.value = generateRandomString(7)
    })
})

function generateRandomString(length) {
    const characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        result += characters[randomIndex];
    }
    return result;
}

