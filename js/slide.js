var radio = document.querySelector('.manual-bt');
var cont = 1;

document.getElementById('radio1').checked = true;

setInterval(() => {
    proximaimg();
}, 10000);

function proximaimg() {
    cont++;

    if (cont > 5) {
        cont = 1;
    }

    document.getElementById('radio' + cont).checked = true;
}

var prevArrow = document.querySelector('.prev-arrow');
var nextArrow = document.querySelector('.next-arrow');

prevArrow.addEventListener('click', () => {
    cont--;

    if (cont < 1) {
        cont = 5;
    }

    document.getElementById('radio' + cont).checked = true;
});

nextArrow.addEventListener('click', () => {
    proximaimg();
});
