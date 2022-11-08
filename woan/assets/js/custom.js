// Menu
const menu = document.querySelector('.chld-main-menu');
// DIV
const chldHm = document.querySelector('.chld-side-footer');
if(chldHm){
    // DIV
    let hmb_menu = chldHm.querySelector('div.chld-nav-icon > i'); 
    hmb_menu.addEventListener('click', function(){
        // Remove d-none class
        menu.classList.toggle('d-none');
    });
}
