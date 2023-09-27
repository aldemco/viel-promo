export default function (){
    const containers = document.querySelectorAll('.header-navigation');
    containers.forEach((el)=>{
        const toggleBtn =  el.querySelector('.header-navigation__menu-toggle');
        const links = el.querySelectorAll('.header-menu__link');

        const toggle = (event) => {
            el.classList.toggle("show");
            event.preventDefault();
        }

        const toggleLink = (event) => {
            el.classList.toggle("show");
        }

        links.forEach((link)=>{
            link.addEventListener('click', toggleLink)
        })
        
        toggleBtn.addEventListener('click', toggle)
    })
}