var radio = document.querySelector('.manual-bt')
var cont = 1

document.getElementById('radio1').checked = true

setInterval(() => {
    proximaimg()
}, 5000)

function proximaimg(){
 cont++

 if (cont > 5){
    cont = 1
 }

 document.getElementById('radio'+cont).checked = true
}