
const iconeum = document.getElementById("iconeum");

iconeum.addEventListener("click", function() {

  const element = document.querySelector(".adm");
  element.classList.toggle(".adm");

  
  if (element.style.display == "block") {
    element.style.display = "none";
    
  } else {
    element.style.display = "block";
  }
  const element1 = document.querySelector(".medicinal");
  element.classList.toggle(".medicinal");

  
  if (element1.style.display == "block") {
    element1.style.display = "none";
    
  } else {
    
    element1.style.display = "block";
  }

}); 

const iconedois = document.getElementById("iconedois");

iconedois.addEventListener("click", function() {




  const element2 = document.querySelector(".adm");
  element2.classList.toggle(".adm");
  
  if (element2.style.display == "block") {
    element2.style.display = "none";
    
  } else {
    
    element2.style.display = "block";
  }

  const element3 = document.querySelector(".bancario");
  element3.classList.toggle(".bancario");

  if (element3.style.display == "block") {
    element3.style.display = "none";
    
  } else {
    
    element3.style.display = "block";
  }

}); 
