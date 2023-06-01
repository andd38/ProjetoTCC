
const icones = ["iconeum", "iconedois", "iconetres", "iconequatro", "iconecinco", "iconeseis", "iconesete", "iconeoito"];

let elementoAtivo = null; // Armazena o último elemento selecionado

for (let index = 0; index < icones.length; index++) {
  const icone = document.getElementById(icones[index]);
  icone.addEventListener("click", function() {
    const element4 = document.querySelector(".tech");
    const element5 = document.querySelector(".engenharia");
    const element6 = document.querySelector(".direito");
    const element =  document.querySelector(".adm");
    const element1 = document.querySelector(".medicinal");
    const element7 = document.querySelector(".bancario");
    const element8 = document.querySelector(".militar");
    const element3 = document.querySelector(".vestibular");

    // Se o mesmo ícone foi selecionado novamente, restaurar a página como era antes
    if (elementoAtivo === icones[index]) {
      element3.style.display = "block";
      element1.style.display = "block";
      element.style.display = "block";
      element4.style.display = "block";
      element5.style.display = "block";
      element6.style.display = "block";
      element7.style.display = "block";
      element8.style.display = "block";
      elementoAtivo = null; // Limpar o elemento ativo
    } else {
      // Ocultar todos os elementos
      element1.style.display = "none";
      element3.style.display = "none";
      element.style.display = "none";
      element4.style.display = "none";
      element5.style.display = "none";
      element6.style.display = "none";
      element7.style.display = "none";
      element8.style.display = "none";

      // Exibir o elemento correspondente ao ícone selecionado
      if (icones[index] === "iconeum") {
        element7.style.display = "block"; // Carreira Bancários
      } else if (icones[index] === "iconedois") {
        element1.style.display = "block"; // Carreira Medicina
      } else if (icones[index] === "iconetres") {
        element4.style.display = "block"; // Carreira Tecnologia
      } else if (icones[index] === "iconequatro") {
        element.style.display = "block"; // Carreira Administração
      } else if (icones[index] === "iconecinco") {
        element6.style.display = "block"; // Carreira Direito
      } else if (icones[index] === "iconeseis") {
        element5.style.display = "block"; // Carreira Engenharia
      } else if (icones[index] === "iconesete") {
        element8.style.display = "block"; // Carreira Militar
      } else if (icones[index] === "iconeoito") {
        element3.style.display = "block"; // Carreira Vestibular
      }

      elementoAtivo = icones[index]; // Atualizar o elemento ativo
    }
  });
}








