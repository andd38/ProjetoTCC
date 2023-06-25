
const quadro = document.querySelector('.quadro');

for (let i = 0; i < 320; i++) {
    const quadradinho = document.createElement('div');
    quadradinho.classList.add('quadradinho');
    quadro.appendChild(quadradinho);
  }