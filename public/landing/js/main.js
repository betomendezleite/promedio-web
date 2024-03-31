// Obtener el elemento de la barra de navegación
const navbar = document.querySelector('.navbar');
const logo = document.querySelector('.logo_desktop');
const btn_user = document.getElementById('btn_user');
const btn_user_2 = document.getElementById('btn_user_2');

// Escuchar el evento de desplazamiento (scroll) en la ventana
window.addEventListener('scroll', () => {
  // Obtener la posición vertical del scroll
  const scrollY = window.scrollY;

  // Agregar o eliminar la clase 'scrolled' en función del scroll
  if (scrollY > 0) {
    navbar.classList.add('scrolled');
    navbar.classList.remove('nav');
    navbar.classList.add('nav_scroll');
    logo.classList.remove('logo_desktop');
    logo.classList.add('logo_desktop_scroll');
    btn_user.classList.add('bg_principal');
    btn_user_2.classList.add('bg_principal');

  } else {
    navbar.classList.remove('scrolled');
    navbar.classList.add('nav');
    navbar.classList.remove('nav_scroll');
    logo.classList.add('logo_desktop');
    logo.classList.remove('logo_desktop_scroll');
    btn_user.classList.remove('bg_principal');
    btn_user_2.classList.remove('bg_principal');
  }
});


function toggleCollapse(elementId) {
  var collapseContent = document.getElementById(elementId);
  if (collapseContent.style.display === 'none') {
    collapseContent.style.display = 'block'; // Mostramos el contenido
  } else {
    collapseContent.style.display = 'none'; // Ocultamos el contenido
  }
}



const menuToggle = document.querySelector('.menu_toggle');
const menuClose = document.querySelector('.menu_close');
const menu = document.querySelector('.menu_mobile');
menuToggle.addEventListener('click', () => {

  menu.classList.toggle('openmenu');
});

menuClose.addEventListener('click', () => {
  menu.classList.remove('openmenu');
});

