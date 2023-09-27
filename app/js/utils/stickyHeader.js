export default function(selector){
    const header = document.querySelector(selector);
    const body = document.querySelector('body');
    let offset = header.offsetHeight;
    const sticky = () => {
        if (window.pageYOffset >= offset) {
            header.classList.add("sticky");
            body.style.marginTop = offset +'px';
        } else {
            header.classList.remove("sticky");
            body.style.marginTop = 0;
        }
    }

    window.onscroll = sticky;
}