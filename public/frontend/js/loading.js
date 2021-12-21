const loader = document.querySelector('.loader3');
const main = document.querySelector('.loading-page');

function init() {
  setTimeout(() => {
    loader.style.opacity = 0;
    loader.style.display = 'none';

    main.style.display = 'block';
    setTimeout(() => (main.style.opacity = 1), 50);
  }, 1500);
}

init();
