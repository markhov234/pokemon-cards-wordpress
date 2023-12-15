document.addEventListener('DOMContentLoaded', function() {
 
    document.querySelector('.menu-principal-btn').addEventListener('click', function() {
      // Select the menu element where you want to toggle the class (replace 'menu-principal-ul' with the actual ID or class)
      let menuElement = document.querySelector('.menu-principal-ul');
      let menuHamburger = document.querySelectorAll('.menu-principal-btn-bar');


        // setTimeout(function () {
      //   menuElement.classList.add('close');
      // }, 3000); // 3000 milliseconds (3 seconds)

      if (menuElement.classList.contains('open')) {
        menuElement.classList.remove('open'); 
        menuElement.classList.add('close'); 
      } else {
      menuElement.classList.add('open'); 
      if(menuElement.classList.contains('close')){
        menuElement.classList.remove('close'); 
      }
    }
      menuHamburger.forEach(bar => {
      
          bar.classList.toggle('open');
        });
      });

      function addClassOnScreenWidth(screenWidth,elementSelector1,elementSelector2, newClass1,currentClass1,newClass2,currentClass2) {
        const menu = document.querySelector(elementSelector1);
        const menuUl = document.querySelector(elementSelector2);
      
        if (menu && window.innerWidth >= screenWidth) {
          menu.classList.add(currentClass1);
          menu.classList.remove(newClass1);
          
          menuUl.classList.add(currentClass2);
          menuUl.classList.remove(newClass2);
          menuUl.classList.remove('open');
          menuUl.classList.remove('close');

        } else {
          menu.classList.add(newClass1);
          menu.classList.remove(currentClass1);

          menuUl.classList.add(newClass2);
          menuUl.classList.remove(currentClass2);
          menuUl.classList.remove('open');
          menuUl.classList.remove('close');
        }
      }
      
      // Call the function on page load and when the window is resized
      window.addEventListener('load', function() {
        addClassOnScreenWidth(951, '#menu_principal-nav','#menu-principal-ul','menu-principal-nav','menu-principal-nav-desktop','menu-principal-ul','menu-principal-ul-desktop'); // Replace 'your-class-name' with the class you want to add
      });
      
      window.addEventListener('resize', function() {
        addClassOnScreenWidth(951, '#menu_principal-nav','#menu-principal-ul','menu-principal-nav','menu-principal-nav-desktop','menu-principal-ul','menu-principal-ul-desktop'); // Replace 'your-class-name' with the class you want to add
      });
    });
  