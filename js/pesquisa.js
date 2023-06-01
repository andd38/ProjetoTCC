/* 
const iconeum = document.querySelector("#iconeum");

iconeum.addEventListener("click", function() {

  const element4 =document.querySelector(".tech");
  const element5 =document.querySelector(".engenharia");
  const element6 =document.querySelector(".direito");  
  const element  =document.querySelector(".adm");
  const element1 =document.querySelector(".medicinal");
  
  
  element1.classList.toggle(".medicinal");
  element.classList.toggle(".adm");
  element4.classList.toggle(".tech");
  element5.classList.toggle(".engenharia");
  element6.classList.toggle(".direito");  
  
  
  if (element.style.display == "block" 
  && element1.style.display == "block" 
  && element4.style.display == "block" 
  && element5.style.display == "block"
  && element6.style.display == "block"   ) {

    element.style.display =  "none";
    element1.style.display = "none";
    element4.style.display = "none";
    element5.style.display = "none";
    element6.style.display = "none";   

  } else {
    element.style.display =  "block";
    element1.style.display = "block";
     element4.style.display = "block";
    element5.style.display = "block";
    element6.style.display = "block";  
  }


}); 

  const iconedois = document.querySelector("#iconedois");

iconedois.addEventListener("click", function() {


  const element2 = document.querySelector(".adm");
  const element3 = document.querySelector(".bancario");
  element2.classList.toggle(".adm");
  element3.classList.toggle(".bancario");
  
  if (element2.style.display == "block" && element3.style.display == "block") {
    element2.style.display = "none";
    element3.style.display = "none";
    
  } else {
    
    element2.style.display = "block";
    element3.style.display = "block";
  }


});   

const iconetres = document.querySelector("#iconetres");

iconetres.addEventListener("click", function() {


  const element7  =document.querySelector(".adm");
  const element8  =document.querySelector(".bancario");
  const element9  =document.querySelector(".engenharia");
  const element10 =document.querySelector(".direito");  
   const element11 =document.querySelector(".medicinal") ;

  element7.classList.toggle(".adm");
  element8.classList.toggle(".bancario");
  element9.classList.toggle(".engenharia");
  element10.classList.toggle(".direito");  
  element11.classList.toggle(".medicinal");  

  if (element7.style.display === "block" 
  && element8.style.display === "block"
  && element9.style.display === "block" 
  && element10.style.display === "block"
   && element11.style.display === "block" ) {

     element7.style.display = "none";
     element8.style.display = "none";
     element9.style.display = "none";
     element10.style.display = "none";
    element11.style.display = "none" ;
    
  } else {
    
    element7.style.display = "block";
    element8.style.display = "block";
    element9.style.display = "block";
    element10.style.display = "block";
   /*  element11.style.display = "block" ;

  }


});   
 */
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








