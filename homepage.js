/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* Menu show */
navToggle.addEventListener('click', () =>{
   navMenu.classList.add('show-menu')
})

/* Menu hidden */
navClose.addEventListener('click', () =>{
   navMenu.classList.remove('show-menu')
})

/*=============== LOGIN ===============*/
const login = document.getElementById('login'),
      loginBtn = document.getElementById('login-btn'),
      loginClose = document.getElementById('login-close')

/* Login show */
loginBtn.addEventListener('click', () =>{
   login.classList.add('show-login')
})

/* Login hidden */
loginClose.addEventListener('click', () =>{
   login.classList.remove('show-login')
})



document.querySelector('.hover-image').addEventListener('mouseover', function() {
    document.querySelector('.hover-text').style.display = 'flex';
   });
   
   document.querySelector('.hover-image').addEventListener('mouseout', function() {
    document.querySelector('.hover-text').style.display = 'none';
   });


   const confirmationMessage = document.getElementById('confirmation-message');

   
