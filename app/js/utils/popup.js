export default function (popupSelector, openLinkSelector, overlaySelector)  {
    const popUps = document.querySelectorAll(popupSelector);
    const openPopupBtns = document.querySelectorAll(openLinkSelector);
    const overlay = document.querySelector(overlaySelector);

    const overlayToggle = (event) => {
        overlay.classList.toggle((overlaySelector+'_active').slice(1))
    }

    const init = (popUp) => {
        const closeBtns = popUp.querySelectorAll('.popup__close');
        const close  = (event) => {
            popUp.classList.remove((popupSelector+'_active').slice(1));
            overlayToggle()
            event.preventDefault();
        }

        closeBtns.forEach(element => {
            element.addEventListener('click', close);
        });
    }
    
    const openPopup = (event) => {
        const popupTargetSelector = event.currentTarget.getAttribute('href');
        const targetPopup = document.querySelector(popupTargetSelector);
        const open = (targetPopup) => {
            targetPopup.classList.add((popupSelector+'_active').slice(1));				
        }
        open(targetPopup);
        overlayToggle()
        event.preventDefault();
    }

    popUps.forEach(popup => {
        init(popup)
    })

    openPopupBtns.forEach(element => {
        element.addEventListener('click', openPopup, true)
    });

}