const icone = document.querySelector('#iconeum');
const conteudoElemento = document.querySelector('.conteudo');

icone.addEventListener('click', function() {
  conteudoElemento.style.display = "none";
  conteudoElemento.textContent = 'conteudo um';
});



