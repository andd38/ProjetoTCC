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
const iconeum = document.querySelector("#iconeum");
const iconedois = document.querySelector("#iconedois");
const iconetres = document.querySelector("#iconetres");
const iconequatro = document.querySelector("#iconequatro");
const iconecinco = document.querySelector("#iconecinco");
const iconeseis = document.querySelector("#iconeseis");
const iconesete = document.querySelector("#iconesete");
const iconeoito = document.querySelector("#iconeoito");

const icones = [iconeum,iconedois,iconetres,iconequatro,iconecinco,iconeseis,iconesete,iconeoito];
icones.addEventListener("click" ,function() {
  for (let index = 0; index < icones.length; index++) {
    const element = icones[index];
    
  

  }
  
});