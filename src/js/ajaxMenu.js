document.addEventListener('DOMContentLoaded', function() {
 
    document.querySelector('.menu-principal-btn').addEventListener('click', function() {
      // Select the menu element where you want to toggle the class (replace 'menu-principal-ul' with the actual ID or class)
      let menuElement = document.querySelector('.menu-principal-ul');
      let menuHamburger = document.querySelectorAll('.menu-principal-btn-bar');

  
      // Toggle the specified class on the menu element
      menuElement.classList.toggle('open');
      menuHamburger.forEach(bar => {
      
          bar.classList.toggle('open');
        });
      });
    });
  