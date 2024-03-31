






const menuToggle = document.querySelector('.menu_toggle');
const menuClose = document.querySelector('.menu_close');
const menu = document.querySelector('.menu_mobile');
menuToggle.addEventListener('click', () => {

  menu.classList.toggle('open_menu');
});

menuClose.addEventListener('click', () => {

  menu.classList.remove('open_menu');
});

document.addEventListener("DOMContentLoaded", function () {
  const btnDropdown = document.querySelector(".btn_dropdown");
  const dropdownMenu = document.getElementById("dropdownMenu");
  const arrowIcon = document.querySelector(".arrow_icon");

  dropdownMenu.style.transform = "translateY(-400%)"; // Ocultar el menú al cargar la página

  btnDropdown.addEventListener("click", function (event) {
    event.stopPropagation(); // Evitar que el clic se propague al body
    dropdownMenu.style.transition = "transform 0.3s ease-in-out, opacity 0.3s ease-in-out";

    if (dropdownMenu.style.transform === "translateY(-400%)") {
      dropdownMenu.style.transform = "translateY(0px)";
      dropdownMenu.style.opacity = 1;
      arrowIcon.style.transform = "rotate(90deg)";
    } else {
      dropdownMenu.style.transform = "translateY(-400%)";
      dropdownMenu.style.opacity = 0;
      arrowIcon.style.transform = "rotate(0deg)";
    }
  });

  // Agregar evento de clic al body para ocultar el menú si se hace clic fuera de él
  document.body.addEventListener("click", function (event) {
    if (dropdownMenu.style.transform === "translateY(0px)") {
      const target = event.target;
      if (!dropdownMenu.contains(target) && target !== btnDropdown) {
        dropdownMenu.style.transform = "translateY(-400%)";
        dropdownMenu.style.opacity = 0;
        arrowIcon.style.transform = "rotate(0deg)";
      }
    }
  });
});


/* ************************************
            MODAL EST
************************************ */

document.addEventListener('DOMContentLoaded', function () {
  const modalButton = document.querySelector('.btn_estatiticas');
  const modalContainer = document.querySelector('.modal_est_cont');
  const closeButton = document.querySelector('.close');

  modalButton.addEventListener('click', () => {
    modalContainer.style.display = 'flex';
  });

  closeButton.addEventListener('click', () => {
    modalContainer.style.display = 'none';
  });
});

/* ************************************
            MODAL EST JOGADOR
************************************ */
// Función reutilizable para abrir y cerrar modales
function toggleModal(modalId) {
  const modal = document.querySelector(`.${modalId}`);
  modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
}

// Obtener todos los botones que deben abrir modales
const openModalButtons = document.querySelectorAll('.est_jog');

// Agregar el oyente de eventos a cada botón
openModalButtons.forEach(button => {
  const modalId = button.getAttribute('data-modal');
  button.addEventListener('click', () => toggleModal(modalId));
});

// Obtener todos los botones de cierre de modales
const closeModalButtons = document.querySelectorAll('.close_modal');

// Agregar el oyente de eventos a cada botón de cierre
closeModalButtons.forEach(button => {
  const modalId = button.closest('.modal_cont').classList[0];
  button.addEventListener('click', () => toggleModal(modalId));
});








const responsiveTable = document.getElementById('responsive-table');
const showMoreButton = document.createElement('div');
showMoreButton.className = 'show-more';
showMoreButton.textContent = 'Ver Más';

const breakpoint1 = 800;
const breakpoint2 = 550;

function handleViewportChange() {
    const currentViewportWidth = window.innerWidth;

    if (currentViewportWidth >= breakpoint1) {
        showMoreButton.style.display = 'none';
    } else if (currentViewportWidth < breakpoint1 && currentViewportWidth >= breakpoint2) {
        showMoreButton.style.display = 'block';
    } else {
        showMoreButton.style.display = 'block';
    }
}

window.addEventListener('resize', handleViewportChange);

handleViewportChange(); // Llamar a la función para establecer el estado inicial

showMoreButton.addEventListener('click', () => {
    const hiddenCells = document.querySelectorAll('#responsive-table tbody td:not(:nth-child(-n+6))');
    hiddenCells.forEach(cell => {
        cell.style.display = cell.style.display === 'none' ? 'table-cell' : 'none';
    });
});

responsiveTable.parentNode.insertBefore(showMoreButton, responsiveTable.nextSibling);
