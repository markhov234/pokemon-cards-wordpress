document.addEventListener('DOMContentLoaded', function() {
 
    document.querySelector('#hamburger-icon').addEventListener('click', function() {
      // Select the menu element where you want to toggle the class (replace 'menu-principal-ul' with the actual ID or class)
      let menuElement = document.querySelector('.menu-principal-ul');
  
      // Toggle the specified class on the menu element
      menuElement.classList.toggle('open');
    });
  });
  