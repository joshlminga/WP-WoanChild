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

// Hide Other Li
const hideOther = (li) => {
    // Loop
    li.forEach((item) => {
        // if li has class active then
        if(item.classList.contains('is-active')){
            // remove class active
            item.classList.remove('is-active');

            // find all ul inside item and remove class show-children
            item.querySelectorAll('ul').forEach((ul) => {
                ul.classList.remove('show-children');
            });
        }
    });
}
// Ul
const mainNav = document.querySelector("ul.chld-ul-nav");
if(mainNav){

    let li = mainNav.querySelectorAll('li.menu-item-has-children');

    li.forEach(isLi =>{
        isLi.addEventListener('click', () => {
            isLi.classList.remove('is-active');
            // Get Parent of li
            let parent = isLi.parentElement;
            // if parent is ul and has class menu-item-has-children
            (!parent.classList.contains('menu-item-has-children')) ? hideOther(li) : '';

            // if li has class active then remove it
            if(isLi.classList.contains('is-active')){
                hideOther(li);
            } else{
                // Active Class
                isLi.classList.toggle('is-active');
                // Show Ul
                let ulInner = isLi.querySelector('ul.menu-item-has-children');
                ulInner.classList.toggle('show-children');
                if(!ulInner.classList.contains('show-children')){
                    isLi.classList.remove('is-active');
                } 

            }
        });
    });
}

// When User Click Outside Menu Div Class
document.addEventListener('click', (cl) => {
  // Check if the clicked element is inside the div
  if (cl.target.closest('.chld-menu') == null) {
    // The clicked element is outside the div, so do something
    let hmb_menu = chldHm.querySelector('div.chld-nav-icon > i'); 
    if(!menu.classList.contains('d-none')){
        menu.classList.add('d-none');
        // icon
        hmb_menu.classList.remove('fa-close');
        hmb_menu.classList.add('fa-bars');
    }
  }
});

