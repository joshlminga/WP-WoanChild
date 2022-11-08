// Menu
const menu = document.querySelector('.chld-main-menu');
// DIV
const chldHm = document.querySelector('.chld-side-footer');
if(chldHm){
    // DIV
    let hmb_menu = chldHm.querySelector('div.chld-nav-icon > i'); 
    hmb_menu.addEventListener('click', function(){
        
        // Toggle Class
        menu.classList.toggle('d-none');
        // Add Effects
        menu.classList.add('animated', 'fadeInLeft');
        // if class hmb_menu has class fa-bars then remove it and add fa-colse
        if(hmb_menu.classList.contains('fa-bars')){
            hmb_menu.classList.remove('fa-bars');
            hmb_menu.classList.add('fa-close');
        }else{
            hmb_menu.classList.remove('fa-close');
            hmb_menu.classList.add('fa-bars');
        }
    });
}
